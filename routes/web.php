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

// Route::get('/', function () {
//     return view('welcome');
//});

Auth::routes();


Route::get('/', 'PagesController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'PagesController@create');
Route::post('/show', 'PagesController@store');
Route::get('/show', 'PagesController@show');
Route::get('/show/{username}/edit', 'PagesController@edit');
Route::patch('/show/{username}', 'PagesController@update');
Route::delete('/show/{username}', 'PagesController@destroy');
