<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todos', 'TodoController@index');
Route::post('/create/todo', 'TodoController@store');
Route::get('/edit/todo/{id}', 'TodoController@edit');
Route::post('/update/todo/{id}', 'TodoController@update');
Route::delete('/delete/todo/{id}', 'TodoController@delete');
Route::get('/filter/todos/{filterId}', 'TodoController@filter');