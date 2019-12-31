<?php
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'PagesController@setting');
    Route::get('/appmanger', 'AppMangerController@index')->name('appmanger.index');
    Route::get('/appmanger/create', 'AppMangerController@create')->name('appmanger.create');
    Route::post('/appmanger', 'AppMangerController@store')->name('appmanger.store');
    Route::get('/appmanger/{appmanger}', 'AppMangerController@show')->name('appmanger.show');
    Route::get('/appmanger/{appmanger}/edit', 'AppMangerController@edit')->name('appmanger.edit');
    Route::put('/appmanger/{appmanger}', 'AppMangerController@update')->name('appmanger.update');
    Route::delete('/appmanger/{appmanger}', 'AppMangerController@destroy')->name('appmanger.destroy');
    Route::get('/appmanger/{appmanger}/{type}/All', 'AppMangerController@type')->name('appmanger.type');
    Route::post('/appmanger/{appmanger}/{type}/typeStore', 'AppMangerController@typeStore')->name('appmanger.typeStore');
    Route::get('/appmanger/{appmanger}/{type}/selected/{section}', 'AppMangerController@typeShow')->name('appmanger.section.show');
    Route::post('/sections/{section}/update', 'AppMangerController@sectionUpdate')->name('appmanger.section.update');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

