<?php

use Illuminate\Http\Request;

Route::post('/stand','StandController@store');
Route::get('/stand','StandController@index');
Route::get('stand/{id}','StandController@show');
Route::patch('/stand/{id}','StandController@update');
Route::delete('/stand/{id}','StandController@destroy');

Route::post('/product','ProductController@store');
Route::get('/product','ProductController@index');
Route::get('/product/{id}','ProductController@show');
Route::patch('/product/{id}','ProductController@update');
Route::delete('/product/{id}','ProductController@destroy');
