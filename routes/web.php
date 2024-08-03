<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// auth routes
Route::get('/signup', 'App\Http\Controllers\AuthController@signup');
Route::post('/signup', 'App\Http\Controllers\AuthController@postSignup');
Route::get('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/login', 'App\Http\Controllers\AuthController@postLogin');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('vendor.dashboard');
    })->name('dashboard');
    // logout route
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
        
    });

    Route::namespace('App\Http\Controllers\Vendor')->group(function() {
        Route::group(['prefix' => 'vendor','as' => 'vendor.'], function() {
            Route::resource('orders', 'OrderController');        
            Route::get('/orders/import', 'App\Http\Controllers\Vendor\OrderController@import');
            Route::post('/orders/import', 'App\Http\Controllers\Vendor\OrderController@importStore');
        });
    });
});