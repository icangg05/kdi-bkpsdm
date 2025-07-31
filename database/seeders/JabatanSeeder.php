<?php

namespace Database\Seeders;

use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\UnitOrganisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $jabatan = [
      ['id' => 1,  'unit_organisasi_id' => 1,  'nama' => 'KEPALA SUB BAGIAN'],
      ['id' => 2,  'unit_organisasi_id' => 2,  'nama' => 'ANALIS SDM APARATUR AHLI MUDA'],
      ['id' => 3,  'unit_organisasi_id' => 3,  'nama' => 'ANALIS PENGEMBANGAN KARIR'],
      ['id' => 4,  'unit_organisasi_id' => 4,  'nama' => 'PENGELOLA DATA'],
      ['id' => 5,  'unit_organisasi_id' => 3,  'nama' => 'PENELAAH TEKNIS KEBIJAKAN'],
      ['id' => 6,  'unit_organisasi_id' => 2,  'nama' => 'ANALIS PERENCANAAN SUMBER DAYA APARATUR'],
      ['id' => 7,  'unit_organisasi_id' => 5,  'nama' => 'KEPALA BADAN'],
      ['id' => 8,  'unit_organisasi_id' => 6,  'nama' => 'ANALIS SISTEM INFORMASI DAN JARINGAN'],
      ['id' => 9,  'unit_organisasi_id' => 7,  'nama' => 'PENGELOLA SIM KEPEGAWAIAN'],
      ['id' => 10, 'unit_organisasi_id' => 8,  'nama' => 'ANALIS PENGANUGERAHAN'],
      ['id' => 11, 'unit_organisasi_id' => 9,  'nama' => 'PENGELOLA DATA'],
      ['id' => 12, 'unit_organisasi_id' => 7,  'nama' => 'PENGELOLA KEPEGAWAIAN'],
      ['id' => 13, 'unit_organisasi_id' => 10, 'nama' => 'ANALIS SDM APARATUR AHLI MUDA'],
      ['id' => 14, 'unit_organisasi_id' => 9,  'nama' => 'KEPALA SUB BAGIAN'],
      ['id' => 15, 'unit_organisasi_id' => 1,  'nama' => 'ANALIS KEUANGAN'],
      ['id' => 16, 'unit_organisasi_id' => 8,  'nama' => 'PENGELOLA DATA'],
      ['id' => 17, 'unit_organisasi_id' => 11, 'nama' => 'ANALIS SISTEM INFORMASI'],
      ['id' => 18, 'unit_organisasi_id' => 12, 'nama' => 'ANALIS SDM APARATUR AHLI MUDA'],
      ['id' => 19, 'unit_organisasi_id' => 12, 'nama' => 'PENGELOLA DATA'],
      ['id' => 20, 'unit_organisasi_id' => 10, 'nama' => 'PENYUSUN RENCANA MUTASI'],
      ['id' => 21, 'unit_organisasi_id' => 12, 'nama' => 'ANALIS PERATURAN KEPEGAWAIAN'],
      ['id' => 22, 'unit_organisasi_id' => 13, 'nama' => 'KEPALA BIDANG'],
      ['id' => 23, 'unit_organisasi_id' => 7,  'nama' => 'PENYUSUN RENCANA MUTASI'],
      ['id' => 24, 'unit_organisasi_id' => 14, 'nama' => 'PENGELOLA ANGGARAN'],
      [
        'id' => 25, 'unit_organisasi_id' => 1,  'nama' => 'PENATA LAPORAN KEUANGAN'],
      [
        'id' => 26,
        'unit_organisasi_id' => 9,
        'nama' => 'ANALIS TATA USAHA'
      ],
      [
        'id' => 27,
        'unit_organisasi_id' => 15,
        'nama' => 'KEPALA BIDANG'
      ],
      [
        'id' => 28,
        'unit_organisasi_id' => 1,
        'nama' => 'PENGELOLA KEUANGAN'
      ],
      [
        'id' => 29,
        'unit_organisasi_id' => 8,
        'nama' => 'ANALIS PERMASALAHAN HUKUM'
      ],
      [
        'id' => 30,
        'unit_organisasi_id' => 16,
        'nama' => 'KEPALA BIDANG'
      ],
      [
        'id' => 31,
        'unit_organisasi_id' => 17,
        'nama' => 'KEPALA BIDANG'
      ],
      [
        'id' => 32,
        'unit_organisasi_id' => 18,
        'nama' => 'ANALIS PENGEMBANGAN KOMPETENSI'
      ],
      [
        'id' => 33,
        'unit_organisasi_id' => 2,
        'nama' => 'PENGELOLA DATA'
      ],
      [
        'id' => 34,
        'unit_organisasi_id' => 4,
        'nama' => 'ANALIS SDM APARATUR AHLI MUDA'
      ],
      [
        'id' => 35,
        'unit_organisasi_id' => 3,
        'nama' => 'ANALIS JABATAN'
      ],
      [
        'id' => 36,
        'unit_organisasi_id' => 19,
        'nama' => 'PENGELOLA DATA'
      ],
      [
        'id' => 37,
        'unit_organisasi_id' => 18,
        'nama' => 'ASESOR SDM APARATUR AHLI MUDA'
      ],
      [
        'id' => 38,
        'unit_organisasi_id' => 19,
        'nama' => 'ASESOR SDM APARATUR AHLI MUDA'
      ],
      [
        'id' => 39,
        'unit_organisasi_id' => 5,
        'nama' => 'SEKRETARIS'
      ],
      [
        'id' => 40,
        'unit_organisasi_id' => 14,
        'nama' => 'PERENCANA AHLI MUDA'
      ],
      [
        'id' => 41,
        'unit_organisasi_id' => 18,
        'nama' => 'PENGELOLA DATA'
      ],
      [
        'id' => 42,
        'unit_organisasi_id' => 9,
        'nama' => 'ANALIS HUKUM'
      ],
      [
        'id' => 43,
        'unit_organisasi_id' => 1,
        'nama' => 'BENDAHARA PENGELUARAN'
      ],
      [
        'id' => 44,
        'unit_organisasi_id' => 20,
        'nama' => 'ANALIS SDM APARATUR AHLI MUDA'
      ],
      [
        'id' => 45,
        'unit_organisasi_id' => 9,
        'nama' => 'ANALIS ASET DAERAH'
      ],
      [
        'id' => 46,
        'unit_organisasi_id' => 8,
        'nama' => 'ANALIS SDM APARATUR AHLI MUDA'
      ],
      [
        'id' => 47,
        'unit_organisasi_id' => 6,
        'nama' => 'PENGELOLA DATA'
      ],
      [
        'id' => 48,
        'unit_organisasi_id' => 8,
        'nama' => 'KONSELOR SDM'
      ],
      [
        'id' => 49,
        'unit_organisasi_id' => 20,
        'nama' => 'ANALIS PERENCANAAN SUMBER DAYA APARATUR'
      ],
      [
        'id' => 50,
        'unit_organisasi_id' => 11,
        'nama' => 'ANALIS SISTEM INFORMASI & JARINGAN'
      ],
      [
        'id' => 51,
        'unit_organisasi_id' => 6,
        'nama' => 'ASESOR SDM APARATUR AHLI MUDA'
      ],
    ];

    foreach ($jabatan as $item) {
      Jabatan::create([
        'id'                 => $item['id'],
        'unit_organisasi_id' => $item['unit_organisasi_id'],
        'nama'               => $item['nama'],
        'slug'               => str()->slug($item['nama']),
      ]);
    }
  }
}
