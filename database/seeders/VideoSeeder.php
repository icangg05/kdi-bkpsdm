<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
  public function run(): void
  {
    $videos = [
      [
        'judul'     => 'Pelatihan Dasar CPNS Angkatan I',
        'tanggal'   => '2025-01-10',
        'deskripsi' => 'Pelatihan dasar CPNS untuk membentuk ASN profesional.',
        'link'      => 'https://www.youtube.com/watch?v=pZuEnyetmHw',
      ],
      [
        'judul'     => 'Sosialisasi Perubahan Sistem E-Kinerja',
        'tanggal'   => '2025-01-25',
        'deskripsi' => 'BKPSDM menyosialisasikan perubahan terbaru dalam sistem E-Kinerja ASN.',
        'link'      => 'https://www.youtube.com/watch?v=UqhREcfQNHA',
      ],
      [
        'judul'     => 'Penyerahan SK PPPK Tahap I Kota Kendari',
        'tanggal'   => '2025-02-12',
        'deskripsi' => 'Wali Kota menyerahkan SK PPPK kepada peserta terpilih.',
        'link'      => 'https://www.youtube.com/watch?v=KSWtCnlSzQA',
      ],
      [
        'judul'     => 'Upacara Hari Kesadaran Nasional',
        'tanggal'   => '2025-02-17',
        'deskripsi' => 'BKPSDM memimpin pelaksanaan upacara Hari Kesadaran Nasional di halaman kantor.',
        'link'      => 'https://www.youtube.com/watch?v=_V9Qc-gn2CE&pp=0gcJCccJAYcqIYzv',
      ],
      [
        'judul'     => 'Simulasi Ujian CAT CPNS',
        'tanggal'   => '2025-03-01',
        'deskripsi' => 'Simulasi sistem CAT untuk persiapan tes CPNS.',
        'link'      => 'https://www.youtube.com/watch?v=S-Ypl-hXKyQ',
      ],
      [
        'judul'     => 'Peringatan Hari ASN Nasional',
        'tanggal'   => '2025-03-17',
        'deskripsi' => 'Peringatan Hari ASN dengan pemutaran video dedikasi ASN.',
        'link'      => 'https://www.youtube.com/watch?v=O3_xBBAJ400',
      ],
      [
        'judul'     => 'Bimbingan Teknis Penyusunan SKP',
        'tanggal'   => '2025-04-04',
        'deskripsi' => 'Bimtek bagi ASN untuk penyusunan SKP berbasis SMART.',
        'link'      => 'https://www.youtube.com/watch?v=S-Ypl-hXKyQ',
      ],
      [
        'judul'     => 'Talkshow Reformasi Birokrasi',
        'tanggal'   => '2025-04-15',
        'deskripsi' => 'Talkshow seputar strategi implementasi reformasi birokrasi di OPD.',
        'link'      => 'https://www.youtube.com/watch?v=_V9Qc-gn2CE&pp=0gcJCccJAYcqIYzv',
      ],
      [
        'judul'     => 'Training Service Excellent ASN',
        'tanggal'   => '2025-05-05',
        'deskripsi' => 'Pelatihan pelayanan prima bagi ASN Kota Kendari.',
        'link'      => 'https://www.youtube.com/watch?v=S-Ypl-hXKyQ',
      ],
      [
        'judul'     => 'Video Dokumentasi HUT BKPSDM ke-18',
        'tanggal'   => '2025-07-01',
        'deskripsi' => 'Dokumentasi kegiatan ulang tahun BKPSDM ke-18.',
        'link'      => 'https://www.youtube.com/watch?v=_V9Qc-gn2CE&pp=0gcJCccJAYcqIYzv',
      ],
    ];

    foreach ($videos as $video) {
      DB::table('video')->insert([
        'judul'      => $video['judul'],
        'tanggal'    => $video['tanggal'],
        'deskripsi'  => $video['deskripsi'],
        'link'       => $video['link'],
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
