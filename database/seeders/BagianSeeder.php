<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagianSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $bagian = [
      ['id' => 2, 'nama' => 'SEKRETARIAT'],
      ['id' => 3, 'nama' => 'BIDANG PENILAIAN KINERJA APARATUR & PENGHARGAAN'],
      ['id' => 4, 'nama' => 'BIDANG MUTASI DAN PROMOSI'],
      ['id' => 5, 'nama' => 'BIDANG PENGADAAN, PEMBERHENTIAN DAN INFORMASI'],
      ['id' => 6, 'nama' => 'BIDANG PENGEMBANGAN KOMPETENSI APARATUR'],
    ];

    foreach ($bagian as $item) {
      Bagian::create([
        'id'   => $item['id'],
        'nama' => $item['nama'],
        'slug' => str()->slug($item['nama']),
      ]);
    }
  }
}
