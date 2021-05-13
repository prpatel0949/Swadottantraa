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

    Route::post('user/mood_marks', 'GeneralController@storeMoodMarks');

    Route::post('user/answer', 'GeneralController@submitAnswer');

    Route::get('trauma_copying_cart', 'GeneralController@getTraumaCopyingCart');

    Route::post('sleep_tracker/create', 'GeneralController@storeSleepTracker');

    Route::post('gratitude/answer', 'GeneralController@storeGratitudeAnswer');

    Route::get('institue/dashboard', 'GeneralController@getInstitueList');

    Route::post('exercise/tracker', 'GeneralController@storeExerciseTracker');

    Route::post('profile/update', 'ClientController@updateProfile');
    
    Route::get('user', 'ClientController@getUserInfo');

    Route::post('user/info', 'ClientController@setUserInfo');

    Route::get('sleep_tracker/anaysis', 'GeneralController@getSleepTrackerAnalysis');

    Route::get('exercise_tracker/anaysis', 'GeneralController@getExerciseTrackerAnalysis');

    Route::get('gratitude_tracer/anaysis', 'GeneralController@getGratitudeTrackerAnalysis');

    Route::post('payment', 'ClientController@payment');

    Route::post('mood_marks', 'GeneralController@getMoodMarks');

    Route::post('emrgncy_contact_and_payment', 'ClientController@updateEmrgncyContactAndPayment');

    Route::post('user/menu', 'GeneralController@storeUserMenu');

    Route::post('payu_money_param', 'GeneralController@getPayuMoneyParam');

    Route::post('validate/code', 'GeneralController@validateCode');

});

Route::post('login', 'ClientController@generateToken');
