<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureVendorProfileExist;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', 'App\Http\Controllers\GuestController@index');
Route::get('/terms-and-conditions', 'App\Http\Controllers\GuestController@termsAndConditions');
Route::get('/policies', 'App\Http\Controllers\GuestController@policies');
Route::get('/contact', 'App\Http\Controllers\GuestController@contact');
Route::get('/products', function () {
    $categoreis = \App\Models\Category::all();
    return view('guest.products', compact('categoreis'));
});

// auth routes
Route::get('/signup', 'App\Http\Controllers\AuthController@signup');
Route::post('/signup', 'App\Http\Controllers\AuthController@postSignup');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@postLogin');

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth')->name('logout');


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\AuthController@dashboard' )->name('dashboard')
    ->middleware('validprofile');
    // logout route
    // change password route
    Route::get('change-password', 'App\Http\Controllers\AuthController@changePassword');
    Route::post('change-password', 'App\Http\Controllers\AuthController@postChangePassword')->name('change.password');
    Route::namespace('App\Http\Controllers\Admin')->group(function () {
        Route::group(['prefix' => 'admin','as' => 'admin.'], function() {
            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
            Route::resource('orders', 'OrderController');
            Route::get('/orders-status/{status}', 'OrderController@showStatusOrders')->name('orders.status');
            Route::resource('users', 'UserController');
            Route::get('/users-status/{status}', 'UserController@showStatusUser')->name('user.status');
            Route::resource('shippers', 'ShipperController');
            Route::resource('payments', 'PaymentController');
        });
    });

    Route::namespace('App\Http\Controllers\Vendor')->middleware(['validprofile'])->group(function() {
        Route::group(['prefix' => 'vendor','as' => 'vendor.'], function() {
            Route::resource('orders', 'OrderController');        
            Route::resource('bank-account', 'BankAccountController');
            Route::resource('bank-transactions', 'BankTransactionController');  
            Route::resource('revenue', 'RevenueController');  
            Route::get('/orders-import', 'App\Http\Controllers\Vendor\OrderController@import');
            Route::get('/orders-status/{status}', 'App\Http\Controllers\Vendor\OrderController@showStatusOrder');
            Route::post('/orders-import', 'App\Http\Controllers\Vendor\OrderController@importStore');
            Route::resource('profile', 'ProfileController')->withoutMiddleware('validprofile');
        });
    });

    Route::namespace('App\Http\Controllers\Dispatcher')->group(function() {
        Route::group(['prefix' => 'dispatcher','as' => 'dispatcher.'], function() {
            Route::resource('orders', 'OrderController');
            Route::post('/print-orders-label', 'OrderController@printLabel')->name('print.order.label');
            Route::post('/print-orders-stock', 'OrderController@printStcok')->name('print.order.stock');
        });
    });
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', 'App\Http\Controllers\AuthController@forgotPassword')->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}','App\Http\Controllers\AuthController@resetPassword')->middleware('guest')->name('password.reset');
Route::post('/reset-password','App\Http\Controllers\AuthController@postResetPassword')->middleware('guest')->name('password.update');



Route::get('/test-api', function(){
    $user = \App\Models\User::find(1);
    $status = Mail::to('mazeemrehan@gmail.com')->send(new \App\Mail\AccountStatus($user));
    return 'email sent';
});