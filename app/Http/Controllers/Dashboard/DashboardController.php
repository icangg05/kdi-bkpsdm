<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Pejabat;
use App\Models\Regulasi;
use App\Models\StatistikASN;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $statistikASN  = StatistikASN::get();
    $totalRegulasi = Regulasi::count();
    $totalPejabat  = Pejabat::count();
    $publikasiTerbaru = Berita::orderBy('tanggal', 'desc')->limit(3)->get();

    return view('dashboard.index', compact(
      'statistikASN',
      'totalRegulasi',
      'totalPejabat',
      'publikasiTerbaru',
    ));
  }
}
