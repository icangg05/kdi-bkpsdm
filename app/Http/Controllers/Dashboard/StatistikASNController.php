<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StatistikASN;
use Illuminate\Http\Request;

class StatistikASNController extends Controller
{
  public function index()
  {
    $title = 'Statistik ASN';
    $data  = StatistikASN::get();

    $tanggalUpdate = collect($data)->firstWhere('slug', 'tanggal_update');

    $pns = collect($data)->filter(
      fn($item) =>
      str_starts_with($item['slug'], 'pns') && $item['slug'] !== 'tanggal_update'
    )->values();

    $pppk = collect($data)->filter(
      fn($item) =>
      str_starts_with($item['slug'], 'pppk')
    )->values();

    return view('dashboard.statistik-asn', compact('title', 'tanggalUpdate', 'pns', 'pppk'));
  }

  public function update(Request $request)
  {
    $data = $request->except(['_token', '_method']);

    foreach ($data as $key => $value)
    {
      $dataUpdate = StatistikASN::where('slug', $key);
      $dataUpdate->update(['value' => $value]);
    }

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
  }
}
