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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/tracks', 'PlaylistController@index');
Route::get('/tracks/{id}', 'PlaylistController@show');
Route::post('/tracks', 'PlaylistController@store');
Route::put('/tracks/{id}', 'PlaylistController@update');
Route::delete('/tracks/{id}', 'PlaylistController@destroy');
