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
Route::get('/', 'LogController@index');

Route::get('/register', function () {
    return view('register');
});

Route::get('/addatricle', function() {
    return view('addarticle');
});

Route::get('/users', function () {
    return view('users');
});


Route::post('/register/registerAdd', 'RegistersController@registerAdd');

Route::post('/loginme', 'LogController@login');

