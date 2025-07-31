<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Foto;
use App\Models\Slider;
use App\Models\StatistikASN;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class BerandaController extends Controller
{
  public function index()
  {
    $slider        = Slider::pluck('gambar');
    $berita        = Berita::where('kategori', 'berita')->orderBy('tanggal', 'desc')->limit(4)->get();
    $pengumuman    = Berita::where('kategori', 'pengumuman')->orderBy('tanggal', 'desc')->limit(4)->get();
    $ucapanSelamat = Berita::where('kategori', 'ucapan-selamat')->orderBy('tanggal', 'desc')->limit(4)->get();
    $beritaDuka    = Berita::where('kategori', 'berita-duka')->orderBy('tanggal', 'desc')->limit(4)->get();

    $berita->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });
    $pengumuman->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });
    $ucapanSelamat->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });
    $beritaDuka->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });

    // GALERI FOTO & VIDEO
    $foto  = Foto::orderBy('tanggal', 'desc')->limit(6)->get();
    $video = Video::orderBy('tanggal', 'desc')->limit(6)->get();

    $foto->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });
    $video->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });

    $statistik_asn = StatistikASN::get();

    return Inertia::render('Beranda', compact(
      'slider',
      'berita',
      'pengumuman',
      'ucapanSelamat',
      'beritaDuka',
      'foto',
      'video',
      'statistik_asn'
    ));
  }
}
