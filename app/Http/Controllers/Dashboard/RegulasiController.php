<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
  /**
   * RULES VALIDASI
   */
  protected function rules($request)
  {
    $request->validate([
      'judul'                => ['required'],
      'deskripsi'            => ['required'],
      'kategori_regulasi_id' => ['required'],
      'lampiran'             => ['nullable', 'max:'. config('app.size_file')],
    ]);
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $title = 'Regulasi';
    $data  = Regulasi::with('kategori_regulasi');

    if (request()->q)
      $data = $data->where('judul', 'like', '%' . request()->q . '%')
        ->orWhere('deskripsi', 'like', '%' . request()->q . '%');

    $data = $data->paginate(15);

    return view('dashboard.regulasi', compact('title', 'data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $title = 'Form Regulasi';
    return view('dashboard.regulasi-form', compact('title'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $this->rules($request);

    $lampiran = $request->file('lampiran')->store('lampiran');
    Regulasi::create([
      'judul'                => trim(ucfirst($request->judul)),
      'deskripsi'            => trim(ucfirst($request->deskripsi)),
      'kategori_regulasi_id' => $request->kategori_regulasi_id,
      'lampiran'             => $lampiran,
    ]);

    return redirect()->route('dashboard.regulasi.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $title = 'Form Regulasi';
    $data = Regulasi::findOrFail($id);

    return view('dashboard.regulasi-form', compact('title', 'data'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $this->rules($request);

    $data = Regulasi::findOrFail($id);

    if ($request->file('lampiran'))
      $lampiran = $request->file('lampiran')->store('lampiran');

    $data->update([
      'judul'                => trim(ucfirst($request->judul)),
      'deskripsi'            => trim(ucfirst($request->deskripsi)),
      'kategori_regulasi_id' => $request->kategori_regulasi_id,
      'lampiran'             => $lampiran ?? $data->lampiran,
    ]);

    return redirect()->route('dashboard.regulasi.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $data = Regulasi::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.regulasi.index')->with('success', 'Data berhasil dihapus.');
  }
}
