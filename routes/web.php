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
//their code

    
//my code
Route::get('/admin', function () {

return view('admin.index');
});

Route::get('/admin/create', function () {

    return view('admin.movie_create');
});


    
