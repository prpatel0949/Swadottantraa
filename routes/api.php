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

Route::group(['middleware' => [ 'api', 'auth:client', 'client.activity' ]], function () {
    Route::post('user/change_passwod', 'ClientController@changePassword');

    Route::get('emotions', 'EmotionController@index');
    Route::get('emotions_pain_intensity', 'EmotionController@getEmotionPainIntensity');
    Route::post('emotions_injuries', 'EmotionController@getEmotionInjuries');

    Route::get('tips', 'GeneralController@getTips');
    Route::get('traumas', 'GeneralController@getTraumas');
    Route::get('menu_links', 'GeneralController@getMenuLinks');
    Route::get('images', 'GeneralController@getImages');

    Route::get('scale_question_answers', 'GeneralController@getScaleQuestionAnswers');
    Route::post('scale_question_answers', 'GeneralController@storeScaleQuestionAnswers');

    Route::post('emotions_injuries/create', 'EmotionController@storeEmotionInjuries');

    Route::post('code', 'ClientController@applyCode');

    Route::post('user/transaction', 'ClientController@setTransaction');
    Route::get('user/transaction', 'ClientController@getTransaction');

    Route::get('subsciptions', 'GeneralController@getSubsciptions');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'ClientController@generateToken');
