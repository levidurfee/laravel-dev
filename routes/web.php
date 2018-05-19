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

Route::get('/encryption', 'EncryptionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/react-login', 'ApiAuthController@index');
Route::post('/api/v1/login', 'ApiAuthController@login');
