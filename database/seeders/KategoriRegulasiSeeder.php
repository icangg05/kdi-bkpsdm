<?php

namespace Database\Seeders;

use App\Models\KategoriRegulasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriRegulasiSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $kategoriList = [
      "Instruksi Presiden",
      "Keputusan Kepala BKN",
      "Keputusan Menteri",
      "Keputusan Presiden",
      "Peraturan Bersama",
      "Peraturan BKN",
      "Peraturan Kepala BKN",
      "Peraturan Menteri",
      "Peraturan Pemerintah",
      "Peraturan Presiden",
      "Surat Deputi",
      "Surat Edaran Kepala BKN",
      "Surat Kepala BKN",
      "Surat Menteri",
      "Topik Kepegawaian",
      "Undang-Undang",
      "UUD 1945",
    ];

    foreach ($kategoriList as $nama) {
      KategoriRegulasi::create([
        'nama' => $nama,
        'slug' => str()->slug($nama),
      ]);
    }
  }
}
