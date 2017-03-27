<?php

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Laravel\Passport\Token;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    $role = Role::where('user_id', $request->user()->id)
                ->where('client_id', $request->client_id)
                ->first();

    $user = User::find($request->user()->id);
    $user['role'] = $role->type;
    return $user;

    //return User::with('roles.application')->find($request->user()->id);
});

Route::middleware('auth:api')->get('/logout', function (Request $request) {
    $tokens = Token::where('user_id', $request->user()->id)->update(['revoked' => true]);
    return 'User has logout.';
});
