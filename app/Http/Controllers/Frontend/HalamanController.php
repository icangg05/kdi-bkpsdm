<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Inertia\Inertia;

class HalamanController extends Controller
{
  /**
   * Slug -> judul halaman. Slug adalah bagian dari URL publik yang sudah
   * diindeks dan ditautkan dari luar, jadi kuncinya tidak boleh berubah.
   */
  private const LAYANAN = [
    'pensiun'             => 'Pensiun',
    'kenaikan-pangkat'    => 'Kenaikan Pangkat ASN',
    'cuti-asn'            => 'Cuti ASN',
    'mutasi-pegawai'      => 'Mutasi Pegawai',
    'jabatan-fungsional'  => 'Jabatan Fungsional',
    'tugas-belajar'       => 'Tugas Belajar',
    'penghargaan'         => 'Penghargaan',
    'konsultasi-kinerja'  => 'Konsultasi Kinerja',
    'disiplin'            => 'Disiplin',
    'coc-manajemen-asn'   => 'COC Manajemen ASN',
    'cerai'               => 'Perceraian ASN',
  ];

  public function index()
  {
    return Inertia::render('Layanan');
  }

  public function show($halaman)
  {
    $title = self::LAYANAN[$halaman] ?? abort(404);

    // Disiplin ditulis admin sebagai dua halaman terpisah dan ditampilkan
    // sebagai dua tab; sisanya satu halaman.
    $data = $halaman === 'disiplin'
      ? Halaman::whereIn('kategori', ['informasi-kewajiban-dan-larangan', 'konsultasi-disiplin'])->get()
      : Halaman::where('kategori', $halaman)->first();

    return Inertia::render('LayananDetail', [
      'title'   => $title,
      'layanan' => $halaman,
      'data'    => $data,
    ]);
  }
}
