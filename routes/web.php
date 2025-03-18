<?php

// Needed for the admin route format. If using the other method, it's not needed.
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

/* 
Route::get('/admin', 'AdminController@index')->name('admin.index');
This is the other method of defining routes. 
If using this method, the use statement for HomeController is not needed.
*/   