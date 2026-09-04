<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
  public function uploadImage(Request $request)
  {
    // Whitelist gambar saja. Cegah upload .php/.phtml dsb -> RCE.
    $request->validate([
      'upload' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
    ]);

    $file = $request->file('upload');
    // Tentukan ekstensi dari mime yang tervalidasi, bukan dari nama file kiriman.
    $ext = $file->extension();
    $filename = str()->random(20) . '.' . $ext;

    $path = $file->storeAs('ckeditor5', $filename);

    return response()->json([
      'url' => Storage::url($path),
    ]);
  }

  public function clearUnusedImage()
  {
    // 1. Ambil semua file gambar di folder ckeditor5/
    $files = Storage::files('ckeditor5');

    // 2. Ambil semua isi konten dari berbagai tabel/kolom
    $beritaIsi       = DB::table('berita')->pluck('isi')->toArray();
    $pejabatBiografi = DB::table('pejabat')->pluck('biografi')->toArray();
    $halamanIsi      = DB::table('halaman')->pluck('isi')->toArray();

    // 3. Gabungkan seluruh isi konten jadi satu string besar
    $allContent = implode(' ', array_merge($beritaIsi, $pejabatBiografi, $halamanIsi));

    $deleted = 0;
    foreach ($files as $file) {
      $filename = basename($file);

      if (!str_contains($allContent, $filename)) {
        Storage::delete($file);
        $deleted++;
      }
    }

    return back()->with('success', "Cleanup complete. Deleted $deleted unused images.");
  }
}
