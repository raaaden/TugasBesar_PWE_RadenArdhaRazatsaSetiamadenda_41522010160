<?php

use App\Http\Controllers\ContohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('contoh', function () {
//     return view('contoh');
// });

Route::get('contoh', [ContohController::class, 'TampilContoh'])->name("test");
Route::get('/home', [ContohController::class, 'ViewHome']);
Route::get('/produk', [ProdukController::class, 'ViewProduk']);
Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);
Route::get('/produk/upd/{kode_produk}', [ProdukController::class, 'EditProduk']);
Route::post('/produk/upd', [ProdukController::class, 'updateProduct']);
Route::post('/produk/add', [ProdukController::class, 'CreateProduk']);

Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);

// Route::get('produk', function () {
//     return view('produk');
// });
