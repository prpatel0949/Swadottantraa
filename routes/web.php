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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('frontend.home');
Route::get('about-us', 'HomeController@aboutUs')->name('frontend.about');
Route::get('brain-and-mind-gym', 'HomeController@BrainAndMindGym')->name('frontend.bamg');
Route::get('emr', 'HomeController@EMR')->name('frontend.emr');
Route::get('offline', 'HomeController@offline')->name('frontend.offline');
Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('frontend.privacy_policy');
Route::get('terms-and-conditions', 'HomeController@termsAndConditions')->name('frontend.terms_and_conditions');
Route::get('psyheal', 'HomeController@psyheal')->name('frontend.psyheal');
Route::get('psytele', 'HomeController@psytele')->name('frontend.psytele');
Route::get('selfie', 'HomeController@selfie')->name('frontend.selfie');

Route::group(['prefix' => 'user', 'namespace' => 'Individual', 'middleware' => ['auth', 'individual', 'verified'] ], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('individual.dashboard');
    Route::get('profile', 'UserController@profile')->name('individual.profile');
    Route::PUT('profile', 'UserController@profileUpdate')->name('individual.profile.update');

    Route::get('/program', 'ProgramController@index')->name('individual.program');
    Route::post('payment/response', 'ProgramController@paymentResponse')->name('payment.response');
    Route::post('/hash', 'ProgramController@hash')->name('generate.hash');

    Route::group(['middleware' => ['program.active', 'program.subscribe' ]], function () {
        Route::get('/program/{id}', 'ProgramController@accessProgram')->name('individual.program.access');
        Route::get('/program/{id}/{stage_id}', 'ProgramController@accessProgramStage')->name('individual.program.stage');
        Route::get('/program/{id}/{stage_id}/{step_id}', 'ProgramController@accessProgramStep')->name('individual.program.step');
        Route::post('program/{id}/question/answer', 'ProgramController@questionAnswer')->name('program.question.answer'); 
    });

    Route::get('support', 'SupportController@index')->name('support.index');
    Route::post('support', 'SupportController@store')->name('support.store');

    Route::get('join/franchisee/{token}', 'UserController@acceptInvitation')->name('user.join.franchisee');

    Route::post('program/{id}/question_answer', 'ProgramController@scaleQuestionAnswer')->name('user.program.question_answer');

});

Route::group(['prefix' => 'franchisee', 'namespace' => 'Franchisee', 'middleware' => [ 'auth', 'franchisee' ] ], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('franchisee.dashboard');
    Route::get('clients', 'UserController@list')->name('franchisee.clients');
    Route::post('client/invite', 'UserController@invite')->name('franchisee.client.invite');
    Route::get('profile', 'UserController@profile')->name('franchisee.profile');
    Route::PUT('profile', 'UserController@profileUpdate')->name('franchisee.profile.update');

    Route::get('support', 'SupportController@index')->name('franchisee.support.index');
    Route::post('support', 'SupportController@store')->name('franchisee.support.store');
});


Route::group(['prefix' => 'institue', 'namespace' => 'Institue', 'middleware' => ['auth', 'institue' ] ], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('institue.dashboard');
    Route::get('/users', 'UserController@index')->name('institue.users');

    Route::post('user/approve/{id}', 'UserController@approveUser')->name('user.approve');
    Route::post('user/reject/{id}', 'UserController@approveReject')->name('user.reject');

    Route::get('support', 'SupportController@index')->name('institue.support.index');
    Route::post('support', 'SupportController@store')->name('institue.support.store');

    Route::get('profile', 'UserController@profile')->name('institue.profile');
    Route::PUT('profile', 'UserController@profileUpdate')->name('institue.profile.update');
});

Route::get('happiness', 'HomeController@happiness')->name('happiness');
Route::get('question', 'HomeController@question')->name('question');
Route::post('question/next', 'HomeController@nextQuestion')->name('question.next');
Route::post('question/tag', 'HomeController@storeTags')->name('question.tag');
