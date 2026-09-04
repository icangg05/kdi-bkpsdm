<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
  /**
   * RULES
   */
  protected function rulesGaleri($request)
  {
    $request->validate([
      'judul'     => ['required'],
      'tanggal'   => ['required'],
      'deskripsi' => ['required'],
      'gambar'    => ['nullable', 'image', 'max:' . config('app.size_img')]
    ]);
  }

  /**
   * GALERI INDEX
   */
  public function galeriIndex()
  {
    $title = 'Galeri Foto';
    $data  = Foto::latest();

    if (request()->q)
      $data = $data->where('judul', 'like', '%' . request()->q . '%')
        ->orWhere('deskripsi', 'like', '%' . request()->q . '%');

    $data = $data->paginate(15);

    return view('dashboard.galeri-foto', compact('title', 'data'));
  }

  /**
   * GALERI CREATE
   */
  public function galeriCreate()
  {
    $title = 'Form Galeri Foto';
    return view('dashboard.galeri-foto-form', compact('title'));
  }

  /**
   * GALERI EDIT
   */
  public function galeriEdit($id)
  {
    $title = 'Form Galeri Foto';
    $data  = Foto::findOrFail($id);
    return view('dashboard.galeri-foto-form', compact('title', 'data'));
  }

  /**
   * GALERI STORE
   */
  public function galeriStore(Request $request)
  {
    $this->rulesGaleri($request);

    $gambar = $request->file('gambar')->store('galeri');
    Foto::create([
      'judul'     => trim(ucfirst($request->judul)),
      'tanggal'   => $request->tanggal,
      'deskripsi' => trim(ucfirst($request->deskripsi)),
      'gambar'    => $gambar
    ]);

    return redirect()->route('dashboard.galeri.foto.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * GALERI STORE
   */
  public function galeriUpdate(Request $request, $id)
  {
    $this->rulesGaleri($request);

    $data = Foto::findOrFail($id);

    if ($request->file('gambar'))
      $gambar = $request->file('gambar')->store('galeri');

    $data->update([
      'judul'     => trim(ucfirst($request->judul)),
      'tanggal'   => $request->tanggal,
      'deskripsi' => trim(ucfirst($request->deskripsi)),
      'gambar'    => $gambar ?? $data->gambar
    ]);

    return redirect()->route('dashboard.galeri.foto.edit', $id)->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * GALERI DELETE
   */
  public function galeriDestroy($id)
  {
    $data = Foto::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.galeri.foto.index')->with('success', 'Data berhasil dihapus.');
  }
}
