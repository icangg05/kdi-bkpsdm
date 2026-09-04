<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $data = ['slider/1.jpg', 'slider/2.jpg', 'slider/3.jpg'];

    foreach ($data as $item)
      Slider::create(['gambar' => $item]);
  }
}
