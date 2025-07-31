<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Slider';
    $data  = Slider::get();
    // dd($data);
    return view('dashboard.slider', compact('title', 'data'));
  }

  /**
   * UPDATE
   */
  public function update(Request $request)
  {
    $sliderIds = $request->slider_ids;
    $rules = [];
    foreach ($sliderIds as $id) {
      $rules["slider_$id"] = ['nullable', 'image', 'max:20480'];
    }

    $request->validate($rules);

    foreach ($sliderIds as $i) {
      $file = $request->file("slider_$i");
      if ($file) {
        $slider = Slider::findOrFail($i);
        // hapus file lama jika perlu
        if ($slider->gambar && Storage::exists($slider->gambar)) {
          Storage::delete($slider->gambar);
        }

        $path = $file->store('slider');
        $slider->update(['gambar' => $path]);
      }
    }

    return back()->with('success', 'Data slider berhasil diperbarui.');
  }
}
