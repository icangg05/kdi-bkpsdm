<?php

namespace Database\Seeders;

use App\Models\KategoriRegulasi;
use App\Models\Regulasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RegulasiSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = Faker::create('id_ID');
    $kategoriIds = KategoriRegulasi::pluck('id')->toArray();

    // Data regulasi
    $regulasiList = [
      [
        'judul' => "Surat Kepala BKN Nomor 7902/B-AK.03/SD/K/2025",
        'deskripsi' => "Keikutsertaan Pejabat di Lingkungan BKN sebagai Panitia Seleksi Jabatan Pimpinan Tinggi.",
        'lampiran' => "lampiran/dummy.pdf",
      ],
      [
        'judul' => "Surat Edaran Kepala BKN Nomor 4 Tahun 2025",
        'deskripsi' => "Pedoman akreditasi penyelenggaraan penilaian kompetensi ASN.",
        'lampiran' => "lampiran/dummy.pdf",
      ],
      [
        'judul' => "Peraturan BKN Nomor 2 Tahun 2025",
        'deskripsi' => "Kenaikan pangkat reguler pegawai negeri sipil.",
        'lampiran' => "lampiran/dummy.pdf",
      ],
      [
        'judul' => "Surat Deputi BKN Nomor 7199/B-KS.04.01/SD/E/2025",
        'deskripsi' => "Penyesuaian jadwal seleksi pengadaan PPPK TA 2024 Tahap II.",
        'lampiran' => "lampiran/dummy.pdf",
      ],
      [
        'judul' => "Surat Kepala BKN Nomor 7909/B-KS.04.01/SD/K/2025",
        'deskripsi' => "Jadwal seleksi penerimaan Sekolah Kedinasan Tahun 2025.",
        'lampiran' => "lampiran/dummy.pdf",
      ],
      [
        'judul' => "Surat Deputi BKN Nomor 6496/B-MP.03.01/SD/D/2025",
        'deskripsi' => "Pemanfaatan Aplikasi SIASN untuk Layanan Pengangkatan CPNS.",
        'lampiran' => "lampiran/dummy.pdf",
      ],
    ];


    // Tambahan 94 data acak
    for ($i = 0; $i < 94; $i++) {
      Regulasi::create([
        'judul' => $faker->sentence(6),
        'kategori_regulasi_id' => $faker->randomElement($kategoriIds),
        'deskripsi' => $faker->paragraph(),
        'lampiran' => 'lampiran/dummy.pdf',
        'total_unduh' => $faker->numberBetween(0, 500),
      ]);
    }

    foreach ($regulasiList as $item) {
      Regulasi::create([
        'judul'                => $item['judul'],
        'kategori_regulasi_id' => $faker->randomElement($kategoriIds),
        'deskripsi'            => $item['deskripsi'],
        'lampiran'             => $item['lampiran'],
        'total_unduh'          => $faker->numberBetween(0, 200),
      ]);
    }
  }
}
