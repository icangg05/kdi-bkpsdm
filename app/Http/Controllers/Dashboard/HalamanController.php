<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
  /**
   * VALID PAGES
   */
  public function validPages($halaman)
  {
    $pages = [
      [
        'title' => 'Sejarah BKPSDM',
        'halaman' => 'sejarah',
      ],
      [
        'title' => 'Cuti ASN',
        'halaman' => 'cuti-asn',
      ],
      [
        'title' => 'Cerai',
        'halaman' => 'cerai',
      ],
      [
        'title' => 'Kenaikan Pangkat',
        'halaman' => 'kenaikan-pangkat',
      ],
      [
        'title' => 'Jabatan Fungsional',
        'halaman' => 'jabatan-fungsional',
      ],
      [
        'title' => 'Mutasi Pegawai',
        'halaman' => 'mutasi-pegawai',
      ],
      [
        'title' => 'Tugas Belajar',
        'halaman' => 'tugas-belajar',
      ],
      [
        'title' => 'Konsultasi Kinerja',
        'halaman' => 'konsultasi-kinerja',
      ],
      [
        'title' => 'COC Manajemen ASN',
        'halaman' => 'coc-manajemen-asn',
      ],
    ];

    if ($halaman === 'logo') {
      return 'Logo BKPSDM';
    }

    if ($halaman === 'struktur-organisasi') {
      return 'Struktur Organisasi BKPSDM';
    }

    foreach ($pages as $page) {
      if ($page['halaman'] === $halaman) {
        return $page['title'];
      }
    }

    abort(404);
  }


  /**
   * INDEX
   */
  public function index($halaman)
  {
    $title = $this->validPages($halaman);
    $data = Halaman::where('kategori', $halaman)->first();

    return view('dashboard.halaman', compact('title', 'data', 'halaman'));
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $halaman)
  {
    $request->validate([
      'isi'      => ['nullable'],
      'gambar'   => ['nullable', 'image', 'max:2048'],
      'lampiran' => ['nullable'],
    ]);

    $data = Halaman::where('kategori', $halaman)->first();
    if ($request->file('gambar'))
      $gambar = $request->file('gambar')->store('gambar');

    if ($request->file('lampiran')) {
      $file     = $request->file('lampiran');
      $filename = $file->getClientOriginalName();
      $lampiran = $file->storeAs('lampiran', $filename);
    }

    $dataUpdate = [
      'isi'      => $request->isi,
      'kategori' => $halaman,
    ];

    // UPDATE OR
    if ($data) {
      $dataUpdate['gambar']   = $gambar ?? $data->gambar;
      $dataUpdate['lampiran'] = $lampiran ?? $data->lampiran;
      $data->update($dataUpdate);
    }
    // CREATE NEW
    else {
      $dataUpdate['gambar']   = $gambar ?? null;
      $dataUpdate['lampiran'] = $lampiran ?? null;
      Halaman::create($dataUpdate);
    }

    return back()->with('success', 'Data berhasil diperbarui.');
  }
}
