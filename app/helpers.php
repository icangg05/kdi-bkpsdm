<?php

if (! function_exists('generate_filename')) {
  function generate_filename($file)
  {
    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $extension    = $file->getClientOriginalExtension();
    $timestamp    = date('s-d-m-Y'); // detik-hari-bulan-tahun

    // Hilangkan karakter tidak valid pada nama file
    $safeName = preg_replace('/[^a-zA-Z0-9-_]/', '_', $originalName);

    return "{$safeName}-{$timestamp}.{$extension}";
  }
}


if (! function_exists('get_original_filename')) {
  function get_original_filename($path)
  {
    // Ambil nama file saja tanpa path
    $filenameWithExt = basename($path); // contoh: data-harian-52-30-07-2025.pdf

    // Ambil tanpa ekstensi
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

    // Gunakan regex untuk hilangkan -ss-dd-mm-yyyy di akhir
    // Penjelasan pola:
    // (.*)           => tangkap semua karakter apapun sebelum pattern tanggal
    // -\d{2}-\d{2}-\d{2}-\d{4} => pola: -detik-hari-bulan-tahun
    if (preg_match('/^(.*)-\d{2}-\d{2}-\d{2}-\d{4}$/', $filename, $matches)) {
      return $matches[1]; // nama file asli
    }

    // fallback jika format tidak sesuai
    return $filename;
  }
}

if (! function_exists('refactor_format')) {
  function refactor_format(string $value): string
  {
    $currentOrigin = request()->getSchemeAndHttpHost();

    return preg_replace(
      '/src="https?:\/\/[^\/]+/i',
      'src="' . $currentOrigin,
      $value
    );
  }
}
