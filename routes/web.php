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

use App\User;

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/tokens', 'HomeController@tokens')->name('tokens')->middleware('auth');

Route::resource('doors', 'DoorController');
Route::resource('doorUsers', 'DoorUserController');
Route::resource('doorUserGrants', 'DoorUserGrantController');
Route::resource('logs', 'LogController');
