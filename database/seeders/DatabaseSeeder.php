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
      'name'     => 'Superadmin',
      'username' => 'admin',
      'email'    => 'admin@gmail.com',
      'role'     => 'admin',
      'password' => Hash::make('admin')
    ]);

    $this->call([
      SliderSeeder::class,
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
