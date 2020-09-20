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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('frontend.home');
Route::get('about-us', 'HomeController@aboutUs')->name('frontend.about');

Route::group(['prefix' => 'user', 'namespace' => 'Individual', 'middleware' => ['auth', 'individual'] ], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('individual.dashboard'); 
    Route::get('profile', 'UserController@profile')->name('individual.profile');
    Route::PUT('profile', 'UserController@profileUpdate')->name('individual.profile.update');

    Route::get('/program', 'ProgramController@index')->name('individual.program');
    Route::post('payment/response', 'ProgramController@paymentResponse')->name('payment.response');
    Route::post('/hash', 'ProgramController@hash')->name('generate.hash');

});
