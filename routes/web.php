<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\LaporanController;

// LOGIN
Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.proses');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index']);

// PERIZINAN
Route::get('/perizinan', [PerizinanController::class, 'index']);

Route::post('/perizinan', [PerizinanController::class, 'store']);

Route::put('/perizinan/{id}', [PerizinanController::class, 'update']);

Route::delete('/perizinan/{id}', [PerizinanController::class, 'destroy']);

// IMPORT EXPORT EXCEL
Route::get('/export-excel', [ExportExcelController::class, 'index']);

Route::post('/import-excel', [ExportExcelController::class, 'import']);

Route::delete('/import-history/{id}', [ExportExcelController::class, 'destroy']);

// LAPORAN
Route::get('/laporan', [LaporanController::class, 'index']);

Route::get('/laporan/excel', [LaporanController::class, 'excel']);

Route::get('/laporan/print', [LaporanController::class, 'print']);
