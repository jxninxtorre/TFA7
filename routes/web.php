<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/task', 'task');

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);