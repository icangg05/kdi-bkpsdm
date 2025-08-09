<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HalamanController extends Controller
{
  public function index()
  {
    return Inertia::render('Layanan');
  }

  public function show($halaman)
  {
    switch ($halaman) {
      case 'pensiun':
        $title = 'Pensiun';
        $view  = 'KenaikanPangkat';
        break;
      case 'penghargaan':
        $title = 'Penghargaan';
        $view  = 'KenaikanPangkat';
        break;
      case 'cuti-asn':
        $title = 'Cuti ASN';
        $view  = 'CutiASN';
        break;
      case 'cerai':
        $title = 'Perceraian ASN';
        $view  = 'CutiASN';
        break;
      case 'coc-manajemen-asn':
        $title = 'COC Manajemen ASN';
        $view  = 'CutiASN';
        break;
      case 'jabatan-fungsional':
        $title = 'Jabatan Fungsional';
        $view  = 'CutiASN';
        break;
      case 'mutasi-pegawai':
        $title = 'Mutasi Pegawai';
        $view  = 'KenaikanPangkat';
        break;
      case 'tugas-belajar':
        $title = 'Tugas Belajar';
        $view  = 'KenaikanPangkat';
        break;
      case 'konsultasi-kinerja':
        $title = 'Konsultasi Kinerja';
        $view  = 'KenaikanPangkat';
        break;
      case 'disiplin':
        $title = 'Disiplin';
        $view  = 'KenaikanPangkat';
        break;
      case 'disiplin':
        $title = 'Disiplin';
        $view  = 'KenaikanPangkat';
        break;
      case 'kenaikan-pangkat':
        $title = 'Kenaikan Pangkat ASN';
        $view  = 'KenaikanPangkat';
        break;
      default:
        abort(404);
    }

    if ($halaman == 'disiplin')
      $data = Halaman::whereIn('kategori', ['informasi-kewajiban-dan-larangan', 'konsultasi-disiplin'])->get();
    else
      $data = Halaman::where('kategori', $halaman)->first();

    return Inertia::render($view, [
      'title'   => $title,
      'layanan' => $halaman,
      'data'    => $data,
    ]);
  }
}
