<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class BeritaController extends Controller
{
  /**
   * INDEX
   */
  public function index($publikasi)
  {
    $title = str_replace('-', ' ', str()->title($publikasi));

    if ($publikasi == 'berita') {
      $data  = Berita::where('kategori', str()->slug($publikasi));
    } elseif ($publikasi == 'pengumuman') {
      $data  = Berita::where('kategori', str()->slug($publikasi));
    } elseif ($publikasi == 'ucapan-selamat') {
      $data  = Berita::where('kategori', str()->slug($publikasi));
    } elseif ($publikasi == 'berita-duka') {
      $data  = Berita::where('kategori', str()->slug($publikasi));
    } else
      abort(404);

    if (request()->q)
      $data = $data->where('judul', 'like', '%' . request()->q. '%');

    $data = $data->orderByDesc('tanggal')->paginate(6);
    $data->getCollection()->transform(function ($item) {
      $item->isi      = strip_tags($item->isi);                                    // tambahkan field baru jika ingin tetap simpan aslinya
      $item->tanggal  = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      $item->kategori = str_replace('-', ' ', str()->title($item->kategori));
      return $item;
    });

    $publikasiTerbaru = Berita::orderBy('tanggal')->limit(3)->get();
    $publikasiTerbaru->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });
    // dd($data);
    return Inertia::render('Berita', compact('data', 'title', 'publikasi', 'publikasiTerbaru'));
  }

  /**
   * SHOW
   */
  public function show($slug)
  {
    $data = Berita::where('slug', $slug)->first();
    abort_if(!$data, 404);
    $data->tanggal = Carbon::parse($data->tanggal)->translatedFormat('j F Y');
    $data->kategori = str_replace('-', ' ', str()->title($data->kategori));

    $publikasiTerbaru = Berita::orderBy('tanggal')->limit(3)->get();
    $publikasiTerbaru->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });

    $data->increment('total_view');

    return Inertia::render('BeritaDetail', compact('data', 'publikasiTerbaru'));
  }
}
