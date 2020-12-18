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

Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/adicionar', 'SeriesController@create')->name('add_serie');
//dar um nome permite trocar a url sem interferir nas parte que estão chamando
Route::post('/series/adicionar', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');





