<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  protected $table = 'jabatan';
  protected $guarded = [];

  protected $casts = [
    'tugas' => 'array',
  ];

  public function getTugasAttribute($value)
  {
    return $value ? json_decode($value, true) : [];
  }

  /**
   * RELASI
   */
  public function unit_organisasi()
  {
    return $this->belongsTo(UnitOrganisasi::class);
  }

  public function pejabat()
  {
    return $this->hasMany(Pejabat::class, 'jabatan_id');
  }
}
