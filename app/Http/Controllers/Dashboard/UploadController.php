<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
  public function uploadImage(Request $request)
  {
    if ($request->hasFile('upload')) {
      $file = $request->file('upload');
      $filename = str()->random(20) . '.' . $file->getClientOriginalExtension();

      $path = $file->storeAs('ckeditor5', $filename);

      $url = Storage::url($path);

      return response()->json([
        'url' => $url,
      ]);
    }

    return response()->json(['error' => 'No file uploaded.'], 400);
  }
}
