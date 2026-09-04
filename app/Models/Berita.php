<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
  protected $table = 'berita';
  // total_view sengaja di luar: dinaikkan lewat increment(), yang tidak
  // lewat mass assignment.
  protected $fillable = [
    'judul',
    'slug',
    'tanggal',
    'isi',
    'sampul',
    'lampiran',
    'kategori',
  ];

  protected static function booted()
  {
    static::updating(function ($data) {
      if ($data->isDirty('sampul')) {
        $sampulLama = $data->getOriginal('sampul');

        if ($sampulLama && Storage::disk('public')->exists($sampulLama)) {
          Storage::delete($sampulLama);
        }
      }

        if ($data->isDirty('lampiran')) {
        $lampiranLama = $data->getOriginal('lampiran');

        if ($lampiranLama && Storage::disk('public')->exists($lampiranLama)) {
          Storage::delete($lampiranLama);
        }
      }
    });

    static::deleting(function ($data) {
      if ($data->sampul && Storage::exists($data->sampul)) {
        Storage::delete($data->sampul);
      }
      if ($data->lampiran && Storage::exists($data->lampiran)) {
        Storage::delete($data->lampiran);
      }
    });
  }
}
