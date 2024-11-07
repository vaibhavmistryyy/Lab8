<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Default route to return the welcome view
Route::get('/', function () {
    return view('welcome');
});

// Route for the dashboard (only accessible by authenticated and verified users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');   // Show profile edit form
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile details
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile
});

// Include the authentication routes provided by Laravel
require __DIR__.'/auth.php';
