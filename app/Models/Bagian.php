<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
  protected $table   = 'bagian';
  protected $fillable = [
    'nama',
    'slug',
  ];

  public function unit_organisasi()
  {
    return $this->hasMany(UnitOrganisasi::class);
  }
}
