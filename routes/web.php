<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureVendorProfileExist;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', 'App\Http\Controllers\GuestController@index');
Route::get('/terms-and-conditions', 'App\Http\Controllers\GuestController@termsAndConditions');
Route::get('/policies', 'App\Http\Controllers\GuestController@policies');
Route::get('/contact', 'App\Http\Controllers\GuestController@contact');
Route::get('/about', 'App\Http\Controllers\GuestController@about');
Route::get('/products', function () {
    $categoreis = \App\Models\Category::whereHas('products')->get();
    $products = \App\Models\Product::orderBy('id','desc')->take(10)->get();
    return view('guest.products', compact('categoreis','products'));
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
            Route::post('categories/search', 'CategoryController@search')->name('categories.search');
            Route::post('categories/export', 'CategoryController@export')->name('categories.export');
            Route::resource('products', 'ProductController');
            Route::post('products/search', 'ProductController@search')->name('products.search');
            Route::post('products/import', 'ProductController@importProducts')->name('products.import');
            Route::post('products/export', 'ProductController@export')->name('products.export');
            Route::resource('orders', 'OrderController');
            Route::post('orders/search', 'OrderController@search')->name('orders.search');
            Route::post('orders/export', 'OrderController@export')->name('orders.export');
            Route::get('/orders-status/{status}', 'OrderController@showStatusOrders')->name('orders.status');
            Route::resource('users', 'UserController');
            Route::post('users/search', 'UserController@search')->name('users.search');
            Route::resource('dropshippers', 'DropShipperController');
            Route::post('dropshippers/search', 'DropShipperController@search')->name('dropshippers.search');
            Route::post('dropshippers/export', 'DropShipperController@export')->name('dropshippers.export');
            Route::get('/users-status/{status}', 'UserController@showStatusUser')->name('user.status');
            Route::get('/dropshipper-status/{status}', 'DropShipperController@showStatusUser')->name('dropshippers.status');
            Route::resource('shippers', 'ShipperController');
            Route::resource('payments', 'PaymentController');
        });
    });

    Route::namespace('App\Http\Controllers\Vendor')->middleware(['validprofile'])->group(function() {
        Route::group(['prefix' => 'vendor','as' => 'vendor.'], function() {
            Route::resource('orders', 'OrderController');
            Route::post('orders/export', 'OrderController@export')->name('orders.export');
            Route::post('/orders-status/{status}', 'OrderController@showStatusOrder')->name('orders.status');   
            Route::resource('bank-account', 'BankAccountController');
            Route::resource('bank-transactions', 'BankTransactionController');  
            Route::post('bank-transactions-serach', 'BankTransactionController@search')->name('bank-transactions.search');  
            Route::resource('revenue', 'RevenueController');  
            Route::post('revenue-search', 'RevenueController@search')->name('revenue.search');
            Route::get('/orders-import', 'App\Http\Controllers\Vendor\OrderController@import');
            Route::get('/orders-status/{status}', 'App\Http\Controllers\Vendor\OrderController@showStatusOrder');
            Route::post('/orders-import', 'App\Http\Controllers\Vendor\OrderController@importStore');
            Route::resource('profile', 'ProfileController')->withoutMiddleware('validprofile');
        });
    });

    Route::namespace('App\Http\Controllers\Dispatcher')->group(function() {
        Route::group(['prefix' => 'dispatcher','as' => 'dispatcher.'], function() {
            Route::resource('orders', 'OrderController');
            Route::post('/orders-status/{status}', 'OrderController@showStatusOrder')->name('orders.status');
            Route::post('/orders-search', 'OrderController@search')->name('orders.search');
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
    $image = \App\Helper\MediaHelper::url('https://ae-pic-a1.aliexpress-media.com/kf/Sfb172da41f334e608e5260f23fb7dcecN/Bluetooth-5-3-Earphones-True-Wireless-Headphones-with-Mic-Button-Control-Noise-Reduction-Earhooks-Waterproof-Headset.jpg_.webp', 1, 'App\Models\User');
});