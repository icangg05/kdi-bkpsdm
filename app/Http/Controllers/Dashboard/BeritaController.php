<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
  /**
   * RULES VALIDATE
   */
  protected function rules($request)
  {
    return $request->validate([
      'judul'   => ['required'],
      'tanggal' => ['required', 'date'],
      'isi'     => ['required'],
      'sampul'  => ['nullable', 'image', 'max:2048'],
    ]);
  }

  // CONVERT SLUG TO TITLE
  protected function slugToTitle($string)
  {
    $validString = ['berita', 'pengumuman', 'ucapan-selamat', 'berita-duka'];
    if (!in_array($string, $validString))
      abort(404);

    return str()->title(str_replace('-', ' ', $string));
  }

  /**
   * INDEX
   */
  public function index($publikasi)
  {
    $title = $this->slugToTitle($publikasi);
    $data  = Berita::latest()->where('kategori', $publikasi);

    if (request()->q)
      $data = $data->where('judul', 'like', '%' . request()->q . '%')
        ->orWhere('isi', 'like', '%' . request()->q . '%');

    $data = $data->paginate(15);

    return view('dashboard.berita', compact('title', 'data', 'publikasi'));
  }

  /**
   * CREATE
   */
  public function create($publikasi)
  {
    $title = 'Form Buat ' . $this->slugToTitle($publikasi);
    return view('dashboard.berita-form', compact('title', 'publikasi'));
  }

  /**
   * EDIT
   */
  public function edit($publikasi, $id)
  {
    $title = 'Form Edit ' . $this->slugToTitle($publikasi);
    $data = Berita::findOrFail($id);

    return view('dashboard.berita-form', compact('title', 'data', 'publikasi'));
  }

  /**
   * STORE
   */
  public function store(Request $request, $publikasi)
  {
    $this->rules($request);

    $sampul = $request->file('sampul');
    if ($sampul)
      $sampul = $sampul->store($publikasi);

    Berita::create([
      'judul'    => ucfirst($request->judul),
      'slug'     => str()->slug($request->judul),
      'tanggal'  => $request->tanggal,
      'isi'      => $request->isi,
      'sampul'   => $sampul ?? null,
      'kategori' => $publikasi
    ]);

    return redirect()->route('dashboard.publikasi.index', $publikasi)->with('success', 'Data baru berhasil ditambahkan.');
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $publikasi, $id)
  {
    $this->rules($request);

    $data = Berita::findOrFail($id);

    $sampul = $request->file('sampul');
    if ($sampul)
      $sampul = $sampul->store($publikasi);

    $data->update([
      'judul'   => ucfirst($request->judul),
      'slug'    => str()->slug($request->judul),
      'tanggal' => $request->tanggal,
      'isi'     => $request->isi,
      'sampul'  => $sampul ?? $data->sampul,
    ]);

    return redirect()->route('dashboard.publikasi.index', $publikasi)->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DELETE
   */
  public function destroy($publikasi, $id)
  {
    $data = Berita::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.publikasi.index', $publikasi)->with('success', 'Data berhasil dihapus.');
  }
}
