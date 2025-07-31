<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
  /**
   * RULES
   */
  protected function rules($request)
  {
    $request->validate([
      'judul'     => ['required'],
      'tanggal'   => ['required'],
      'deskripsi' => ['required'],
      'link'      => ['required', 'url']
    ]);
  }

  /**
   * INDEX
   */
  public function index()
  {
    $title = 'Galeri Video';
    $data  = Video::latest()->paginate(10);
    return view('dashboard.galeri-video', compact('title', 'data'));
  }

  /**
   * CREATE
   */
  public function create()
  {
    $title = 'Form Galeri Video';
    return view('dashboard.galeri-video-form', compact('title'));
  }

  /**
   * EDIT
   */
  public function edit($id)
  {
    $title = 'Form Galeri Video';
    $data  = Video::findOrFail($id);
    return view('dashboard.galeri-video-form', compact('title', 'data'));
  }

  /**
   * STORE
   */
  public function store(Request $request)
  {
    $this->rules($request);

    Video::create([
      'judul'     => trim(ucfirst($request->judul)),
      'tanggal'   => $request->tanggal,
      'deskripsi' => trim(ucfirst($request->deskripsi)),
      'link'      => $request->link
    ]);

    return redirect()->route('dashboard.video.index')->with('success', 'Data berhasil ditambahkan.');
  }

  /**
   * STORE
   */
  public function update(Request $request, $id)
  {
    $this->rules($request);

    $data = Video::findOrFail($id);

    $data->update([
      'judul'     => trim(ucfirst($request->judul)),
      'tanggal'   => $request->tanggal,
      'deskripsi' => trim(ucfirst($request->deskripsi)),
      'link'      => $request->link
    ]);

    return redirect()->route('dashboard.video.index')->with('success', 'Data berhasil diperbarui.');
  }

  /**
   * DELETE
   */
  public function destroy($id)
  {
    $data = Video::findOrFail($id);
    $data->delete();

    return redirect()->route('dashboard.video.index')->with('success', 'Data berhasil dihapus.');
  }
}
