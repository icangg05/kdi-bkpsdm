<?php

namespace Database\Seeders;

use App\Models\Bagian;
use App\Models\UnitOrganisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitOrganisasiSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $units = [
      ['id' => 1, 'bagian_id' => 2, 'nama' => 'SUB BAGIAN KEUANGAN DAN PELAPORAN'],
      ['id' => 2, 'bagian_id' => 3, 'nama' => 'SUB PENILAIAN & EVALUASI KINERJA APARATUR II'],
      ['id' => 3, 'bagian_id' => 4, 'nama' => 'SUB BIDANG PENGEMBANGAN KARIR & PROMOSI JABATAN'],
      ['id' => 4, 'bagian_id' => 5, 'nama' => 'SUB BIDANG PENGADAAN DAN PEMBERHENTIAN'],
      ['id' => 5, 'bagian_id' => 2, 'nama' => 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA'],
      ['id' => 6, 'bagian_id' => 6, 'nama' => 'SUB BIDANG PENJENJANGAN DAN SERTIFIKASI'],
      ['id' => 7, 'bagian_id' => 4, 'nama' => 'SUB BIDANG KEPANGKATAN'],
      ['id' => 8, 'bagian_id' => 3, 'nama' => 'SUB BIDANG DISIPLIN DAN PENGHARGAAN'],
      ['id' => 9, 'bagian_id' => 2, 'nama' => 'SUB BAGIAN UMUM DAN KEPEGAWAIAN'],
      ['id' => 10, 'bagian_id' => 4, 'nama' => 'SUB BIDANG MUTASI'],
      ['id' => 11, 'bagian_id' => 5, 'nama' => 'SUB BIDANG DATA DAN INFORMASI'],
      ['id' => 12, 'bagian_id' => 5, 'nama' => 'SUB BIDANG FASILITASI PROFESI ASN'],
      ['id' => 13, 'bagian_id' => 5, 'nama' => 'BIDANG PENGADAAN, PEMBERHENTIAN DAN INFORMASI'],
      ['id' => 14, 'bagian_id' => 2, 'nama' => 'SUB BAGIAN PERENCANAAN'],
      ['id' => 15, 'bagian_id' => 3, 'nama' => 'BIDANG PENILAIAN KINERJA APARATUR & PENGHARGAAN'],
      ['id' => 16, 'bagian_id' => 4, 'nama' => 'BIDANG MUTASI DAN PROMOSI'],
      ['id' => 17, 'bagian_id' => 6, 'nama' => 'BIDANG PENGEMBANGAN KOMPETENSI APARATUR'],
      ['id' => 18, 'bagian_id' => 6, 'nama' => 'SUB BIDANG PENGEMBANGAN KOMPETENSI'],
      ['id' => 19, 'bagian_id' => 6, 'nama' => 'SUB BIDANG DIKLAT TEKNIS FUNGSIONAL'],
      ['id' => 20, 'bagian_id' => 3, 'nama' => 'SUB BIDANG PENILAIAN & EVALUASI KINERJA APARATUR I'],
    ];

    foreach ($units as $item) {
      UnitOrganisasi::updateOrCreate([
        'id'        => $item['id'],
        'bagian_id' => $item['bagian_id'],
        'nama'      => $item['nama'],
        'slug'      => str()->slug($item['nama'],),
      ]);
    }
  }
}
