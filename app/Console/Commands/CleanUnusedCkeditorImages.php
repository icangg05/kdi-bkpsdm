<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CleanUnusedCkeditorImages extends Command
{
  protected $signature = 'ckeditor:clean-images';
  protected $description = 'Delete unused CKEditor images from storage';

  public function handle()
  {
    $this->info('Scanning for unused images...');

    // 1. Ambil semua file gambar di folder ckeditor5/
    $files = Storage::files('ckeditor5');

    // 2. Ambil semua isi konten berita
    $contents = DB::table('berita')->pluck('isi')->toArray();

    // 3. Gabungkan seluruh isi konten jadi satu string besar (biar gampang cek)
    $allContent = implode(' ', $contents);

    $deleted = 0;
    foreach ($files as $file) {
      $filename = basename($file); // misalnya: gambar.jpg

      // Cek apakah nama file dipakai dalam konten HTML
      if (!str_contains($allContent, $filename)) {
        Storage::delete($file);
        $this->line("Deleted: $file");
        $deleted++;
      }
    }

    $this->info("Cleanup complete. Deleted $deleted unused images.");
    return 0;
  }
}
