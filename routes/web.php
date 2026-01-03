<?php

use App\Http\controllers\adminDashboardController;
use App\Http\controllers\movieController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//login & register
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//CUSTOMER ROUTES

Route::get('/', function () {

    return view('customer.index');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/history', function () {
    return view('customer.history');
});
Route::get('/profile', function () {
    return view('customer.profile');
});
Route::get('/booking', function () {
    return view('customer.booking');
});


    
//ADMIN ROUTES
Route::get('/admin', [adminDashboardController::class, 'index'])->name('admin.index');

Route::get('/addmovie', [adminDashboardController:: class, 'create'])->name('admin.movie_create'); 

Route::post('/movie', [adminDashboardController::class, 'store'])
        ->name('movie.store');

Route::get('/movies/edit/{movie}', [adminDashboardController::class, 'edit'])
        ->name('movie.edit');

Route::put('/movies/{movie}', [adminDashboardController::class, 'update'])
        ->name('movie.update');

Route::delete('/movies/{movie}', [adminDashboardController::class, 'destroy'])
        ->name('movie.destroy');

Route::get('/admin/profile', function () {
    

    return view('admin.adminProfile');
})->name('admin.profile');

Route::get('/admin/booking', [adminDashboardController::class, 'bookings'])
     ->name('admin.booking');


    
