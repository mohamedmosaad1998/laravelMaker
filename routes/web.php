<?php
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'PagesController@home');
    Route::get('/appmanger', 'AppMangerController@index')->name('appmanger.index');
    Route::get('/appmanger/create', 'AppMangerController@create')->name('appmanger.create');
    Route::post('/appmanger', 'AppMangerController@store')->name('appmanger.store');
    Route::get('/appmanger/{appmanger}', 'AppMangerController@show')->name('appmanger.show');
    Route::get('/appmanger/{appmanger}/edit', 'AppMangerController@edit')->name('appmanger.edit');
    Route::put('/appmanger/{appmanger}', 'AppMangerController@update')->name('appmanger.update');
    Route::delete('/appmanger/{appmanger}', 'AppMangerController@destroy')->name('appmanger.destroy');

    Route::get('/appmanger/{appmanger}/showSections', 'AppMangerController@showSections')->name('appmanger.showSections');
    Route::get('/appmanger/{appmanger}/showSection/{section}', 'AppMangerController@showSection')->name('appmanger.showSection');
    Route::get('/appmanger/{appmanger}/Create', 'AppMangerController@createSection')->name('appmanger.section.create');
    Route::post('/appmanger/{appmanger}/SectionStore', 'AppMangerController@typeStore')->name('appmanger.typeStore');
    Route::get('/appmanger/{appmanger}/selected/{section}', 'AppMangerController@typeShow')->name('appmanger.section.show');
    Route::post('/sections/{section}/update', 'AppMangerController@sectionUpdate')->name('appmanger.section.update');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

