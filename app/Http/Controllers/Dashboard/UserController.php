<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
      $users = $users->where(function ($query) {
        $query->where('name', 'like', '%' . request()->q . '%')
          ->orWhere('username', 'like', '%' . request()->q . '%')
          ->orWhere('email', 'like', '%' . request()->q . '%');
      });

    $users = $users->paginate(15)->withQueryString();

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
    $request->validate([
      'name'     => 'required|string|max:255',
      'username' => 'required|string|max:255|unique:users,username',
      'email'    => 'required|email|unique:users,email',
      'role'     => ['required', Rule::in(array_keys(User::ROLES))],
      'password' => 'required|string|min:8|confirmed',
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
    $this->pastikanBolehMengubah($user);

    $title = 'Form User';
    $data  = $user;
    return view('dashboard.user-form', compact('title', 'data'));
  }

  /**
   * Update data user.
   */
  public function update(Request $request, User $user)
  {
    $this->pastikanBolehMengubah($user);

    $request->validate([
      'name'     => 'required|string|max:255',
      'username' => 'required|unique:users,username,' . $user->id,
      'email'    => 'required|email|unique:users,email,' . $user->id,
      'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name     = $request->name;
    $user->username = $request->username;
    $user->email    = $request->email;

    // Peran hanya boleh disentuh administrator, dan tidak pada akun sendiri:
    // tanpa aturan kedua satu-satunya admin bisa menurunkan dirinya jadi
    // operator dan mengunci semua orang keluar dari menu User.
    if ($request->user()->can('admin') && $request->user()->id !== $user->id) {
      $request->validate(['role' => ['required', Rule::in(array_keys(User::ROLES))]]);
      $user->role = $request->role;
    }

    if ($request->password) {
      $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('dashboard.user.edit', $user->id)->with('success', 'Profil berhasil diperbarui.');
  }

  /**
   * Hapus user.
   */
  public function destroy(User $user)
  {
    abort_if($user->id === request()->user()->id, 403, 'Akun sendiri tidak bisa dihapus.');

    // Menghapus administrator terakhir membuat menu User dan Backup tidak
    // bisa dijangkau siapa pun lagi.
    if ($user->isAdmin() && User::where('role', 'admin')->count() <= 1) {
      return back()->with('error', 'Administrator terakhir tidak bisa dihapus.');
    }

    $user->delete();

    return redirect()->route('dashboard.user.index')->with('success', 'User berhasil dihapus.');
  }

  /**
   * Operator hanya boleh menyentuh akunnya sendiri; administrator siapa saja.
   * Dipakai bersama oleh edit() dan update() supaya tidak ada jalur yang lolos.
   */
  private function pastikanBolehMengubah(User $user): void
  {
    abort_unless(
      request()->user()->can('admin') || request()->user()->id === $user->id,
      403
    );
  }
}
