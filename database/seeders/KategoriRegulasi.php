<?php

namespace Database\Seeders;

use App\Models\KategoriRegulasi as ModelsKategoriRegulasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriRegulasi extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = [
      'Undang-Undang',
      'Peraturan Pemerintah',
      'Peraturan Presiden',
      'Peraturan Menteri',
      'Peraturan Daerah',
      'Peraturan Wali Kota',
      'Keputusan Wali Kota',
      'Peraturan BKPSDM',
      'Standar Operasional Prosedur (SOP)',
      'Surat Edaran',
      'Instruksi',
      'Pedoman Teknis',
    ];

    foreach ($data as $item)
      ModelsKategoriRegulasi::create(['nama' => $item, 'slug' => str()->slug($item)]);
  }
}
