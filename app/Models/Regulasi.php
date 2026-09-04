<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Regulasi extends Model
{
  protected $table = 'regulasi';
  protected $guarded = [];

  protected static function booted()
  {
    static::updating(function ($data) {
      if ($data->isDirty('lampiran')) {
        $lampiranLama = $data->getOriginal('lampiran');

        if ($lampiranLama && Storage::exists($lampiranLama)) {
          Storage::delete($lampiranLama);
        }
      }
    });

    static::deleting(function ($data) {
      if ($data->lampiran && Storage::exists($data->lampiran)) {
        Storage::delete($data->lampiran);
      }
    });
  }

  public function kategori_regulasi()
  {
    return $this->belongsTo(KategoriRegulasi::class, 'kategori_regulasi_id');
  }
}
