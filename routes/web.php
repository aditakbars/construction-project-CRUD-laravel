<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProyekController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('klien', [KlienController::class, 'index'])->name('klien.index');
    Route::get('klien/trash', [KlienController::class, 'trash'])->name('klien.trash');
    Route::get('klien/add', [KlienController::class, 'create'])->name('klien.create');
    Route::post('klien/store', [KlienController::class, 'store'])->name('klien.store');
    Route::get('klien/{id}/edit', [KlienController::class, 'edit'])->name('klien.edit');
    Route::post('klien/{id}/update', [KlienController::class, 'update'])->name('klien.update');
    Route::post('klien/{id}/delete', [KlienController::class, 'delete'])->name('klien.delete');
    Route::post('klien/{id}/remove', [KlienController::class, 'remove'])->name('klien.remove');
    Route::post('klien/{id}/restore', [KlienController::class, 'restore'])->name('klien.restore');

    Route::get('manager', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('manager/trash', [ManagerController::class, 'trash'])->name('manager.trash');
    Route::get('manager/add', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('manager/store', [ManagerController::class, 'store'])->name('manager.store');
    Route::get('manager/{id}/edit', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::post('manager/{id}/update', [ManagerController::class, 'update'])->name('manager.update');
    Route::post('manager/{id}/delete', [ManagerController::class, 'delete'])->name('manager.delete');
    Route::post('manager/{id}/remove', [ManagerController::class, 'remove'])->name('manager.remove');
    Route::post('manager/{id}/restore', [ManagerController::class, 'restore'])->name('manager.restore');

    Route::get('vendor', [VendorController::class, 'index'])->name('vendor.index');
    Route::get('vendor/trash', [VendorController::class, 'trash'])->name('vendor.trash');
    Route::get('vendor/add', [VendorController::class, 'create'])->name('vendor.create');
    Route::post('vendor/store', [VendorController::class, 'store'])->name('vendor.store');
    Route::get('vendor/{id}/edit', [VendorController::class, 'edit'])->name('vendor.edit');
    Route::post('vendor/{id}/update', [VendorController::class, 'update'])->name('vendor.update');
    Route::post('vendor/{id}/delete', [VendorController::class, 'delete'])->name('vendor.delete');
    Route::post('vendor/{id}/remove', [VendorController::class, 'remove'])->name('vendor.remove');
    Route::post('vendor/{id}/restore', [VendorController::class, 'restore'])->name('vendor.restore');

    Route::get('proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('proyek/trash', [ProyekController::class, 'trash'])->name('proyek.trash');
    Route::get('proyek/add', [ProyekController::class, 'create'])->name('proyek.create');
    Route::post('proyek/store', [ProyekController::class, 'store'])->name('proyek.store');
    Route::get('proyek/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
    Route::post('proyek/{id}/update', [ProyekController::class, 'update'])->name('proyek.update');
    Route::post('proyek/{id}/delete', [ProyekController::class, 'delete'])->name('proyek.delete');
    Route::post('proyek/{id}/remove', [ProyekController::class, 'remove'])->name('proyek.remove');
    Route::post('proyek/{id}/restore', [ProyekController::class, 'restore'])->name('proyek.restore');
});

require __DIR__.'/auth.php';
