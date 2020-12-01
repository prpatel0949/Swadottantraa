<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('user/register', 'ClientController@register');
Route::post('user/forgot_passwod', 'ClientController@forgotPassword');
Route::post('user/reset_passwod', 'ClientController@resetPassword');

Route::group(['middleware' => ['api', 'auth:client']], function () {
    Route::post('user/change_passwod', 'ClientController@changePassword');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
