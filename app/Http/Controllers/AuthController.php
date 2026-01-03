<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        // Attempt login using email & password
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $request->session()->regenerate();

            $user = Auth::user();

            // Role validation (IMPORTANT)
            if ($user->role !== $request->user_type) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Role does not match this account',
                ]);
            }

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }

            return redirect()->route('customer.index');
        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
        // dd($request->all());
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
}
