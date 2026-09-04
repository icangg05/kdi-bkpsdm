<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriRegulasi extends Model
{
  protected $table = 'kategori_regulasi';
  protected $guarded = [];

  public function regulasi()
  {
    return $this->hasMany(Regulasi::class, 'kategori_regulasi_id');
  }
}
