<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class , 'index'])->name('dashboard');
Route::post('/ideas/{idea}/comments', [CommentController::class , 'store'])->name('ideas.comments.store')->middleware('auth');
Route::resource('ideas', DashboardController::class)->except(['index', 'create']);

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

























Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/register', [AuthController::class , 'store'])->name('register.store');
Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class , 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');