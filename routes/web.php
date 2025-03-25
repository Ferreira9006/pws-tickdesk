<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
