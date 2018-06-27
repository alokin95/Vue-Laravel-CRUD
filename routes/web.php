<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@allUsers');

Route::post('/user', 'UserController@addUser');

Route::post('/user-delete', 'UserController@deleteUser');

Route::get('/user/{id}', 'UserController@singleUser');
