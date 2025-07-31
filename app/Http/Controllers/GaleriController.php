<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class GaleriController extends Controller
{
  public function fotoIndex()
  {
    $data = Foto::latest()->paginate(9);
    $data->getCollection()->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });

    return Inertia::render('Galeri', compact('data'));
  }

  public function videoIndex()
  {
    $data = Video::latest()->paginate(9);
    $data->getCollection()->transform(function ($item) {
      $item->tanggal = Carbon::parse($item->tanggal)->translatedFormat('j F Y');
      return $item;
    });

    return Inertia::render('Video', compact('data'));
  }
}
