<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('properties/search', 'PropertyController@search')->middleware('auth');
Route::resource('properties', 'PropertyController')->middleware('auth');

Route::get('bookingdates/search', 'BookingDateController@search')->middleware('auth');
Route::resource('bookingdates', 'BookingDateController')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
