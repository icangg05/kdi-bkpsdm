<?php

namespace App\Http\Controllers;

use App\Models\KategoriRegulasi;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RegulasiController extends Controller
{
  public function index($kategori)
  {
    $data             = Regulasi::with('kategori_regulasi')->orderBy('id', 'desc');
    $kategoriRegulasi = KategoriRegulasi::withCount('regulasi')->orderBy('nama')->get();

    if (request()->q)
      $data = $data->where('judul', 'like', '%' . request()->q . '%');

    if ($kategori !== 'all')
      $data = $data->whereHas('kategori_regulasi', function ($query) use ($kategori) {
        $query->where('slug', $kategori);
      });

    // withQueryString: tanpa ini kata kunci hilang begitu pengguna pindah ke
    // halaman 2, dan hasil pencarian berubah jadi seluruh regulasi.
    $data = $data->paginate(6)->withQueryString();

    // dd($kategoriRegulasi);
    return Inertia::render('Regulasi', [
      ...compact('data', 'kategoriRegulasi', 'kategori'),
      'q' => request()->q,
    ]);
  }

  public function download(Regulasi $regulasi)
  {
    $regulasi->increment('total_unduh');

    return Storage::download($regulasi->lampiran);
  }
}
