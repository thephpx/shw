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
    return view('welcome');
});

Route::get('/tasks','TaskController@tasks')->middleware('auth');
Route::get('/task/add','TaskController@add')->middleware('auth');
Route::post('/task/add','TaskController@addPost')->middleware('auth');
Route::get('/task/edit/{id}','TaskController@edit')->middleware('auth');
Route::post('/task/edit/{id}','TaskController@editPost')->middleware('auth');
Route::get('/task/delete/{id}','TaskController@delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
