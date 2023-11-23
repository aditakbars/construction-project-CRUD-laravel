<?php

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