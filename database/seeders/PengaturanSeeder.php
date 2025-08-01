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
      ['label' => 'No Hp', 'nama_pengaturan' => 'no_hp', 'value' => '081212345678'],
      ['label' => 'Email Dinas', 'nama_pengaturan' => 'email_dinas', 'value' => 'bkpsdm.kendarikota@gmail.com'],
      ['label' => 'Alamat', 'nama_pengaturan' => 'alamat', 'value' => 'Jl. Drs. H. Abdullah Silondae No.8, Gedung Menara Balaikota Kendari Lt.5'],
      ['label' => 'Facebook', 'nama_pengaturan' => 'fb', 'value' => '#'],
      ['label' => 'Instagram', 'nama_pengaturan' => 'ig', 'value' => 'https://www.instagram.com/bkpsdmkendari'],
      ['label' => 'Twitter', 'nama_pengaturan' => 'tt', 'value' => '#'],
      ['label' => 'Youtube', 'nama_pengaturan' => 'yt', 'value' => 'https://www.youtube.com/@bkpsdmkendari1551'],
      ['label' => 'Jam Operasional', 'nama_pengaturan' => 'jam_operasional', 'value' => 'Senin-Jumat 08:00 - 16:00'],
    ];

    foreach ($data as $item)
      Pengaturan::create([
        'nama_pengaturan' => $item['nama_pengaturan'],
        'label'           => $item['label'],
        'value'           => $item['value']
      ]);
  }
}
