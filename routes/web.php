<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\UjianController;

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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {return view('welcome');});
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/pengguna',[PenggunaController::class,'list'])->name('pengguna.list');
    Route::post('/pengguna/tambah',[PenggunaController::class,'tambahPengguna'])->name('pengguna.tambah');
    Route::get('/pengguna/detail/{id}',[PenggunaController::class,'detailPengguna'])->name('pengguna.detail');
    Route::put('/pengguna/update/{id}', [PenggunaController::class, 'updatePengguna'])->name('pengguna.update');
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'editPengguna'])->name('pengguna.edit');
    Route::get('/pengguna/hapus/{id}', [PenggunaController::class, 'hapusPengguna'])->name('pengguna.hapus');
    Route::get('/kelas',[KelasController::class,'list'])->name('kelas.list');
    Route::post('/kelas/tambah',[KelasController::class,'tambahKelas'])->name('kelas.tambah');
    Route::get('/kelas/detail/{id}',[KelasController::class,'detailKelas'])->name('kelas.detail');
    Route::put('/kelas/update/{id}', [KelasController::class, 'updateKelas'])->name('kelas.update');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'editKelas'])->name('kelas.edit');
    Route::get('/kelas/hapus/{id}', [KelasController::class, 'hapusKelas'])->name('kelas.hapus');
    Route::get('/siswa',[SiswaController::class,'list'])->name('siswa.list');
    Route::get('/guru',[GuruController::class,'list'])->name('guru.list');
    Route::get('/pelajaran',[PelajaranController::class,'list'])->name('pelajaran.list');
    Route::get('/ujian',[UjianController::class,'list'])->name('ujian.list');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'proclogin'])->name('proc.login');

