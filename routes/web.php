<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');

Route::get('/country/{iso}','CountryController@link');
Route::post('/country','CountryController@search');

Route::get('/infected','InfectedController@index');
Route::post('/infected-insert', 'InfectedController@insert')->name('Infected-insert');
