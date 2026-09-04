<?php

namespace App\Http\Controllers;

use App\Models\StatistikASN;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatistikASNController extends Controller
{
  public function index()
  {
    $title = 'Statistik Pegawai';
    $statistik_asn = StatistikASN::get();
    // dd($data);
    return Inertia::render('StatistikPegawai', compact('title', 'statistik_asn'));
  }
}
