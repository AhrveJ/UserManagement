<?php

use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserManagementController::class, 'index'])->name('users.index');
Route::get('/user-management', [UserManagementController::class, 'index'])->name('users.index.alt');
