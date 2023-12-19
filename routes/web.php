<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukHistoryController;
use App\Http\Controllers\TransaksiHistoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PembayaranController;


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

// Route::get('/', [LoginController::class, 'login'])->name('login');

// Route::middleware(['admin'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);

// routes/web.php

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


    //Route::controller(LoginController::class)->group(function() {
    Route::middleware(['web'])->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/', [LoginController::class, 'loginuser'])->name('loginuser');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    // ...

    // ...


    Route::controller(ProdukController::class)->group(function() {
        Route::resource('/produk', ProdukController::class);
        Route::get('/deleteproduk/{id}', [ProdukController::class, 'destroy'])->name('destroy');
        Route::post('/updateproduk/{id}', [ProdukController::class, 'update'])->name('update');
        // Route::post('/updatepelanggan/{id}', [PelangganController::class, 'update'])->name('update');
        Route::get('/showproduk/{id}', [ProdukController::class, 'show'])->name('show');
    });

    // Route::controller(PelangganController::class)->group(function() {
    //     Route::resource('/pelanggan', PelangganController::class);
    //     Route::get('/deletepelanggan/{id}', [PelangganController::class, 'destroy'])->name('destroy');
    //     Route::post('/updatepelanggan/{id}', [PelangganController::class, 'update'])->name('update');
    // });

    Route::controller(KategoriController::class)->group(function() {
        Route::resource('/kategori', KategoriController::class);
        Route::get('/deletekategori/{id}', [KategoriController::class, 'destroy'])->name('destroy');
    });

    Route::controller(TransaksiController::class)->group(function() {
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/showtransaksi/{id}', [TransaksiController::class, 'show'])->name('show');
    });

    Route::controller(TransaksiHistoryController::class)->group(function() {
        Route::resource('/histori-transaksi', TransaksiHistoryController::class);
        Route::get('/history/transaksi', [ProdukHistoryController::class, 'index'])->name('transaksi.histori');
    });

    // Route::get('/produk/{id}/histori', [ProdukHistoryController::class, 'index'])->name('produk.histori');

    Route::get('/transaksi/{id}/histori', [TransaksiHistoryController::class, 'index'])->name('transaksi.histori');
    Route::post('/transaksi/{id}/histori', [TransaksiHistoryController::class, 'store'])->name('transaksi.histori.store');

    Route::controller(PembayaranController::class)->group(function() {
        Route::resource('/pembayaran', PembayaranController::class);
        Route::post('/pembayaran', [PembayaranController::class, 'store']);
        Route::get('/showpembayaran/{id}', [PembayaranController::class, 'show'])->name('show');
        Route::get('/pembayaran/{id}/delete', [PembayaranController::class, 'destroy']);
    });


// });

// Route::middleware(['auth'])->group(function () {

// });
