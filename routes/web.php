<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::post('/store-string', 'WelcomeController@store')->name('welcome.store');
