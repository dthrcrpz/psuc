<?php

// complaints
Route::post('complaints', 'ComplaintController@store');

// users
Route::post('login', 'UserController@login');
