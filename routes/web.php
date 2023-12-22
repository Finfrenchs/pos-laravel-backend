<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('pages.auth.auth-login', ['type_menu' => '']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('pages.app.dashboard-pos', ['type_menu' => '']);
    })->name('home');
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
});

// Route::get('/register', function () {
//     //return view('welcome');
//     return view('pages.auth.auth-register', ['type_menu' => '']);
// })->name('register');
