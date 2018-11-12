<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'PropertyController@index');
Route::get('/{id}', 'PropertyController@show');
Route::get('/find/{name}', 'PropertyController@find');
Route::get('/add/{name}', 'PropertyController@create');
Route::get('/del/{id}', 'PropertyController@destroy');