<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('shrouk/{id}', function ($id) {
    return 'welcome to my website ' . $id;
});
