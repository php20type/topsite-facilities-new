<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// User Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/thank-you', [HomeController::class, 'thankYou'])->name('thank-you');

// User Authentication Routes
Route::group(['prefix' => 'user'], function () {
    Route::get('login', [UserController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [UserController::class, 'login']);
    Route::get('register', [UserController::class, 'showRegistrationForm'])->name('user.register');
    Route::get('register', [UserController::class, 'register']);
});

// Admin Authentication Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::get('login', [AdminController::class, 'login']);
});
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    // Admin routes here
});

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\Customer'], function () {
    Route::resource('property', 'PropertyController')->names('user.property');
    Route::get('/fetch-more-media', 'PropertyController@fetchMoreMedia');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
