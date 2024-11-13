<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('contoh', function () {
//     return view('contoh');
// });

// Route::get('contoh', [ContohController::class, 'TampilContoh'])->name("test");
// Route::get('/home', [ContohController::class, 'ViewHome']);
// Route::get('/produk', [ProdukController::class, 'ViewProduk']);
// Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);
// Route::get('/produk/upd/{kode_produk}', [ProdukController::class, 'EditProduk']);
// Route::post('/produk/upd', [ProdukController::class, 'updateProduct']);
// Route::post('/produk/add', [ProdukController::class, 'CreateProduk']);
// Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);
// Route::get('/laporan', [ProdukController::class, 'ViewLaporan']);
// Route::get('/report', [ProdukController::class, 'print']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth','user-access:user'])->prefix('user')->group(function(){
    // Route::get('/', function () {
    //         return view('welcome');
    //     });

    Route::get('contoh', [ContohController::class, 'TampilContoh'])->name("test");
    Route::get('/home', [ContohController::class, 'ViewHome']);
    Route::get('/produk', [ProdukController::class, 'ViewProduk']);
    Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);
    Route::get('/produk/upd/{kode_produk}', [ProdukController::class, 'EditProduk']);
    Route::post('/produk/upd', [ProdukController::class, 'updateProduct']);
    Route::post('/produk/add', [ProdukController::class, 'CreateProduk']);
    Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);
    Route::get('/laporan', [ProdukController::class, 'ViewLaporan']);
    Route::get('/report', [ProdukController::class, 'print']);
});

Route::middleware(['auth','user-access:user'])->prefix('admin')->group(function(){
    // Route::get('/', function () {
    //         return view('welcome');
    //     });

    Route::get('/home', [ContohController::class, 'ViewHome']);
    Route::get('contoh', [ContohController::class, 'TampilContoh'])->name("test");
    Route::get('/produk', [ProdukController::class, 'ViewProduk']);
    Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);
    Route::get('/produk/upd/{kode_produk}', [ProdukController::class, 'EditProduk']);
    Route::post('/produk/upd', [ProdukController::class, 'updateProduct']);
    Route::post('/produk/add', [ProdukController::class, 'CreateProduk']);
    Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);
    Route::get('/laporan', [ProdukController::class, 'ViewLaporan']);
    Route::get('/report', [ProdukController::class, 'print']);
    Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);

Route::get('/produk/add', [ProdukController::class, 'CreateProduk']);
});
// Route::get('produk', function () {
//     return view('produk');
// });
