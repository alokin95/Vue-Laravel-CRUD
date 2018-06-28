<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@allUsers'); //Fetch all users

Route::post('/user', 'UserController@addUser'); //Adds new user to the database

Route::post('/user-delete', 'UserController@deleteUser'); //Deletes user from the database

Route::get('/user/{id}', 'UserController@singleUser'); //Fetch user by ID
