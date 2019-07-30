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


Auth::routes();

Route::get('/', 'eventsController@index');
Route::get('/created', 'eventsController@created');
Route::get('/accepted', 'eventsController@accepted');
Route::get('/pending', 'eventsController@pending');
Route::get('/create', 'eventsController@createEventForm');
Route::post('/create', 'eventsController@create');
Route::post('/inv', 'eventsController@invite');
