<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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


Route::middleware(['LoginAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/produk', [AdminController::class, 'produk']);
    Route::get('/tambah-produk', [AdminController::class, 'tambah_produk']);
    Route::post('/store', [AdminController::class, 'store']);
    Route::get('/edit-produk/{id}', [AdminController::class, 'edit_produk']);
    Route::patch('/editProduk/{id}', [AdminController::class, 'editProduk'])->name('editProduk'); 
    Route::delete('/hapus-produk/{id}', [AdminController::class, 'hapusProduk']);
    Route::get('/pemesanan', [AdminController::class, 'pemesanan']);
    Route::get('/detail-pemesanan/{id}', [AdminController::class, 'detail_pemesanan']);
    Route::get('/pembayaran', [AdminController::class, 'pembayaran']);
    Route::patch('/prosesPembayaran/{id}', [AdminController::class, 'prosesPembayaran'])->name('pembayaran');
    Route::patch('/prosesPengiriman/{id}', [AdminController::class, 'prosesPengiriman'])->name('pengiriman');
    Route::get('/riwayat', [AdminController::class, 'riwayat']);
    Route::get('/detail-riwayat/{id}', [AdminController::class, 'detail_riwayat']);
    Route::get('/pengaturan', [AdminController::class, 'pengaturan']);
    Route::get('/admin', [AdminController::class, 'admin']);                   
    Route::post('/addAdmin', [AdminController::class, 'addAdmin']); 
    Route::patch('/addPengaturan', [AdminController::class, 'addPengaturan']);
});

// user
Route::get('/', [UserController::class, 'home']);
Route::get('/log', [UserController::class, 'log']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/home', [UserController::class, 'home']);
Route::get('/paket', [UserController::class, 'paket']);
Route::get('/detail-produk/{id}', [UserController::class, 'detail_produk']);
Route::post('/addKeranjang', [UserController::class, 'add_keranjang']);

Route::middleware(['LoginUser'])->group(function () {
    Route::get('/keranjang', [UserController::class, 'keranjang']);
    Route::post('/addPesanan', [UserController::class, 'add_pesanan']);
    Route::delete('/hapusKeranjang/{id}', [UserController::class, 'hapusKeranjang']);
    Route::get('/pembayaran-user/{id}', [UserController::class, 'pembayaran_user']);
    Route::patch('/addPembayaran', [UserController::class, 'addPembayaran']);
    Route::get('/dashboard-user', [UserController::class, 'dashboard_user']);
    Route::get('/detail-pesanan/{id}', [UserController::class, 'detail_pesanan']);
    Route::patch('/konfirDiterima', [UserController::class, 'konfirDiterima']);
    Route::get('/edit-profil/{id}', [UserController::class, 'edit_profil']);
    Route::patch('/editProfil', [UserController::class, 'editProfil']);
    Route::get('/penilaian/{code_pesanan}/{name}', [UserController::class, 'penilaian']);
    Route::post('/addPenilaian', [UserController::class, 'addPenilaian']);
});

//Auth 
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/addUser', [AuthController::class, 'addUser']);