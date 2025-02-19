<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\MasterDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Backend
Route::prefix('admin/{slugMenu}/{slugSubMenu}')->group(function () {
    // View Halaman
    Route::controller(BackController::class)->group(function () {
        Route::get('/', 'index')->name('admin.viewHalaman');
        Route::post('/tambah-menu', 'tambahMenu')->name('admin.tambahMenu');
    });

    // Master Data
    Route::controller(MasterDataController::class)->group(function () {
        Route::put('/update-menu/{idMenu}', 'updateMenu')->name('admin.updateMenu');
        Route::post('/tambah-submenu', 'tambahSubMenu')->name('admin.tambahSubMenu');
        Route::put('/update-submenu/{idSubMenu}', 'updateSubMenu')->name('admin.updateSubMenu');
    });
});
