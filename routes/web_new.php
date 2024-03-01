<?php

use App\Http\Controllers\Customer\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ServiceController;

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

Route::view('/', 'auth.login', ['url' => 'user']);
Auth::routes(['verify' => true]);

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/user', [LoginController::class, 'showUserLoginForm']);
Route::get('/register/user', [RegisterController::class, 'showUserRegisterForm']);

Route::post('/login/admin', [LoginController::class, 'login']);
Route::post('/login/user', [LoginController::class, 'login'])->name('login.user');
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/user', [RegisterController::class, 'createUser'])->name('register');

Route::view('/home', 'home')->middleware('auth');
Route::view('admin', '/admin/customer/list');
Route::view('user', '/customer/Property/list');
Route::view('thank-you', '/thank-you');

// Logout route for the user guard
Route::post('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');
Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

Route::group(['prefix' => 'user', 'namespace' => 'App\Http\Controllers\Customer'], function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('user.profile.index');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('user.profile.update');


    Route::resource('property', 'PropertyController')->names('user.property');
    Route::get('/fetch-more-media', 'PropertyController@fetchMoreMedia');
    Route::get('property/{property}/services/{service}', 'ServiceController@show')->name('user.service.show');
    Route::delete('/delete-media/{mediaId}', 'PropertyController@deleteMedia')->name('media.delete');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('profile', [ProfileController::class, 'adminProfile'])->name('admin.profile.index');
    Route::put('profile/update', [ProfileController::class, 'adminUpdate'])->name('admin.profile.update');

    Route::resource('customer', 'CustomerController')->names('admin.customer');
    Route::get('/property-details/{id}', 'CustomerController@propertyDetails')->name('admin.property.details');
    Route::get('/request', 'RequestController@index')->name('admin.request');
    Route::post('/search-properties', 'CustomerController@searchProperties')->name('search.properties');
    Route::post('/update-customer-status', 'CustomerController@updateStatus')->name('update.customer.status');
    // Route::resource('services', 'ServiceController')->names('admin.service');
    Route::get('property/{property}/services/{service}', 'ServiceController@show')->name('admin.service.show');
    Route::post('/upload', 'CustomerController@upload')->name('upload');
    Route::delete('/documents/{id}', 'CustomerController@deleteDocument')->name('delete.document');

});