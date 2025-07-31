<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pejabat;
use Illuminate\Http\Request;

class PejabatController extends Controller
{
  /**
   * RULES
   */
  protected function rules($request)
  {
    $request->validate([
      'nama'       => ['required'],
      'jabatan_id' => ['required'],
      'foto'       => ['nullable', 'image', 'max:1024'],
    ]);
  }

  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Profil Pejabat';
    $data  = Pejabat::with('jabatan.unit_organisasi.bagian')->latest()->paginate(10);

    return view('dashboard.pejabat', compact('title', 'data'));
  }

  /**
   * CREATE
   */
  public function create()
  {
    $title = 'Form Profil Pejabat';
    return view('dashboard.pejabat-form', compact('title'));
  }

  /**
   * STORE
   */
  public function store(Request $request)
  {
    $this->rules($request);

    if ($request->file('foto'))
      $foto = $request->file('foto')->store('pejabat');

    Pejabat::create([
      'nama'       => trim($request->nama),
      'jabatan_id' => $request->jabatan_id,
      'foto'       => $foto ?? null,
    ]);

    return redirect()->route('dashboard.pejabat.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * EDIT
   */
  public function edit(Request $request, $id)
  {
    $title = 'Form Profil Pejabat';
    $data  = Pejabat::with('jabatan')->findOrFail($id);

    return view('dashboard.pejabat-form', compact('title', 'data'));
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $id)
  {
    $this->rules($request);

    $data = Pejabat::findOrFail($id);

    if ($request->file('foto'))
      $foto = $request->file('foto')->store('pejabat');

    $data->update([
      'nama'       => trim($request->nama),
      'jabatan_id' => $request->jabatan_id,
      'foto'       => $foto ?? $data->foto,
    ]);

    return redirect()->route('dashboard.pejabat.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DESTROY
   */
  public function destroy($id)
  {
    $data = Pejabat::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.pejabat.index')->with('success', 'Data berhasil dihapus.');
  }
}
