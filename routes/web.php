<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureVendorProfileExist;
Route::get('/', function () {
    return view('guest.index');
});

Route::get('/about', function () {
    return view('guest.index');
});

Route::get('/products', function () {
    $categoreis = \App\Models\Category::all();
    return view('guest.products', compact('categoreis'));
});

// auth routes
Route::get('/signup', 'App\Http\Controllers\AuthController@signup');
Route::post('/signup', 'App\Http\Controllers\AuthController@postSignup');
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@postLogin');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\AuthController@dashboard' )->name('dashboard')
    ->middleware('validprofile');
    // logout route
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
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
            Route::resource('revenue', 'RevenueContwroller');  
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


Route::get('/test-api', function(){
    $user = \App\Models\User::find(1);
    $status = Mail::to('mazeemrehan@gmail.com')->send(new \App\Mail\AccountStatus($user));
    return 'email sent';
});