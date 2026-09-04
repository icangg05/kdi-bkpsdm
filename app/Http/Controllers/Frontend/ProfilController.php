<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use App\Models\Pejabat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfilController extends Controller
{
  public function index($slug)
  {
    switch ($slug) {
      case 'logo':
        $title = 'Logo BKPSDM';
        break;
      case 'sejarah':
        $title = 'Sejarah BKPSDM';
        break;
      case 'struktur-organisasi':
        $title = 'Struktur Organisasi BKPSDM';
        break;
      case 'pejabat':
        $title = 'Profil Pejabat BKPSDM';
        // $data  = Pejabat::with('jabatan.unit_organisasi.bagian')->latest()->paginate(100);SSSS
        $data = Pejabat::with('jabatan.unit_organisasi.bagian')
          ->leftJoin('jabatan', 'pejabat.jabatan_id', '=', 'jabatan.id')
          ->orderByRaw("CASE WHEN jabatan.nama = 'Kepala Badan' THEN 0 ELSE 1 END")
          ->orderBy('pejabat.id', 'asc') // urut normal setelahnya
          ->select('pejabat.*') // penting biar ga bentrok kolom dari join
          ->paginate(100);
        return Inertia::render('ProfilPejabat', compact('title', 'data'));
        break;
      default:
        abort(404);
    }
    $data = Halaman::where('kategori', $slug)->first();
    // dd($data);

    return Inertia::render('Profil', [
      'title' => $title,
      'slug'  => $slug,
      'data'  => $data,
    ]);
  }

  /**
   * PEJABAT DETAIL
   */
  public function pejabatDetail($id)
  {
    $data = Pejabat::with('jabatan.unit_organisasi.bagian')->findOrFail($id);
    return Inertia::render('ProfilPejabatDetail', compact('data'));
  }
}
