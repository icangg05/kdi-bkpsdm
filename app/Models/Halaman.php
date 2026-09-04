<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Halaman extends Model
{
  protected $table = 'halaman';
  protected $guarded = [];

  protected static function booted()
  {
    static::updating(function ($data) {
      if ($data->isDirty('gambar')) {
        $gambarLama = $data->getOriginal('gambar');

        if ($gambarLama && Storage::exists($gambarLama)) {
          Storage::delete($gambarLama);
        }
      }

      if ($data->isDirty('lampiran')) {
        $lampiranLama = $data->getOriginal('lampiran');

        if ($lampiranLama && Storage::exists($lampiranLama)) {
          Storage::delete($lampiranLama);
        }
      }
    });
  }
}
