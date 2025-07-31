<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthenticatedSessionController extends Controller
{
  /**
   * Show the login page.
   */
  public function create(Request $request)
  {
    return view('auth.login', [
      'canResetPassword' => Route::has('password.request'),
      'status' => $request->session()->get('status'),
    ]);
  }

  /**
   * Handle an incoming authentication request.
   */
  public function store(LoginRequest $request)
  {
    // $request->authenticate();
    $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
      ? 'email'
      : 'username';

    $request->merge([
      $login_type => $request->input('email')
    ]);

    if (Auth::attempt($request->only($login_type, 'password'))) {
      $request->session()->regenerate();

      return redirect()->intended(route('dashboard.home', absolute: false));
    }

    return redirect()->back()
      ->withInput()
      ->withErrors([
        'email' => 'Email/username atau password salah.',
      ]);
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request): RedirectResponse
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
