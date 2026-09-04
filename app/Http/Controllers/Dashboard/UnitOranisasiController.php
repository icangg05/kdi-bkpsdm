<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bagian;
use App\Models\UnitOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitOranisasiController extends Controller
{
  /**
   * RULES
   */
  protected function rules($request)
  {
    $request->validate([
      'nama' => [
        'required',
        Rule::unique('unit_organisasi')->where(function ($query) use ($request) {
          return $query->where('bagian_id', $request->bagian_id);
        }),
      ],
    ]);
  }

  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Daftar Unit Organisasi';
    $data  = UnitOrganisasi::with('bagian')->latest();

    $dataEdit = null;
    if (request()->id) {
      $dataEdit = UnitOrganisasi::findOrFail(request()->id);
    }

    if (request()->q)
      $data = $data->where('nama', 'like', '%' . request()->q . '%');

    $data = $data->paginate(15);

    return view('dashboard.unit-organisasi', compact('title', 'data', 'dataEdit'));
  }

  /**
   * STORE
   */
  public function store(Request $request)
  {
    $this->rules($request);

    UnitOrganisasi::create([
      'nama'      => trim(ucfirst($request->nama)),
      'slug'      => str()->slug(trim(ucfirst($request->nama))),
      'bagian_id' => $request->bagian_id
    ]);

    return redirect()->route('dashboard.unit-organisasi.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $id)
  {
    $this->rules($request, $id);

    $data = UnitOrganisasi::findOrFail($id);

    $data->update([
      'nama'      => trim(ucfirst($request->nama)),
      'slug'      => str()->slug(trim(ucfirst($request->nama))),
      'bagian_id' => $request->bagian_id
    ]);

    return redirect()->route('dashboard.unit-organisasi.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DESTROY
   */
  public function destroy($id)
  {
    $data = UnitOrganisasi::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.unit-organisasi.index')->with('success', 'Data berhasil dihapus.');
  }
}
