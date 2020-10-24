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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('frontend.home');
Route::get('about-us', 'HomeController@aboutUs')->name('frontend.about');
Route::get('brain-and-mind-gym', 'HomeController@BrainAndMindGym')->name('frontend.bamg');
Route::get('emr', 'HomeController@EMR')->name('frontend.emr');

Route::group(['prefix' => 'user', 'namespace' => 'Individual', 'middleware' => ['auth', 'individual', 'verified'] ], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('individual.dashboard'); 
    Route::get('profile', 'UserController@profile')->name('individual.profile');
    Route::PUT('profile', 'UserController@profileUpdate')->name('individual.profile.update');

    Route::get('/program', 'ProgramController@index')->name('individual.program');
    Route::post('payment/response', 'ProgramController@paymentResponse')->name('payment.response');
    Route::post('/hash', 'ProgramController@hash')->name('generate.hash');
    Route::get('/program/{id}/access', 'ProgramController@accessProgram')->name('individual.program.access');
    Route::post('program/{id}/question/answer', 'ProgramController@questionAnswer')->name('program.question.answer');

    Route::get('support', 'SupportController@index')->name('support.index');
    Route::post('support', 'SupportController@store')->name('support.store');

    Route::get('join/franchisee/{token}', 'UserController@acceptInvitation')->name('user.join.franchisee');
    
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

Route::get('happiness', 'HomeController@happiness')->name('happiness');
Route::get('question', 'HomeController@question')->name('question');
Route::post('question/next', 'HomeController@nextQuestion')->name('question.next');