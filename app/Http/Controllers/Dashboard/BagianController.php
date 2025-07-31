<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BagianController extends Controller
{
  /**
   * RULES
   */
  protected function rules($request, $id = 0)
  {
    $request->validate([
      'nama' => [
        'required',
        Rule::unique('bagian')->ignore($id),
      ],
    ]);
  }

  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Daftar Bagian';
    $data  = Bagian::latest()->paginate(15);

    $dataEdit = null;
    if (request()->id) {
      $dataEdit = Bagian::findOrFail(request()->id);
    }

    return view('dashboard.bagian', compact('title', 'data', 'dataEdit'));
  }

  /**
   * STORE
   */
  public function store(Request $request)
  {
    $this->rules($request);

    Bagian::create([
      'nama' => trim(ucfirst($request->nama)),
      'slug' => str()->slug(trim(ucfirst($request->nama))),
    ]);

    return redirect()->route('dashboard.bagian.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $id)
  {
    $this->rules($request, $id);

    $data = Bagian::findOrFail($id);

    $data->update([
      'nama' => trim(ucfirst($request->nama)),
      'slug' => str()->slug(trim(ucfirst($request->nama))),
    ]);

    return redirect()->route('dashboard.bagian.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DESTROY
   */
  public function destroy($id)
  {
    $data = Bagian::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.bagian.index')->with('success', 'Data berhasil dihapus.');
  }
}
