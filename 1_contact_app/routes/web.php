<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactController;

Route::get('/', WelcomeController::class)->name('welcome');
Route::resource('/contacts', ContactController::class);