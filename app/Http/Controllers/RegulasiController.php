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

    $data = $data->paginate(6);

    // dd($kategoriRegulasi);
    return Inertia::render('Regulasi', compact('data', 'kategoriRegulasi', 'kategori'));
  }

  public function download($id)
  {
    $data = Regulasi::findOrFail($id);
    $data->increment('total_unduh');

    return Storage::download($data->lampiran);
  }
}
