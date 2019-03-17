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

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/film/{slug}', 'FilmController@show')->name('film');
Route::resource('/films', 'FilmController');

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');
