<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PengaturanController;
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

    // Pengaturan
    Route::controller(PengaturanController::class)->group(function () {
        Route::post('/reset', 'resetTampilan')->name('admin.resetTampilan');
        Route::put('/update/{jenis}', 'updateTampilan')->name('admin.updateTampilan');
        Route::post('/tambah-role', 'tambahRole')->name('admin.tambahRole');
        Route::put('/update-role/{idRole}', 'updateRole')->name('admin.updateRole');
        Route::post('/beri-akses', 'beriAkses')->name('admin.beriAkses');
    });
});
