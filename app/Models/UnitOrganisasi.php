<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitOrganisasi extends Model
{
  protected $table   = 'unit_organisasi';
  protected $guarded = [];

  public function bagian()
  {
    return $this->belongsTo(Bagian::class);
  }

  public function jabatan()
  {
    return $this->hasMany(Jabatan::class);
  }
}
