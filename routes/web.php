<?php


Route::get('/', 'HomeController@index')->name('home');
Route::get('/upload', 'UploadController@show')->name('upload');
Route::post('/upload', 'UploadController@store')->name('upload');
Route::post('/delete/{id}', 'DeleteController@destroy')->name('delete');
Route::post('/temporaryStorage', 'DragAndDropController@store')->name('temporaryStorage');
Route::post('/clicks', 'CountClicksController@store')->name('clicks');
Route::get('/banner/{id}', 'CountViewsController@index')->name('banner');
Route::get('/statistics/clicks', 'StatisticsController@indexClicks')->name('statistics.clicks');
Route::get('/statistics/views', 'StatisticsController@indexViews')->name('statistics.views');