<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JabatanController extends Controller
{
  /**
   * RULES
   */
  protected function rules($request, $id = 0)
  {
    $request->validate([
      // 'nama' => [
      //   'required',
      //   Rule::unique('jabatan')->ignore($id),
      // ],
      'nama' => [
        'required',
        Rule::unique('jabatan')->where(function ($query) use ($request) {
          return $query->where('unit_organisasi_id', $request->unit_organisasi_id);
        }),
      ],
    ]);
  }

  /**
   * RULES TUGAS
   */
  protected function rulesTugas($request)
  {
    $request->validate([
      'deskripsi_tugas' => ['required'],
    ]);
  }

  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Daftar Jabatan';
    $data  = Jabatan::latest();

    $dataEdit = null;
    if (request()->id) {
      $dataEdit = Jabatan::with(['unit_organisasi.bagian'])->findOrFail(request()->id);
    }

    if (request()->q)
      $data = $data->where('nama', 'like', '%' . request()->q . '%');

    $data = $data->paginate(15);

    return view('dashboard.jabatan', compact('title', 'data', 'dataEdit'));
  }

  /**
   * STORE
   */
  public function store(Request $request)
  {
    $this->rules($request);

    Jabatan::create([
      'nama'              => trim(ucfirst($request->nama)),
      'slug'              => str()->slug(trim(ucfirst($request->nama))),
      'unit_organisasi_id' => $request->unit_organisasi_id
    ]);

    return redirect()->route('dashboard.jabatan.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * UPDATE
   */
  public function update(Request $request, $id)
  {
    $this->rules($request, $id);

    $data = Jabatan::findOrFail($id);

    $data->update([
      'nama'              => trim(ucfirst($request->nama)),
      'slug'              => str()->slug(trim(ucfirst($request->nama))),
      'unit_organisasi_id' => $request->unit_organisasi_id
    ]);

    return redirect()->route('dashboard.jabatan.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DESTROY
   */
  public function destroy($id)
  {
    $data = Jabatan::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.jabatan.index')->with('success', 'Data berhasil dihapus.');
  }

  /**
   * TUGAS INDEX
   */
  public function tugasIndex($id)
  {
    $title = 'Daftar Tugas';
    $data  = Jabatan::findOrFail($id);
    $tugas = $data->tugas;
    // dd($tugas);

    return view('dashboard.jabatan-tugas', compact('title', 'data', 'tugas'));
  }

  /**
   * TUGAS STORE
   */
  public function tugasStore(Request $request, $id)
  {
    $this->rulesTugas($request);

    $data      = Jabatan::findOrFail($id);
    $tugasLama = $data->tugas ?? [];

    $tugasBaru   = trim(ucfirst($request->deskripsi_tugas));
    $tugasLama[] = $tugasBaru;

    // Simpan kembali
    $data->update([
      'tugas' => $tugasLama,
    ]);

    return redirect()->route('dashboard.jabatan.tugas.index', $id)->with('success', 'Deskrispi tugas berhasil ditambahkan.');
  }

  /**
   * TUGAS DESTROY
   */
  public function tugasDestroy($id, $index)
  {
    $data = Jabatan::findOrFail($id);
    $tugas = $data->tugas ?? [];

    if (!isset($tugas[$index])) {
      return back()->with('error', 'Tugas tidak ditemukan.');
    }

    unset($tugas[$index]);
    $tugas = array_values($tugas);

    $data->update(['tugas' => $tugas]);

    return redirect()->route('dashboard.jabatan.tugas.index', $id)->with('success', 'Deskrispi tugas berhasil dihapus.');
  }
}
