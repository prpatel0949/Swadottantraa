<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');
});


Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::resource('program', 'ProgramController');

    Route::resource('scale', 'ScaleController');
    Route::resource('workout', 'WorkoutController');

    Route::get('framchisee/{id}/users', 'FranchiseeController@users')->name('franchisee.user');
    Route::resource('franchisee', 'FranchiseeController');

    Route::get('support', 'SupportController@index')->name('support.index');
    Route::get('support/{id}/edit', 'SupportController@edit')->name('support.edit');
    Route::put('support/{id}/update', 'SupportController@update')->name('support.update');

    Route::group([ 'prefix' => 'report' ], function () {
        Route::get('program', 'ReportController@program')->name('report.program');
        Route::post('program/list', 'ReportController@programList')->name('report.program.list');
    });

});