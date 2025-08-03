<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HalamanController extends Controller
{
    /**
   * VALID PAGES
   */
  public function validPages($halaman)
  {
    $pages = [
      [
        'title'   => 'Sejarah BKPSDM',
        'halaman' => 'sejarah',
      ],
      [
        'title'   => 'Cuti ASN',
        'halaman' => 'cuti-asn',
      ],
      [
        'title'   => 'Cerai',
        'halaman' => 'cerai',
      ],
      [
        'title'   => 'Kenaikan Pangkat',
        'halaman' => 'kenaikan-pangkat',
      ],
      [
        'title'   => 'Jabatan Fungsional',
        'halaman' => 'jabatan-fungsional',
      ],
      [
        'title'   => 'Mutasi Pegawai',
        'halaman' => 'mutasi-pegawai',
      ],
      [
        'title'   => 'Tugas Belajar',
        'halaman' => 'tugas-belajar',
      ],
      [
        'title'   => 'Konsultasi Kinerja',
        'halaman' => 'konsultasi-kinerja',
      ],
      [
        'title'   => 'COC Manajemen ASN',
        'halaman' => 'coc-manajemen-asn',
      ],
      [
        'title'   => 'Hubungi Kami',
        'halaman' => 'hubungi-kami'
      ]
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
    $data  = Halaman::where('kategori', $halaman)->first();
      // dd($data->kategori);

    return view('dashboard.halaman', compact('title', 'data', 'halaman'));
  }

    /**
   * UPDATE
   */
  public function update(Request $request, $halaman)
  {
    $request->validate([
      'isi'      => ['nullable'],
      'gambar'   => ['nullable', 'image', 'max:' . config('app.size_img')],
      'lampiran' => ['nullable', 'max:' . config('app.size_file')],
    ]);

    $data = Halaman::where('kategori', $halaman)->first();
    if ($request->file('gambar')) {
      $imgFile = $request->file('gambar');
      $gambar  = $imgFile->storeAs('gambar', generate_filename($imgFile));
    }

    if ($request->file('lampiran')) {
      $file     = $request->file('lampiran');
      $lampiran = $file->storeAs('lampiran', generate_filename($file));
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

    /**
   * DELETE LAMPIRAN
   */
  public function deleteLampiran($id)
  {
    $data = Halaman::findOrFail($id);
    Storage::delete($data->lampiran);
    $data->update([
      'lampiran' => null,
    ]);

    return back()->with('success', 'Lampiran berhasil dihapus.');
  }
}
