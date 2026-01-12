<?php

use App\Http\controllers\adminDashboardController;
use App\Http\controllers\movieController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthController;
use App\Http\controllers\BookingController;
use App\Http\controllers\ShowtimesController;
use App\Http\controllers\PaymentController;

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

Route::get('/customer', [movieController::class, 'home'])->name('customer.index');

Route::get('/register', function () {
    return view('auth.register');});

Route::get('/history', [BookingController::class, 'history']);

Route::get('/profile', function () {
    return view('customer.profile');});

Route::get('/booking/{id}', [BookingController::class, 'booking']) ->name('customer.booking');


Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('customer.details');

Route::get('/payment/{booking}', [PaymentController::class, 'show'])->name('customer.payment');

Route::post('/payment/confirm/{booking}', [PaymentController::class, 'confirm'])->name('customer.payment.confirm');
    
//-------------------------ADMIN ROUTES
Route::get('/admin', [adminDashboardController::class, 'index'])->name('admin.index');

Route::get('/addmovie', [adminDashboardController:: class, 'create'])->name('admin.movie_create'); 

Route::post('/movie', [adminDashboardController::class, 'store'])->name('movie.store');

Route::get('/movies/edit/{movie}', [adminDashboardController::class, 'edit'])->name('movie.edit');

Route::put('/movies/{movie}', [adminDashboardController::class, 'update'])->name('movie.update');

Route::delete('/movies/{movie}', [adminDashboardController::class, 'destroy']) ->name('movie.destroy');

Route::get('/admin/profile', function () {
    return view('admin.adminProfile');
})->name('admin.profile');

Route::put('/admin/profile', [AuthController::class, 'updateProfile'])->name('admin.profile.update')
    ->middleware('auth');

Route::get('/admin/booking', [adminDashboardController::class, 'bookings'])->name('admin.booking');

Route::get('/admin/booking/{booking}/edit', 
    [adminDashboardController::class, 'editBooking'])->name('admin.booking.edit');

Route::put('/admin/booking/{booking}', 
    [adminDashboardController::class, 'updateBooking'])->name('admin.booking.update');

Route::delete('/admin/booking/{booking}', 
    [adminDashboardController::class, 'deleteBooking'])->name('admin.booking.delete');

Route::get('/admin/movies/{id}/details', [MovieController::class, 'showDetails'])->name('admin.movie.details');

Route::get('/admin/showtimes/{movie}', [ShowtimesController::class, 'create']) ->name('admin.showtimes');

Route::post('/admin/showtimes', [ShowtimesController::class, 'store'])->name('admin.showtimes.store');


    
