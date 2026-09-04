<?php

namespace Database\Seeders;

use App\Models\Pejabat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PejabatSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = [
      [
        'id' => 1,
        'nama' => 'ADI JAHYADI, SP',
        'jabatan_id' => 1,
      ],
      [
        'id' => 2,
        'nama' => 'AGUS PRIYANTO, S.SOS.,MM',
        'jabatan_id' => 6,
      ],
      [
        'id' => 3,
        'nama' => 'AGUS SALIM A.SURYA,S.Sos',
        'jabatan_id' => 3,
      ],
      [
        'id' => 4,
        'nama' => 'AGUSTIN, SE',
        'jabatan_id' => 4,
      ],
      [
        'id' => 5,
        'nama' => 'AHMADI, S.Tr.Par',
        'jabatan_id' => 5,
      ],
      [
        'id' => 6,
        'nama' => 'ALAN YUSTAKIM HS, S.TR.IP',
        'jabatan_id' => 6,
      ],
      [
        'id' => 7,
        'nama' => 'ALFIAN, SP, MM',
        'jabatan_id' => 7,
      ],
    ];

    foreach ($data as $item) {
      Pejabat::create($item);
    }
  }
}
