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
    return view('auth.login');
});

Auth::routes();

Route::resource('/home', 'ClientController');
Route::post('/client/save/info','ClientController@saveClient');
Route::post('/client/save/application','ClientController@saveClientApplication');
Route::post('/client/save/requirements','ClientController@saveClientRequirements');
Route::get('/exam','ClientController@entranceExam');
