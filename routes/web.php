<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MataKuliahController;

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

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/mata-kuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/mata-kuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::get('/matakuliah/create', [MataKuliahController::class, 'create']);
Route::post('/mata-kuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
Route::post('/matakuliah', [MataKuliahController::class, 'store']);

Route::get('/mata-kuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/mata-kuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/mata-kuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit']);
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update']);
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy']);

