<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use Illuminate\Http\Request;

Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('users', 'Api\UserController', ['only' => ['index', 'show']]);
    Route::resource('branches', 'Api\BranchController', ['only' => ['index', 'show']]);
    Route::resource('departments', 'Api\DepartmentController', ['only' => ['index', 'show']]);
    Route::resource('positions', 'Api\PositionController', ['only' => ['index', 'show']]);

    Route::get('user', 'Api\UserController@user')->name('user.show');

});
