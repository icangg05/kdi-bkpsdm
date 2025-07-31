<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Foto extends Model
{
  protected $table = 'foto';
  protected $guarded = [];

  protected static function booted()
  {
    static::updating(function ($data) {
      if ($data->isDirty('gambar')) {
        $gambarLama = $data->getOriginal('gambar');

        if ($gambarLama && Storage::disk('public')->exists($gambarLama)) {
          Storage::delete($gambarLama);
        }
      }
    });

    static::deleting(function ($data) {
      if ($data->gambar && Storage::exists($data->gambar)) {
        Storage::delete($data->gambar);
      }
    });
  }
}
