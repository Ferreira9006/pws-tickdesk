<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Admin Category Routes
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/show/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::get('/admin/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

// Admin Priority Routes
Route::get('/admin/priority', [PriorityController::class, 'index'])->name('admin.priority.index');
Route::get('/admin/priority/create', [PriorityController::class, 'create'])->name('admin.priority.create');
Route::post('/admin/priority/store', [PriorityController::class, 'store'])->name('admin.priority.store');
Route::get('/admin/priority/show/{priority}', [PriorityController::class, 'show'])->name('admin.priority.show');
Route::get('/admin/priority/edit/{priority}', [PriorityController::class, 'edit'])->name('admin.priority.edit');
Route::put('/admin/priority/update/{priority}', [PriorityController::class, 'update'])->name('admin.priority.update');
Route::delete('/admin/priority/destroy/{priority}', [PriorityController::class, 'destroy'])->name('admin.priority.destroy');