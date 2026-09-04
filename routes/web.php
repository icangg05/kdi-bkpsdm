<?php

use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BeritaController;
use App\Http\Controllers\Frontend\HalamanController as FrontendHalamanController;
use App\Http\Controllers\Frontend\ProfilController;
use App\Http\Controllers\GaleriController as ControllersGaleriController;
use App\Http\Controllers\RegulasiController as ControllersRegulasiController;
use App\Http\Controllers\StatistikASNController;
use App\Models\Halaman;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// BERANDA
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// PROFIL
Route::get('/profil/pejabat/{pejabat}', [ProfilController::class, 'pejabatDetail'])->name('profil.pejabat-detail');
Route::get('/profil/{slug}', [ProfilController::class, 'index'])->name('profil');

// PUBLIKASI
Route::get('/publikasi/{publikasi}', [BeritaController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/detail/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// STATISTIK
Route::get('/statistik-pegawai', [StatistikASNController::class, 'index'])->name('statistik-pegawai');

// LAYANAN
Route::get('/layanan', [FrontendHalamanController::class, 'index'])->name('layanan');
Route::get('/layanan/{halaman}', [FrontendHalamanController::class, 'show'])->name('layanan.detail');

// REGULASI
Route::get('/regulasi/{kategori}', [ControllersRegulasiController::class, 'index'])->name('regulasi');
Route::get('/regulasi/{regulasi}/download', [ControllersRegulasiController::class, 'download'])->name('regulasi.download');

// GALERI
Route::get('/galeri/foto', [ControllersGaleriController::class, 'fotoIndex'])->name('galeri-foto');
Route::get('/galeri/video', [ControllersGaleriController::class, 'videoIndex'])->name('galeri-video');

// HUBUNGI KAMI
Route::get('/hubungi-kami', function () {
  $title   = 'Hubungi Kami';
  $halaman = 'hubungi-kami';

  $data = Halaman::where('kategori', $halaman)->first();

  return Inertia::render('HubungiKami', compact('title', 'halaman', 'data'));
})->name('hubungi-kami');


// DASHBOARD
// Route::get('dashboard', function () {
//   return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';

// Alamat yang tidak cocok dengan satu route pun tidak pernah melewati grup
// middleware `web`, sehingga HandleInertiaRequests belum sempat membagikan
// ziggy dan pengaturan. Tanpa route ini halaman galat Inertia akan gagal
// memanggil route() dan berakhir kosong. Harus tetap paling bawah.
Route::fallback(function (Illuminate\Http\Request $request) {
  // Klien yang meminta JSON diberi 404 JSON, bukan satu halaman HTML penuh.
  abort_if($request->expectsJson(), 404);

  return Inertia::render('Error', ['status' => 404])
    ->toResponse($request)
    ->setStatusCode(404);
});
