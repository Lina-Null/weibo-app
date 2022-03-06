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
Route::get('/register','User\RegisterController@register')->name('user.register');