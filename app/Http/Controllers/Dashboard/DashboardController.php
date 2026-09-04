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
    $data = $request->except(['_token', '_method', 'teks_berjalan_visibility', 'teks_berjalan_duration', 'teks_berjalan_items']);

    // Update pengaturan selain teks berjalan
    foreach ($data as $key => $value) {
      Pengaturan::where('nama_pengaturan', $key)->update(['value' => $value]);
    }

    // Bersihkan karakter kutip ganda berlebih di akhir dan awal
    $itemsClean = trim($request->teks_berjalan_items, "\" \t\n\r\0\x0B");

    $updateTeksBerjalan = [
      'visibility' => (bool) $request->teks_berjalan_visibility,
      'duration'   => (int) $request->teks_berjalan_duration,
      'items'      => $itemsClean,
    ];

    Pengaturan::where('nama_pengaturan', 'teks_berjalan')
      ->update([
        'value' => json_encode($updateTeksBerjalan, JSON_UNESCAPED_UNICODE)
      ]);

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
  }
}
