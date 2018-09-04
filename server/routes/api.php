<?php

// complaints
Route::post('complaints', 'ComplaintController@store');
Route::get('complaints', 'ComplaintController@fetch');

// users
Route::post('login', 'UserController@login');
