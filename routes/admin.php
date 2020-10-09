<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');
});


Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('program', 'ProgramController');
});