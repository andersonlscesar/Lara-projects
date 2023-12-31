<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;

Route::get('/', WelcomeController::class)->name('welcome');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/settings/profile-information', ProfileController::class)->name('contacts.profile-information');
    Route::get('/settings/password', PasswordController::class)->name('user-password.edit');
    Route::get('/dashboard', DashboardController::class )->name('contacts.dashborad');
    Route::delete('/contacts/{contact}/restore', [ContactController::class, 'restore'])->name('contacts.restore')->withTrashed();
    Route::delete('/contacts/{contact}/force-delete', [ContactController::class, 'forceDelete'])->name('contacts.force-delete')->withTrashed();
    Route::resource('/contacts', ContactController::class);
});