<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
      'sampul'  => ['nullable', 'image', 'max:' . config('app.size_img')],
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

    $sampul   = $request->file('sampul');
    $lampiran = $request->file('lampiran');

    if ($sampul)
      $sampul = $sampul->storeAs($publikasi, generate_filename($sampul));

    if ($lampiran)
      $lampiran = $lampiran->storeAs('lampiran', generate_filename($lampiran));

    Berita::create([
      'judul'    => ucfirst($request->judul),
      'slug'     => str()->slug($request->judul),
      'tanggal'  => $request->tanggal,
      'isi'      => $request->isi,
      'sampul'   => $sampul ?? null,
      'lampiran' => $lampiran ?? null,
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

    $sampul   = $request->file('sampul');
    $lampiran = $request->file('lampiran');

    if ($sampul)
      $sampul = $sampul->storeAs($publikasi, generate_filename($sampul));

    if ($lampiran)
      $lampiran = $lampiran->storeAs('lampiran', generate_filename($lampiran));

    $data->update([
      'judul'    => ucfirst($request->judul),
      'slug'     => str()->slug($request->judul),
      'tanggal'  => $request->tanggal,
      'isi'      => $request->isi,
      'sampul'   => $sampul ?? $data->sampul,
      'lampiran' => $lampiran ?? $data->lampiran,
    ]);

    // return redirect()->route('dashboard.publikasi.index', $publikasi)->with('success', 'Data berhasil diperbarui.');
    return back()->with('success', 'Data berhasil diperbarui.');
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

  /**
   * DELETE LAMPIRAN
   */
  public function deleteLampiran($id)
  {
    $data = Berita::findOrFail($id);
    Storage::delete($data->lampiran);
    $data->update([
      'lampiran' => null,
    ]);

    return back()->with('success', 'Lampiran berhasil dihapus.');
  }
}
