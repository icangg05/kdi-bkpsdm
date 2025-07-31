<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Pejabat;
use App\Models\Pengaturan;
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

  public function pengaturan()
  {
    $title = 'Pengaturan';
    $data  = Pengaturan::get();

    return view('dashboard.pengaturan-form', compact('title', 'data'));
  }

  public function pengaturanUpdate(Request $request)
  {
    $data = $request->except(['_token', '_method']);

    foreach ($data as $key => $value) {
      $dataUpdate = Pengaturan::where('nama_pengaturan', $key);
      $dataUpdate->update(['value' => $value]);
    }

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
  }
}
