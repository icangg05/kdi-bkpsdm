<?php

namespace Database\Seeders;

use App\Models\StatistikASN;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatistikASNSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = [
      [
        'label' => 'Tanggal Update',
        'slug'  => 'tanggal_update',
        'value' => '2025-06-31'
      ],
      [
        'label' => 'PNS',
        'slug'  => 'pns',
        'value' => '5451'
      ],
      [
        'label' => 'Laki - Laki',
        'slug'  => 'pns_l',
        'value' => '1987'
      ],
      [
        'label' => 'Perempuan',
        'slug'  => 'pns_p',
        'value' => '3464'
      ],

      [
        'label' => 'PPPK',
        'slug'  => 'pppk',
        'value' => '2293'
      ],
      [
        'label' => 'Laki - Laki',
        'slug'  => 'pppk_l',
        'value' => '448'
      ],
      [
        'label' => 'Perempuan',
        'slug'  => 'pppk_p',
        'value' => '1845'
      ],

      [
        'label' => 'SD',
        'slug'  => 'pns_sd',
        'value' => '5'
      ],
      [
        'label' => 'SMP',
        'slug'  => 'pns_smp',
        'value' => '6'
      ],
      [
        'label' => 'SMA/SMK',
        'slug'  => 'pns_sma_smk',
        'value' => '419'
      ],
      [
        'label' => 'D1',
        'slug'  => 'pns_d1',
        'value' => '5'
      ],
      [
        'label' => 'D2',
        'slug'  => 'pns_d2',
        'value' => '69'
      ],
      [
        'label' => 'D3',
        'slug'  => 'pns_d3',
        'value' => '353'
      ],
      [
        'label' => 'S1/D4',
        'slug'  => 'pns_s1_d4',
        'value' => '3688'
      ],
      [
        'label' => 'S2',
        'slug'  => 'pns_s2',
        'value' => '892'
      ],
      [
        'label' => 'S3',
        'slug'  => 'pns_s3',
        'value' => '14'
      ],

      [
        'label' => 'SLTP',
        'slug'  => 'pppk_sltp',
        'value' => '8'
      ],
      [
        'label' => 'SMA/SMK',
        'slug'  => 'pppk_sma_smk',
        'value' => '124'
      ],
      [
        'label' => 'D3',
        'slug'  => 'pppk_d3',
        'value' => '591'
      ],
      [
        'label' => 'SLTP',
        'slug'  => 'pppk_s1_d4',
        'value' => '1369'
      ],
      [
        'label' => 'S2',
        'slug'  => 'pppk_s2',
        'value' => '201'
      ],
    ];

    foreach ($data as $item) {
      StatistikASN::create([
        'label' => $item['label'],
        'value' => $item['value'],
        'slug'  => $item['slug'],
      ]);
    }
  }
}
