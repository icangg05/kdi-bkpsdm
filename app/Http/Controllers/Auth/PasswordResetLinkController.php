<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;

class PasswordResetLinkController extends Controller
{
  /**
   * Show the password reset link request page.
   */
  public function create(Request $request)
  {
    return view('auth.lupa-password', [
      'status' => $request->session()->get('status'),
    ]);
  }

  /**
   * Handle an incoming password reset link request.
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request)
  {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
      $request->only('email')
    );

    return $status === Password::ResetLinkSent
      ? back()->with(['status' => __($status)])
      : back()->withErrors(['email' => __($status)]);
  }
}
