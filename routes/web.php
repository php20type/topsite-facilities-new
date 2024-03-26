<?php

use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\PropertyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\NotificationController;


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
Auth::routes(['verify' => true]);

//customer.topsidefacilities.test
Route::group(['domain' => 'customer.topsidefacilities.test'], function () {
    Route::view('/', 'auth.login', ['url' => 'user'])->name('customerlogin');
    // Define routes that do not require authentication
    Route::post('/login/user', [LoginController::class, 'login'])->name('login.user');
    Route::get('/register', [RegisterController::class, 'showUserRegisterForm'])->name('customer.register');
    Route::get('/verify-account/{token}', [RegisterController::class, 'VerifyAccount'])->name('verify.account');
    Route::post('/CreateUser', [RegisterController::class, 'createUser'])->name('CreateUser');
    Route::view('/thank-you', 'thank-you');
    Route::any('/user-logout', [LoginController::class, 'logout'])->name('user.logout');

    // Protected routes that require thentication
    Route::group(['middleware' => ['auth']], function () {
        Route::view('/home', 'home');
        Route::view('/user', '/customer/Property/list');
        Route::get('profile', [ProfileController::class, 'index'])->name('user.profile.index');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
        Route::resource('property', PropertyController::class)->names('user.property');
        Route::get('property/{property}/services/{service}', [App\Http\Controllers\Customer\ServiceController::class, 'show'])->name('user.service.show');
        Route::delete('/delete-media/{mediaId}', [PropertyController::class, 'deleteMedia'])->name('media.delete');
        Route::post('/customer-update-service-status', [App\Http\Controllers\Customer\ServiceController::class, 'updateServiceStatus'])->name('customer-update-service-status');
        Route::post('/add-service', [PropertyController::class, 'addServices'])->name('add-services');
        Route::get('/customer/notifications', [App\Http\Controllers\Customer\NotificationController::class, 'index'])->name('customer.notifications.index');
        Route::post('/customer-mark-notification', [App\Http\Controllers\Customer\NotificationController::class, 'markAsRead'])->name('customer.mark.notification');

    });
});

//admin.topsidefacilities.test
Route::group(['domain' => 'admin.topsidefacilities.test'], function () {
    Route::view('/', 'auth.login', ['url' => 'admin'])->name('adminlogin');
    Route::post('/login/admin', [LoginController::class, 'login']);

    Route::get('/admin', function () {
        return view('admin.customer.list');
    });

    Route::view('admin', '/admin/customer/list');
    Route::post('/admin-logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('profile', [ProfileController::class, 'adminProfile'])->name('admin.profile.index');
    Route::put('admin-profile/update', [ProfileController::class, 'adminUpdate'])->name('admin.profile.update');
    Route::resource('customer', CustomerController::class)->names('admin.customer');
    Route::get('/property-details/{id}', [CustomerController::class, 'propertyDetails'])->name('admin.property.details');
    Route::get('/request', [RequestController::class, 'index'])->name('admin.request');
    Route::post('/search-properties', [CustomerController::class, 'searchProperties'])->name('search.properties');
    Route::post('/update-customer-status', [CustomerController::class, 'updateStatus'])->name('update.customer.status');
    Route::get('property/{property}/services/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'show'])->name('admin.service.show');
    Route::post('/admin-update-service-status', [App\Http\Controllers\Admin\ServiceController::class, 'updateServiceStatus'])->name('admin-update-service-status');
    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::post('/admin-mark-notification', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('admin.mark.notification');

});

Route::post('/upload', [CustomerController::class, 'upload'])->name('upload');
Route::delete('/documents/{id}', [CustomerController::class, 'deleteDocument'])->name('delete.document');
Route::get('/fetch-more-media', [PropertyController::class, 'fetchMoreMedia']);
