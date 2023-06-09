<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JenissuratController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuratkeluarCOntroller;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/auth', [LoginController::class, 'login'])->name('auth');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    //USER
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/add', [UserController::class, 'create']);
    Route::post('/users/add', [UserController::class, 'store']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::put('/users/edit/{id}', [UserController::class, 'update']);
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);

    //ROLE
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/role/add', [RoleController::class, 'create']);
    Route::post('/role/add', [RoleController::class, 'store']);
    Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
    Route::put('/role/edit/{id}', [RoleController::class, 'update']);
    Route::delete('/role/delete/{id}', [RoleController::class, 'destroy']);

    //DIVISI
    Route::get('/divisi', [DivisiController::class, 'index']);
    Route::get('/divisi/add', [DivisiController::class, 'create']);
    Route::post('/divisi/add', [DivisiController::class, 'store']);
    Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit']);
    Route::put('/divisi/edit/{id}', [DivisiController::class, 'update']);
    Route::delete('/divisi/delete/{id}', [DivisiController::class, 'destroy']);

    //DISPOSISI
    Route::get('/disposisi', [DisposisiController::class, 'index']);
    Route::get('/disposisi/add', [DisposisiController::class, 'create']);
    Route::post('/disposisi/add', [DisposisiController::class, 'store']);
    Route::get('/disposisi/edit/{id}', [DisposisiController::class, 'edit']);
    Route::put('/disposisi/edit/{id}', [DisposisiController::class, 'update']);
    Route::delete('/disposisi/delete/{id}', [DisposisiController::class, 'destroy']);

    //JENIS SURAT
    Route::get('/jenis_surat', [JenissuratController::class, 'index']);
    Route::get('/jenis_surat/add', [JenissuratController::class, 'create']);
    Route::post('/jenis_surat/add', [JenissuratController::class, 'store']);
    Route::get('/jenis_surat/edit/{id}', [JenissuratController::class, 'edit']);
    Route::put('/jenis_surat/edit/{id}', [JenissuratController::class, 'update']);
    Route::delete('/jenis_surat/delete/{id}', [JenissuratController::class, 'destroy']);


    //SURAT MASUK
    Route::get('/surat_masuk', [SuratmasukController::class, 'index']);
    Route::get('/surat_masuk/add', [SuratmasukController::class, 'create']);
    Route::post('/surat_masuk/add', [SuratmasukController::class, 'store']);
    Route::get('/surat_masuk/edit/{id}', [SuratmasukController::class, 'edit']);
    Route::put('/surat_masuk/edit/{id}', [SuratmasukController::class, 'update']);
    Route::delete('/surat_masuk/delete/{id}', [SuratmasukController::class, 'destroy']);
    Route::get('/surat_masuk/details/{id}', [SuratmasukController::class, 'show']);


    //SURAT KELUAR
    Route::get('/surat_keluar', [SuratkeluarCOntroller::class, 'index']);
    Route::get('/surat_keluar/add', [SuratkeluarCOntroller::class, 'create']);
    Route::post('/surat_keluar/add', [SuratkeluarCOntroller::class, 'store']);
    Route::get('/surat_keluar/edit/{id}', [SuratkeluarCOntroller::class, 'edit']);
    Route::put('/surat_keluar/edit/{id}', [SuratkeluarCOntroller::class, 'update']);
    Route::delete('/surat_keluar/delete/{id}', [SuratkeluarCOntroller::class, 'destroy']);
    Route::get('/surat_keluar/details/{id}', [SuratkeluarCOntroller::class, 'show']);

    //LAPORAN
    Route::get('/laporan/surat_masuk', [LaporanController::class, 'surat_masuk']);
    Route::get('/laporan/surat_keluar', [LaporanController::class, 'surat_keluar']);
    Route::post('/laporan/cetak_laporan_surat_masuk', [LaporanController::class, 'cetak_masuk']);
    Route::post('/laporan/cetak_laporan_surat_keluar', [LaporanController::class, 'cetak_keluar']);

    //LOGOUT
    Route::get('/logout', [LoginController::class, 'logout']);
});
