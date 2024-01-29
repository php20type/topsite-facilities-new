<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::view('/', 'welcome');
Auth::routes(['verify' => true]);

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/user', [LoginController::class, 'showUserLoginForm']);
Route::get('/register/user', [RegisterController::class, 'showUserRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/user', [LoginController::class, 'userLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/user', [RegisterController::class, 'createUser']);

Route::view('/home', 'home')->middleware('auth');
Route::view('admin', '/admin/customer/list');
Route::view('user', '/customer/Property/list');
Route::view('thank-you', '/thank-you');

// Logout route for the user guard
Route::post('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');
Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

// Logout route for the admin guard
Route::middleware('auth:admin')->group(function () {

});

// Route::get('/logout', [AdminController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\Customer'], function () {
    Route::resource('property', 'PropertyController')->names('user.property');
    Route::get('/fetch-more-media', 'PropertyController@fetchMoreMedia');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\admin'], function () {
    Route::resource('customer', 'CustomerController')->names('admin.customer');
    Route::get('/property-details/{id}', 'CustomerController@propertyDetails')->name('admin.property.details');
    Route::get('/request', 'RequestController@index')->name('admin.request');
    Route::post('/search-properties', 'CustomerController@searchProperties')->name('search.properties');
    Route::post('/update-customer-status', 'CustomerController@updateStatus')->name('update.customer.status');


});

