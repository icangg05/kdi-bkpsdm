<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::create([
      'name'     => 'Administrator',
      'username' => 'admin',
      'email'    => 'bkpsdm.kendarikota@gmail.com',
      'password' => Hash::make('bkpsdmkdi123')
    ]);

    $this->call([
      BagianSeeder::class,
      UnitOrganisasiSeeder::class,
      JabatanSeeder::class,
      PejabatSeeder::class,
      SliderSeeder::class,
      BeritaSeeder::class,
      KategoriRegulasiSeeder::class,
      RegulasiSeeder::class,
      FotoSeeder::class,
      VideoSeeder::class,
      PengaturanSeeder::class,
      StatistikASNSeeder::class,
    ]);
  }
}
