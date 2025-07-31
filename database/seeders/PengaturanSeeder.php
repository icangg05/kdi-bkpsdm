<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = [
      ['nama_pengaturan' => 'no_hp', 'value' => '081212345678'],
      ['nama_pengaturan' => 'email_dinas', 'value' => 'bkpsdm.kendarikota@gmail.com'],
      ['nama_pengaturan' => 'alamat', 'value' => 'Jl. Drs. H. Abdullah Silondae No.8, Gedung Menara Balaikota Kendari Lt.5'],
      ['nama_pengaturan' => 'fb', 'value' => 'https://google.com'],
      ['nama_pengaturan' => 'ig', 'value' => 'https://google.com'],
      ['nama_pengaturan' => 'tt', 'value' => 'https://google.com'],
      ['nama_pengaturan' => 'yt', 'value' => 'https://google.com'],
      ['nama_pengaturan' => 'jam_operasional', 'value' => 'Senin-Jumat 08:00 - 16:00'],
    ];

    foreach ($data as $item)
      Pengaturan::create([
        'nama_pengaturan' => $item['nama_pengaturan'],
        'value'           => $item['value']
      ]);
  }
}
