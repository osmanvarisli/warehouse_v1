<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/yeni_depo', [App\Http\Controllers\DepoController::class, 'create'])->name('yeni_depo');
    Route::post('/depo_store', [App\Http\Controllers\DepoController::class, 'store'])->name('depo_store');

    Route::get('/depolar_list', [App\Http\Controllers\DepoController::class, 'index'])->name('depolar_list');
    Route::get('/depo_duzenle/{id}', [App\Http\Controllers\DepoController::class, 'edit'])->name('depo_duzenle');
    Route::post('/depo_update/{id}', [App\Http\Controllers\DepoController::class, 'update'])->name('depo_update');
    Route::post('/depo_delete/{id}', [App\Http\Controllers\DepoController::class, 'destroy'])->name('depo_delete');


    Route::get('/yeni_ketgori', [App\Http\Controllers\KategorilerController::class, 'create'])->name('yeni_kategori');
    Route::post('/kategori_store', [App\Http\Controllers\KategorilerController::class, 'store'])->name('kategori_store');

    Route::get('/kategoriler_list', [App\Http\Controllers\KategorilerController::class, 'index'])->name('kategoriler_list');
    Route::get('/kategori_duzenle/{id}', [App\Http\Controllers\KategorilerController::class, 'edit'])->name('kategori_duzenle');
    Route::post('/kategori_update/{id}', [App\Http\Controllers\KategorilerController::class, 'update'])->name('kategori_update');
    Route::post('/kategori_delete/{id}', [App\Http\Controllers\KategorilerController::class, 'destroy'])->name('kategori_delete');


    Route::get('/yeni_urun', [App\Http\Controllers\UrunlerController::class, 'create'])->name('yeni_urun');
    Route::post('/urun_store', [App\Http\Controllers\UrunlerController::class, 'store'])->name('urun_store');

    Route::get('/urunler_list', [App\Http\Controllers\UrunlerController::class, 'index'])->name('urunler_list');
    Route::get('/urun_duzenle/{id}', [App\Http\Controllers\UrunlerController::class, 'edit'])->name('urun_duzenle');
    Route::post('/urun_update/{id}', [App\Http\Controllers\UrunlerController::class, 'update'])->name('urun_update');
    Route::post('/urun_delete/{id}', [App\Http\Controllers\UrunlerController::class, 'destroy'])->name('urun_delete');


    Route::get('/yeni_birim', [App\Http\Controllers\BirimlerController::class, 'create'])->name('yeni_birim');
    Route::post('/birim_store', [App\Http\Controllers\BirimlerController::class, 'store'])->name('birim_store');

    Route::get('/birimler_list', [App\Http\Controllers\BirimlerController::class, 'index'])->name('birimler_list');
    Route::get('/birim_duzenle/{id}', [App\Http\Controllers\BirimlerController::class, 'edit'])->name('birim_duzenle');
    Route::post('/birim_update/{id}', [App\Http\Controllers\BirimlerController::class, 'update'])->name('birim_update');
    Route::post('/birim_delete/{id}', [App\Http\Controllers\BirimlerController::class, 'destroy'])->name('birim_delete');


    Route::get('/yeni_stok_giris', [App\Http\Controllers\GirilenStokController::class, 'create'])->name('yeni_stok_giris');
    Route::post('/girilen_stok_store', [App\Http\Controllers\GirilenStokController::class, 'store'])->name('girilen_stok_store');

    Route::get('/girilen_stoklar_list', [App\Http\Controllers\GirilenStokController::class, 'index'])->name('girilen_stoklar_list');
    Route::get('/girilen_stok_duzenle/{id}', [App\Http\Controllers\GirilenStokController::class, 'edit'])->name('girilen_stok_duzenle');
    Route::post('/girilen_stok_update/{id}', [App\Http\Controllers\GirilenStokController::class, 'update'])->name('girilen_stok_update');
    Route::post('/girilen_stok_delete/{id}', [App\Http\Controllers\GirilenStokController::class, 'destroy'])->name('girilen_stok_delete');
    Route::get('/autocomplete-search', [App\Http\Controllers\GirilenStokController::class, 'sorgu'])->name('autocomplete-search');



    Route::get('/yeni_stok_cikis', [App\Http\Controllers\CikilanStokController::class, 'create'])->name('yeni_stok_cikis');
    Route::post('/cikilan_stok_store', [App\Http\Controllers\CikilanStokController::class, 'store'])->name('cikilan_stok_store');

    Route::get('/cikilan_stoklar_list', [App\Http\Controllers\CikilanStokController::class, 'index'])->name('cikilan_stoklar_list');
    Route::get('/cikilan_stok_duzenle/{id}', [App\Http\Controllers\CikilanStokController::class, 'edit'])->name('cikilan_stok_duzenle');
    Route::post('/cikilan_stok_update/{id}', [App\Http\Controllers\CikilanStokController::class, 'update'])->name('cikilan_stok_update');
    Route::post('/cikilan_stok_delete/{id}', [App\Http\Controllers\CikilanStokController::class, 'destroy'])->name('cikilan_stok_delete');
    //Route::get('/autocomplete-search', [App\Http\Controllers\CikilanStokController::class, 'sorgu'])->name('cikilan-stoklar-autocomplete-search');

    /* Raporlar*/ 
    Route::match(['get', 'post'],'/rapor_urun_stok_durum', [App\Http\Controllers\RaporlarController::class, 'urun_stok_durum'])->name('rapor_urun_stok_durum');
    Route::get('/rapor_urun_takip', [App\Http\Controllers\RaporlarController::class, 'urun_takip'])->name('rapor_urun_takip');
});