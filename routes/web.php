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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::post('/grids', 'gameOfLifeController@store');
Route::patch('/grids/{id}', 'gameOfLifeController@blank');
//Route::get('/grids/{id}', 'gameOfLifeController@get');
Route::get('/grids/{id}', 'gameOfLifeController@represent');

//Route::get('/grids/{id}', 'gameOfLifeController@grids');
//Route::get('/grids/{id}', 'gameOfLifeController@grids');