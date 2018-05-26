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

Route::get('/uploadfile','UploadController@getView');
//--------------upload file nad store in database
Route::post('/insertfile',array('as'=>'insertfile','uses'=>'UploadController@insertFile'));



Route::get('/surveylist','ViewSurveysController@getSurveys');
Route::post('/surveylist/survey','ViewSurveysController@openSurvey');


Route::get('/users', 'ViewUsersController@getUsers');
Route::post('/users', 'ViewUsersController@setStatusUsers');


Route::post('/register/registerAdd', 'RegistersController@registerAdd');
Route::post('/loginme', 'LogController@login');

Route::get('/logout', 'LogController@logout');


