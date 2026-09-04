<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
  /**
   * Header keamanan dasar untuk seluruh respons.
   *
   * Sengaja tanpa Content-Security-Policy penuh: situs ini memuat CKEditor,
   * iframe YouTube, Google Fonts, dan skrip inline dari template Berry, jadi
   * script-src yang ketat akan mematikan dashboard. Yang dipasang di sini
   * adalah bagian CSP yang tidak punya risiko itu (frame-ancestors) ditambah
   * header lama yang setara.
   */
  public function handle(Request $request, Closure $next): Response
  {
    $response = $next($request);

    // Clickjacking: halaman tidak boleh dibingkai situs lain. frame-ancestors
    // untuk peramban modern, X-Frame-Options untuk yang belum mendukungnya.
    $response->headers->set('Content-Security-Policy', "frame-ancestors 'self'");
    $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

    // Jangan menebak tipe berkas. Berkas unggahan yang ditebak sebagai HTML
    // bisa berubah jadi XSS di domain sendiri.
    $response->headers->set('X-Content-Type-Options', 'nosniff');

    // Jangan bocorkan URL dashboard lengkap ke situs luar lewat Referer.
    $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

    $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');

    // HSTS hanya kalau permintaannya memang sudah lewat https. Memasangnya di
    // atas http tidak ada gunanya, dan di lingkungan lokal justru mengunci
    // peramban ke https untuk seluruh localhost.
    if ($request->secure()) {
      $response->headers->set(
        'Strict-Transport-Security',
        'max-age=31536000; includeSubDomains'
      );
    }

    return $response;
  }
}
