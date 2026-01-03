<?php

use App\Http\controllers\adminDashboardController;
use Illuminate\Support\Facades\Route;

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

//CUSTOMER ROUTES

Route::get('/', function () {

    return view('customer.index');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/history', function () {
    return view('customer.history');
});
Route::get('/profile', function () {
    return view('customer.profile');
});

    
//ADMIN ROUTES
Route::get('/admin', function () {

return view('admin.index');
})->name('admin.index');

Route::get('/addmovie', function () {

    return view('admin.movie_create');
})->name('admin.movie_create');

Route::get('/admin/profile', function () {

    return view('admin.adminProfile');
})->name('admin.profile');

Route::get('/admin/booking', function () {

    return view('admin.viewBooking');
})->name('admin.booking');

Route::get('/admin/edit/{movie}', function ($movie) {

    return view('admin.edit', compact('movie'));
})->name('admin.edit');
    
