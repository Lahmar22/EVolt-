<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('welcome'); 
})->name('login');




Route::get('/dashboard', function(){
    return view('user/dashboard');
})->name('dashboard');
