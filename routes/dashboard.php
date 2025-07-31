<?php

use App\Http\Controllers\Dashboard\BagianController;
use App\Http\Controllers\Dashboard\BeritaController;
use App\Http\Controllers\Dashboard\GaleriController;
use App\Http\Controllers\Dashboard\HalamanController;
use App\Http\Controllers\Dashboard\JabatanController;
use App\Http\Controllers\Dashboard\KategoriRegulasiController;
use App\Http\Controllers\Dashboard\PejabatController;
use App\Http\Controllers\Dashboard\RegulasiController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\UnitOranisasiController;
use App\Http\Controllers\Dashboard\UploadController;
use App\Http\Controllers\Dashboard\VideoController;
use Illuminate\Support\Facades\Route;

// CKEDITOR UPLOAD IMAGE
Route::post('/upload-image', [UploadController::class, 'uploadImage'])->name('upload-image');

Route::middleware(['auth'])
  ->prefix('dashboard')
  ->name('dashboard.')
  ->group(function () {

    // DASHBOARD HOME
    Route::get('/', fn() => view('dashboard.index'))->name('home');

    // SLIDER
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::patch('/slider/update', [SliderController::class, 'update'])->name('slider.update');

    // PROFIL, LAYANAN, HUBUNGI KAMI
    Route::get('/halaman/{kategori}', [HalamanController::class, 'index'])->name('halaman');
    Route::patch('/halaman/{kategori}/update', [HalamanController::class, 'update'])->name('halaman.update');

    // PROFIL PEJABAT
    Route::resource('/pejabat', PejabatController::class)->except(['show']);

    // PUBLIKASI (BERITA, PENGUMUMAN, UCAPAN, DUKA)
    Route::prefix('publikasi/{publikasi}')->name('publikasi.')->group(function () {
      Route::get('/', [BeritaController::class, 'index'])->name('index');
      Route::get('/form', [BeritaController::class, 'create'])->name('create');
      Route::post('/store', [BeritaController::class, 'store'])->name('store');
      Route::get('/form/{id}', [BeritaController::class, 'edit'])->name('edit');
      Route::patch('/{id}/update', [BeritaController::class, 'update'])->name('update');
      Route::delete('/{id}/destroy', [BeritaController::class, 'destroy'])->name('destroy');
    });

    // GALERI FOTO
    Route::get('/galeri/foto', [GaleriController::class, 'galeriIndex'])->name('galeri.foto.index');
    Route::get('/galeri/foto/create', [GaleriController::class, 'galeriCreate'])->name('galeri.foto.create');
    Route::post('/galeri/foto/store', [GaleriController::class, 'galeriStore'])->name('galeri.foto.store');
    Route::get('/galeri/foto/{id}/edit', [GaleriController::class, 'galeriEdit'])->name('galeri.foto.edit');
    Route::patch('/galeri/foto/{id}/update', [GaleriController::class, 'galeriUpdate'])->name('galeri.foto.update');
    Route::delete('/galeri/foto/{id}/destroy', [GaleriController::class, 'galeriDestroy'])->name('galeri.foto.destroy');

    // GALERI VIDEO
    Route::resource('/video', VideoController::class)->except(['show']);

    // Regulasi
    Route::resource('/regulasi', RegulasiController::class)->except(['show']);

    // KATEGORI REGULASI
    Route::get('/kategori-regulasi', [KategoriRegulasiController::class, 'index'])->name('kategori-regulasi.index');
    Route::post('/kategori-regulasi/store', [KategoriRegulasiController::class, 'store'])->name('kategori-regulasi.store');
    Route::patch('/kategori-regulasi/{id}/update', [KategoriRegulasiController::class, 'update'])->name('kategori-regulasi.update');
    Route::delete('/kategori-regulasi/{id}/destroy', [KategoriRegulasiController::class, 'destroy'])->name('kategori-regulasi.destroy');

    // DATA JABATAN
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::patch('/jabatan/{id}/update', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/{id}/destroy', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

    // DATA JABATAN - TUGAS
    Route::get('/jabatan/{id}/tugas', [JabatanController::class, 'tugasIndex'])->name('jabatan.tugas.index');
    Route::post('/jabatan/{id}/tugas-store', [JabatanController::class, 'tugasStore'])->name('jabatan.tugas.store');
    Route::delete('/jabatan/{id}/tugas-destroy/{index}', [JabatanController::class, 'tugasDestroy'])->name('jabatan.tugas.destroy');

    // DATA BAGIAN
    Route::resource('/bagian', BagianController::class)->except(['show', 'put']);
    // DATA UNIT ORGANISASI
    Route::resource('/unit-organisasi', UnitOranisasiController::class)->except(['show', 'put']);
  });
