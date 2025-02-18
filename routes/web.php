<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Backend
Route::controller(BackController::class)->group(function () {
    Route::get('admin/{slugMenu}/{slugSubMenu}', 'index')->name('admin.viewHalaman');
});
