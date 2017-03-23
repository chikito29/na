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
use Illuminate\Http\Request;

Auth::routes();
Route::resource('applications', 'ApplicationController');
Route::resource('users', 'UserController');

Route::get('/', function () {return view('welcome');});
Route::get('logout', 'UserController@logout')->name('users.logout');
Route::get('dashboard', 'HomeController@index');
