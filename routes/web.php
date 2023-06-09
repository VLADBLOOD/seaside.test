<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomePageController@index')->name('home');
Route::get('shop', 'ProductController@index')->name('shop');
Route::get('product/{id}', 'ProductController@show');

Route::view('login', 'login')->name('login');
Route::post('login', 'AuthController@postLogin')->name('login');

Route::view('registration', 'registration')->name('registration');
Route::post('registration', 'AuthController@postRegistration')->name('registration');

Route::group(['middleware' => 'auth'], function () {
    Route::get('cart', 'CartController@index');
    Route::get('cart/count', 'CartController@count');
    Route::post('cart/add-product', 'CartController@pull');
    Route::get('cart/delete/{id}', 'CartController@deleteCartItem');

    Route::get('admin', 'ProductController@administration');
    Route::post('product', 'ProductController@createProduct');

    Route::get('logout', 'AuthController@logout')->name('logout');
});

