<?php

use App\Http\Controllers\AddToolsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayItemsController;



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('home', 'home')
    ->middleware(['auth'])
    ->name('home');


Route::get('/home', [DisplayItemsController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::post('/add-tool', [AddToolsController::class, 'store'])
    ->name('tools.store');




require __DIR__ . '/auth.php';
