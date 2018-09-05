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

Route::get('/', 'PropertyController@index');
Route::get('/{id}', 'PropertyController@show');
Route::get('/add/{id}', 'PropertyController@create');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
