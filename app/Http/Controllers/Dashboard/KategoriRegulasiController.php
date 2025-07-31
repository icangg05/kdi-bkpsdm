<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KategoriRegulasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriRegulasiController extends Controller
{
  /**
   * RULES
   */
  protected function rules($request, $id = 0)
  {
    $request->validate([
      'nama' => [
        'required',
        Rule::unique('kategori_regulasi')->ignore($id),
      ],
    ]);
  }

  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Kategori Regulasi';
    $data  = KategoriRegulasi::latest()->paginate(10);

    $dataEdit = null;
    if (request()->id) {
      $dataEdit = KategoriRegulasi::findOrFail(request()->id);
    }

    return view('dashboard.kategori-regulasi', compact('title', 'data', 'dataEdit'));
  }

  /**
   * STORE
   */
  public function store(Request $request)
  {
    $request->validate([
      'nama' => ['required', 'unique:kategori_regulasi'],
    ]);

    KategoriRegulasi::create([
      'nama' => trim(ucfirst($request->nama)),
      'slug' => str()->slug(trim(ucfirst($request->nama))),
    ]);

    return back()->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $id)
  {
    $this->rules($request, $id);

    $data = KategoriRegulasi::findOrFail($id);

    $data->update([
      'nama' => trim(ucfirst($request->nama)),
      'slug' => str()->slug(trim(ucfirst($request->nama))),
    ]);

    return redirect()->route('dashboard.kategori-regulasi.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DESTROY
   */
  public function destroy($id)
  {
    $data = KategoriRegulasi::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.kategori-regulasi.index')->with('success', 'Data berhasil dihapus.');
  }
}
