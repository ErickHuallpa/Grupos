<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

// Rutas para grupos
Route::get('/', [GroupController::class, 'index'])->name('groups.index');
Route::get('/grupos/{group}/usuarios', [GroupController::class, 'showUsers'])->name('groups.users');

// Rutas para usuarios
Route::get('/registro', [UserController::class, 'create'])->name('users.register');
Route::post('/registro', [UserController::class, 'store'])->name('users.store');
