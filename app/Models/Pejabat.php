<?php

namespace App\Models;

use App\Models\Concerns\HasHashid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pejabat extends Model
{
  use HasHashid;

  protected $table = 'pejabat';
  protected $fillable = [
    'nama',
    'jabatan_id',
    'biografi',
    'foto',
  ];

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
