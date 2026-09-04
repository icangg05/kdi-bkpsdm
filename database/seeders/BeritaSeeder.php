<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BeritaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = Faker::create('id_ID');
    $kategoriList = ['berita', 'pengumuman', 'ucapan-selamat', 'berita-duka'];

    for ($i = 0; $i < 100; $i++) {
      $kategori = $faker->randomElement($kategoriList);
      $judul = $this->generateJudul($kategori, $faker);
      $slug = str()->slug($judul);

      Berita::create([
        'judul'    => $judul,
        'slug'     => $slug,
        'tanggal'  => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        'isi'      => $this->generateIsi($kategori, $faker),
        'sampul'   => null,
        'kategori' => $kategori,
      ]);
    }
  }

  private function generateJudul(string $kategori, $faker): string
  {
    return match ($kategori) {
      'berita'         => 'Kegiatan ' . $faker->word() . ' di ' . $faker->city(),
      'pengumuman'     => 'Pengumuman Terkait ' . ucfirst($faker->word()),
      'ucapan-selamat' => 'Ucapan Selamat kepada ' . $faker->name(),
      'berita-duka'    => 'Berita Duka: ' . $faker->name() . ' Telah Berpulang',
    };
  }

  private function generateIsi(string $kategori, $faker): string
  {
    $p1 = "<p>" . $faker->paragraph() . "</p>";
    $p2 = "<p><strong>" . $faker->sentence() . "</strong> " . $faker->paragraph() . "</p>";
    $p3 = "<p>" . $faker->paragraph() . "</p>";
    $ul = "<ul><li>" . implode("</li><li>", $faker->sentences(3)) . "</li></ul>";

    return match ($kategori) {
      'berita' => $p1 . $p2 . $p3 . $ul,
      'pengumuman' => "<h3>Perhatian</h3>" . $p1 . "<p><em>" . $faker->sentence() . "</em></p>" . $ul,
      'ucapan-selamat' => "<h4>Selamat!</h4>" . $p1 . $p2 . "<blockquote>" . $faker->sentence() . "</blockquote>",
      'berita-duka' => "<h3>Innalillahi wa inna ilaihi raji'un</h3>" . $p1 . "<p><strong>" . $faker->name() . "</strong> " . $faker->paragraph() . "</p>" . $p3,
    };
  }
}
