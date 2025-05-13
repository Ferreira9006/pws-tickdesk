<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::resource('/admin/category', CategoryController::class);
Route::resource('/admin/priority', PriorityController::class);
Route::resource('/admin/level', LevelController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ticket Routes
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');

Auth::routes();