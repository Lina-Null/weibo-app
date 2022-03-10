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

Route::get('/', 'StaticPage\StaticPageController@home')->name('index');
Route::get('/help', 'StaticPage\StaticPageController@help');
Route::get('/about', 'StaticPage\StaticPageController@about');

Route::get('/signup','User\RegisterController@signup')->name('user.signup');
Route::resource('users','User\UserController');
/*

Route::get('/users', 'User\UserControllerr@index')->name('users.index');
Route::get('/users/create', 'User\UserController@create')->name('users.create');
Route::get('/users/{user}', 'User\UserController@show')->name('users.show');
Route::post('/users', 'User\UserController@store')->name('users.store');
Route::get('/users/{user}/edit', 'User\UserController@edit')->name('users.edit');
Route::patch('/users/{user}', 'User\UserController@update')->name('users.update');
Route::delete('/users/{user}', 'User\UserController@destroy')->name('users.destroy');
*/