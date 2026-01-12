<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login form submission
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
            'user_type' => 'required|in:admin,customer',
        ]);

        // Attempt login
        if (!Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }

        // Login success
        $request->session()->regenerate();
        $user = Auth::user();

        // Role validation
        if ($user->role !== $request->user_type) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Role does not match this account',
            ]);
        }

        /**
         * 🔒 CRITICAL FIX:
         * Ensure profile ALWAYS exists
         */
        Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'fullname'  => $user->name,   // fallback from users table
                'email'     => $user->email,
                'phone'     => null,
                'gender'    => null,
                'birthdate' => null,
            ]
        );

        // Redirect by role
        return $user->role === 'admin'
            ? redirect()->route('admin.index')
            : redirect()->route('customer.index');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Update profile (admin & customer)
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'fullname'  => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:20',
            'gender'    => 'nullable|in:Male,Female',
            'birthdate' => 'nullable|date',
        ]);

        $user = Auth::user();

        /**
         * SAFETY NET:
         * If profile somehow missing, recreate it
         */
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'fullname' => $user->name,
                'email'    => $user->email,
            ]
        );

        // Update PROFILE table
        $profile->update([
            'fullname'  => $request->fullname,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'gender'    => $request->gender,
            'birthdate' => $request->birthdate,
        ]);

        // Update USERS table (keep email in sync)
        $user->update([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
}
