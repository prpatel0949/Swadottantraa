<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');
});


Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::get('program/{id}/status/update', 'ProgramController@updateStatus')->name('program.status.update');
    Route::get('program/{id}/copy', 'ProgramController@copy')->name('program.copy');
    Route::get('recommand/program', 'ProgramController@recommandProgram')->name('recommand.program');
    Route::get('recommand/program/create', 'ProgramController@createRecommandProgram')->name('recommand.program.create');
    Route::post('recommand/program/store', 'ProgramController@storeRecommandProgram')->name('recommand.program.store');
    Route::get('recommand/program/{id}/edit', 'ProgramController@editRecommandProgram')->name('recommand.program.edit');
    Route::put('recommand/program/{id}/update', 'ProgramController@updateRecommandProgram')->name('recommand.program.update');
    Route::resource('program', 'ProgramController');

    Route::resource('scale', 'ScaleController');
    Route::resource('workout', 'WorkoutController');

    Route::get('framchisee/{id}/users', 'FranchiseeController@users')->name('franchisee.user');
    Route::resource('franchisee', 'FranchiseeController');

    Route::get('support', 'SupportController@index')->name('admin.support.index');
    Route::get('support/medical', 'SupportController@index')->name('admin.support.medical.index');
    Route::get('support/{id}/edit', 'SupportController@edit')->name('admin.support.edit');
    Route::put('support/{id}/update', 'SupportController@update')->name('admin.support.update');

    Route::get('support/{id}/faq', 'SupportController@addToFAQ')->name('admin.supoort.faq');

    Route::group([ 'prefix' => 'report' ], function () {
        Route::get('program', 'ReportController@program')->name('report.program');
        Route::post('program/list', 'ReportController@programList')->name('report.program.list');
    });

    Route::get('user/answer', 'ProgramController@answers')->name('admin.user.answer');
    Route::get('user/answer/{id}/detail', 'ProgramController@answerDetail')->name('admin.user.answer.detail');

    Route::get('program/{id}/access/stages', 'ProgramController@getAccessStages')->name('program.access.stages');
    Route::post('program/{id}/access/stages', 'ProgramController@stageAccess')->name('program.add.access_stage');
    Route::post('program/answer/{id}/comment', 'ProgramController@answerComment')->name('program.answer.comment');

    Route::resource('institue', 'InstitueController');
    Route::resource('coupon', 'CouponController');
    Route::resource('faq', 'FAQController');
});