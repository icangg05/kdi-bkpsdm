<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Menampilkan daftar user.
   */
  public function index()
  {
    $title = 'User';
    $users = User::latest();

    if (request()->q)
      $users = $users->where('name', 'like', '%' . request()->q . '%')
        ->orWhere('username', 'like', '%' . request()->q . '%')
        ->orWhere('email', 'like', '%' . request()->q . '%');

    $users = $users->paginate(15);

    return view('dashboard.user', compact('title', 'users'));
  }

  /**
   * Menampilkan form tambah user.
   */
  public function create()
  {
    $title = 'Form User';
    return view('dashboard.user-form', compact('title'));
  }

  /**
   * Simpan user baru ke database.
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'name'     => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users,username',
      'email'    => 'required|email|unique:users,email',
      'role'     => 'required',
      'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
      'name'     => $request->name,
      'username' => $request->username,
      'email'    => $request->email,
      'role'     => $request->role,
      'password' => Hash::make($request->password),
    ]);

    return redirect()->route('dashboard.user.index')->with('success', 'User berhasil ditambahkan.');
  }

  /**
   * Menampilkan form edit user.
   */
  public function edit(User $user)
  {
    $title = 'Form User';
    $data  = $user;
    return view('dashboard.user-form', compact('title', 'data'));
  }

  /**
   * Update data user.
   */
  public function update(Request $request, User $user)
  {
    $request->validate([
      'name'     => 'required|string|max:255',
      'username' => 'required|unique:users,username,' . $user->id,
      'email'    => 'required|email|unique:users,email,' . $user->id,
      'role'     => 'required',
      'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name     = $request->name;
    $user->username = $request->username;
    $user->role     = $request->role;
    $user->email    = $request->email;

    if ($request->password) {
      $user->password = Hash::make($request->password);
    }

    $user->save();

    // if (Auth::user()->role == 'admin')
    // return redirect()->route('dashboard.user.index')->with('success', 'User berhasil diperbarui.');
    // else
    return redirect()->route('dashboard.user.edit', $user->id)->with('success', 'Profil berhasil diperbarui.');
  }

  /**
   * Hapus user.
   */
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('dashboard.user.index')->with('success', 'User berhasil dihapus.');
  }
}
