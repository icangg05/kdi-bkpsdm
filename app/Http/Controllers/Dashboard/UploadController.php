<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
  public function uploadImage(Request $request)
  {
    if ($request->hasFile('upload')) {
      $file = $request->file('upload');
      $filename = str()->random(20) . '.' . $file->getClientOriginalExtension();

      $path = $file->storeAs('ckeditor5', $filename);

      $url = Storage::url($path);

      return response()->json([
        'url' => $url,
      ]);
    }

    return response()->json(['error' => 'No file uploaded.'], 400);
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
      $filename = basename($file); // misalnya: gambar.jpg

      // Cek apakah nama file dipakai dalam konten HTML
      if (!str_contains($allContent, $filename)) {
        Storage::delete($file);
        $deleted++;
      }
    }

    $message = "Cleanup complete. Deleted $deleted unused images.";

    if (Auth::check()) {
      return back()->with('success', $message);
    } else {
      dd($message);
    }
  }
}
