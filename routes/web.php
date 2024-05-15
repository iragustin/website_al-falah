<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengasuhController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\InfoPendaftaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\DataPesantrenController;

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

Route::get('/', [IndexController::class, 'index']);

Route::get('/berita/{slug}', [BeritaController::class, 'show']);

Route::get('/controlpanel/admin', function () {
    return view('admin');
});
Route::get('/pengasuh/{id}', [PengasuhController::class, 'show']);

Route::get('/pendaftaran', [PendaftaranController::class, 'create']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store']);

Route::get('/bukti-pembayaran', [PendaftaranController::class, 'createPembayaran']);

Route::post('/bukti-pembayaran', [PendaftaranController::class, 'storePembayaran']);


Route::get('/status-pembayaran', [PendaftaranController::class, 'checkStatus']);


Route::post('/lengkapi-pendaftaran', 'PendaftaranController@lengkapiPendaftaran');


Route::group(['middleware' => 'auth'], function () {

    
    // Data Pesantren
    Route::get('/controlpanel/admin/jumlahsantri', [DataPesantrenController::class, 'index']);
    Route::post('/controlpanel/admin/jumlahsantri', [DataPesantrenController::class, 'update']);
    
    // Berita
    Route::get('/controlpanel/admin/berita', [BeritaController::class, 'index']);
    Route::post('/controlpanel/admin/berita', [BeritaController::class, 'store']);
    Route::get('/controlpanel/admin/berita/tambah', [BeritaController::class, 'create']);
    Route::get('/controlpanel/admin/berita/hapus/{id}', [BeritaController::class, 'destroy']);
    Route::get('/controlpanel/admin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::post('/controlpanel/admin/berita/edit/{id}', [BeritaController::class, 'update']);
    
    // Pengasuh
    Route::get('/controlpanel/admin/pengasuh', [PengasuhController::class, 'index']);
    Route::get('/controlpanel/admin/pengasuh/tambah', [PengasuhController::class, 'create']);
    Route::post('/controlpanel/admin/pengasuh', [PengasuhController::class, 'store']);
    Route::get('/controlpanel/admin/pengasuh/hapus/{id}', [PengasuhController::class, 'destroy']);
    Route::get('/controlpanel/admin/pengasuh/edit/{id}', [PengasuhController::class, 'edit']);
    Route::post('/controlpanel/admin/pengasuh/edit/{id}', [PengasuhController::class, 'update']);
    
    // Pendaftar
    Route::get('/controlpanel/admin/pendaftar', [PendaftaranController::class, 'index']);
    Route::get('/controlpanel/admin/pendaftar/hapus/{id}', [PendaftaranController::class, 'destroy']);
    Route::get('/controlpanel/admin/pendaftar/edit/{id}', [PendaftaranController::class, 'edit']);
    Route::post('/controlpanel/admin/pendaftar/edit/{id}', [PendaftaranController::class, 'update']);
    Route::get('/pendaftar/{id}', [PendaftaranController::class, 'show']);
    Route::get('/controlpanel/admin/pendaftar/export', [PendaftaranController::class, 'export']);
    Route::get('/controlpanel/admin/pendaftar/tambah', function () {
        return view('tambahPendaftar');
    });
    Route::get ('/controlpanel/admin/pendaftar/status/{id}', [PendaftaranController::class, 'editStatus']);

    Route::get('/controlpanel/admin', [IndexController::class, 'home']);
    
    // Info Pendaftaran
    Route::get('/controlpanel/admin/info-pendaftaran', [InfoPendaftaranController::class, 'index']);
    Route::get('/controlpanel/admin/info-pendaftaran/tambah', [InfoPendaftaranController::class, 'create']);
    Route::post('/controlpanel/admin/info-pendaftaran', [InfoPendaftaranController::class, 'store']);
    Route::get('/controlpanel/admin/info-pendaftaran/hapus/{id}', [InfoPendaftaranController::class, 'destroy']);
    Route::get('/controlpanel/admin/info-pendaftaran/edit/{id}', [InfoPendaftaranController::class, 'edit']);
    Route::post('/controlpanel/admin/info-pendaftaran/edit/{id}', [InfoPendaftaranController::class, 'update']);

    // Brosur\
    Route::get('/controlpanel/admin/brosur', [BrosurController::class, 'index']);
    Route::get('/controlpanel/admin/brosur/tambah', [BrosurController::class, 'create']);
    Route::post('/controlpanel/admin/brosur', [BrosurController::class, 'store']);
    Route::get('/controlpanel/admin/brosur/hapus/{id}', [BrosurController::class, 'destroy']);
    Route::get('/controlpanel/admin/brosur/edit/{id}', [BrosurController::class, 'edit']);
    Route::post('/controlpanel/admin/brosur/edit/{id}', [BrosurController::class, 'update']);
    
    Route::get('/controlpanel/admin/ganti-password', [IndexController::class, 'changePassword']);
    Route::post('/controlpanel/admin/ganti-password', [IndexController::class, 'gantiPassword']);

    Route::get('/controlpanel/admin/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    Route::get('/controlpanel/admin/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/controlpanel/admin/register', [RegisterController::class, 'register'])->name('register.perform');
    
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/controlpanel/admin/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/controlpanel/admin/login', [LoginController::class, 'login'])->name('login.perform');
});