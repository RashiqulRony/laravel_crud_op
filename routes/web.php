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

Route::get('/','StudentController@index');
Route::post('/student/store','StudentController@studentStore');
Route::get('/student/edit/{id}','StudentController@studentEdit');
Route::post('/student/update/{id}','StudentController@studentUpdate');
Route::get('/student/delete/{id}','StudentController@studentDelete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
