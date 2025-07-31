<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotoSeeder extends Seeder
{
  public function run(): void
  {
    $fotos = [
      [
        'judul'     => 'Workshop Penyusunan SKP ASN 2025',
        'tanggal'   => '2025-01-15',
        'deskripsi' => 'BKPSDM mengadakan workshop penyusunan Sasaran Kinerja Pegawai (SKP) terbaru.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Penerimaan CPNS Formasi 2024',
        'tanggal'   => '2025-02-10',
        'deskripsi' => 'Penerimaan CPNS dilaksanakan secara transparan dan profesional oleh BKPSDM.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Pelatihan Dasar Calon ASN',
        'tanggal'   => '2025-03-05',
        'deskripsi' => 'Pelatihan dasar (Latsar) bagi ASN baru untuk meningkatkan integritas dan pelayanan.',
        'gambar'    => null      ],
      [
        'judul'     => 'Sosialisasi e-Kinerja',
        'tanggal'   => '2025-03-22',
        'deskripsi' => 'Implementasi sistem e-Kinerja untuk memantau dan menilai kinerja ASN.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Rapat Koordinasi Penataan Jabatan',
        'tanggal'   => '2025-04-12',
        'deskripsi' => 'Koordinasi antar OPD untuk penyusunan dan penataan jabatan fungsional.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Penyerahan SK PPPK Tahap I',
        'tanggal'   => '2025-04-28',
        'deskripsi' => 'Penyerahan Surat Keputusan pengangkatan PPPK secara simbolis oleh Wali Kota.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Pelatihan Leadership ASN Muda',
        'tanggal'   => '2025-05-09',
        'deskripsi' => 'Pengembangan kepemimpinan bagi ASN muda agar siap memimpin di masa depan.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Simulasi CAT Seleksi ASN',
        'tanggal'   => '2025-05-20',
        'deskripsi' => 'BKPSDM mengadakan simulasi sistem CAT sebagai bagian dari transparansi seleksi ASN.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Peningkatan Layanan Kepegawaian',
        'tanggal'   => '2025-06-01',
        'deskripsi' => 'Evaluasi dan peningkatan layanan kepegawaian berbasis digital di lingkungan BKPSDM.',
        'gambar'    => null
      ],
      [
        'judul'     => 'Hari Ulang Tahun BKPSDM',
        'tanggal'   => '2025-07-01',
        'deskripsi' => 'Peringatan HUT BKPSDM ke-18 dengan kegiatan syukuran dan penyerahan penghargaan.',
        'gambar'    => null,
      ],
    ];

    foreach ($fotos as $foto) {
      DB::table('foto')->insert([
        'judul'      => $foto['judul'],
        'tanggal'    => $foto['tanggal'],
        'deskripsi'  => $foto['deskripsi'],
        'gambar'     => $foto['gambar'],
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
