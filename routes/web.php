<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPAController;
use App\Http\Controllers\KPPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;

use App\Http\Controllers\KorbanController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenyidikController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TersangkaController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\SerahTerimaController;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('superadmin')) {
            return redirect('superadmin');
        } elseif (Auth::user()->hasRole('pemohon')) {
            return redirect('pemohon');
        }
    }
    return redirect('/login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('daftar', [DaftarController::class, 'index']);
Route::post('daftar', [DaftarController::class, 'daftar']);
Route::get('lupa-password', [LupaPasswordController::class, 'index']);
Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::get('/logout', [LogoutController::class, 'logout']);


Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('superadmin', [HomeController::class, 'superadmin']);
    Route::get('superadmin/gp', [GantiPasswordController::class, 'index']);
    Route::post('superadmin/gp', [GantiPasswordController::class, 'update']);
    Route::post('superadmin/sk/updatelurah', [HomeController::class, 'updatelurah']);

    Route::get('superadmin/user', [UserController::class, 'index']);
    Route::get('superadmin/user/create', [UserController::class, 'create']);
    Route::post('superadmin/user/create', [UserController::class, 'store']);
    Route::get('superadmin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('superadmin/user/edit/{id}', [UserController::class, 'update']);
    Route::get('superadmin/user/delete/{id}', [UserController::class, 'delete']);

    Route::get('superadmin/bibit', [BibitController::class, 'index']);
    Route::get('superadmin/bibit/create', [BibitController::class, 'create']);
    Route::post('superadmin/bibit/create', [BibitController::class, 'store']);
    Route::get('superadmin/bibit/edit/{id}', [BibitController::class, 'edit']);
    Route::post('superadmin/bibit/edit/{id}', [BibitController::class, 'update']);
    Route::get('superadmin/bibit/delete/{id}', [BibitController::class, 'delete']);

    Route::get('superadmin/stok-bibit', [StokController::class, 'index']);
    Route::get('superadmin/stok-bibit/edit/{id}', [StokController::class, 'edit']);
    Route::post('superadmin/stok-bibit/edit/{id}', [StokController::class, 'update']);

    Route::get('superadmin/pengajuan', [PengajuanController::class, 'admin_index']);
    Route::post('superadmin/pengajuan/validasi', [PengajuanController::class, 'validasi']);
    Route::get('superadmin/pengajuan/delete/{id}', [PengajuanController::class, 'delete']);

    Route::get('superadmin/validasi', [ValidasiController::class, 'index']);
    Route::get('superadmin/serahterima', [SerahTerimaController::class, 'index']);
    Route::post('superadmin/pengajuan/serahterima', [SerahTerimaController::class, 'tgl_serah_terima']);

    Route::get('superadmin/laporan', [LaporanController::class, 'index']);
    Route::get('superadmin/laporan/user', [LaporanController::class, 'kpp']);
    Route::get('superadmin/laporan/bibit', [LaporanController::class, 'kpa']);
    Route::get('superadmin/laporan/stok', [LaporanController::class, 'kpa']);
    Route::get('superadmin/laporan/pengajuan', [LaporanController::class, 'kpa']);
    Route::get('superadmin/laporan/validasi', [LaporanController::class, 'kpa']);
    Route::get('superadmin/laporan/serahterima', [LaporanController::class, 'kpa']);
});

Route::group(['middleware' => ['auth', 'role:pemohon']], function () {
    Route::get('pemohon', [HomeController::class, 'pemohon']);
    Route::get('pemohon/gp', [GantiPasswordController::class, 'index']);
    Route::post('pemohon/gp', [GantiPasswordController::class, 'update']);
    Route::get('pemohon/pengajuan', [PengajuanController::class, 'index']);
    Route::get('pemohon/pengajuan/create', [PengajuanController::class, 'create']);
    Route::post('pemohon/pengajuan/create', [PengajuanController::class, 'store']);
    Route::get('pemohon/pengajuan/edit/{id}', [PengajuanController::class, 'edit']);
    Route::post('pemohon/pengajuan/edit/{id}', [PengajuanController::class, 'update']);
    Route::get('pemohon/pengajuan/delete/{id}', [PengajuanController::class, 'delete']);
    Route::get('pemohon/pengajuan/ajukan/{id}', [PengajuanController::class, 'ajukan']);
    Route::post('pemohon/pengajuan/bibit', [PengajuanController::class, 'storeBibit']);
    Route::get('pemohon/serahterima', [SerahTerimaController::class, 'pemohon_index']);
});
