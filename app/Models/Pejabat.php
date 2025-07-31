<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pejabat extends Model
{
  protected $table = 'pejabat';
  protected $guarded = [];

  protected static function booted()
  {
    static::updating(function ($data) {
      if ($data->isDirty('foto')) {
        $fotoLama = $data->getOriginal('foto');

        if ($fotoLama && Storage::exists($fotoLama)) {
          Storage::delete($fotoLama);
        }
      }
    });

    static::deleting(function ($data) {
      if ($data->foto && Storage::exists($data->foto)) {
        Storage::delete($data->foto);
      }
    });
  }

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class, 'jabatan_id');
  }
}
