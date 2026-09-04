<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <title>@yield('code') @yield('judul') - BKPSDM Kota Kendari</title>

  {{--
    Halaman ini dipakai justru ketika aplikasi sedang tidak sehat: basis data
    bisa mati, dan berkas hasil build Vite bisa belum ada. Jadi tidak ada
    permintaan ke luar, tidak ada Vite, tidak ada kueri. Alamat surel ditulis tetap di sini, bukan diambil dari tabel
    pengaturan, karena tabel itulah yang mungkin sedang tidak terbaca. Warnanya disalin dari
    palet "Balaikota" di resources/css/app.css, ditulis langsung di sini.
  --}}
  <style>
    :root {
      --brand-200: #c4d2ea;
      --brand-700: #26407a;
      --brand-800: #1b2c52;
      --brand-900: #14213d;
      --gold-500: #e0a106;
      --line: #dde3ed;
      --ink: #16202e;
      --ink-soft: #4a5768;
      --surface: #ffffff;
    }

    * {
      box-sizing: border-box;
    }

    html {
      color-scheme: light;
    }

    body {
      margin: 0;
      min-height: 100dvh;
      display: grid;
      place-items: center;
      padding: 2.5rem 1rem;
      background-color: var(--brand-900);
      background-image: radial-gradient(circle at 50% 0%, #1b2c52, #14213d 70%);
      color: var(--ink);
      font-family: 'IBM Plex Sans', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif;
      line-height: 1.65;
    }

    .kartu {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      width: 100%;
      max-width: 34rem;
      padding: 2.5rem 1.5rem;
      border-radius: 12px;
      background-color: var(--surface);
      box-shadow: 0 24px 60px rgb(20 33 61 / 0.35);
      text-align: center;
    }

    /* Angka status sebagai motif latar, sama peranannya dengan angka raksasa
       di halaman galat versi Vue. */
    .angka {
      position: absolute;
      inset-inline: 0;
      top: 50%;
      z-index: -1;
      transform: translateY(-50%);
      font-size: clamp(8rem, 22vw, 14rem);
      font-weight: 800;
      line-height: 1;
      color: rgb(20 33 61 / 0.05);
      user-select: none;
    }

    .logo {
      width: 56px;
      height: auto;
    }

    .kode {
      margin: 1.25rem 0 0;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: #7a5200;
    }

    h1 {
      margin: 0.5rem 0 0;
      font-size: 1.5rem;
      font-weight: 700;
      line-height: 1.2;
      color: var(--ink);
    }

    .garis {
      display: block;
      width: 4rem;
      height: 4px;
      margin: 1.25rem auto 0;
      border-radius: 9999px;
      background-color: var(--gold-500);
    }

    p {
      margin: 1.25rem 0 0;
      font-size: 0.9375rem;
      color: var(--ink-soft);
    }

    .aksi {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-top: 1.75rem;
      padding: 12px 24px;
      border: 0;
      border-radius: 8px;
      background-color: var(--brand-700);
      color: var(--surface);
      font: inherit;
      font-size: 0.875rem;
      font-weight: 600;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .aksi:hover {
      background-color: var(--brand-800);
    }

    .aksi:focus-visible {
      outline: 2px solid var(--brand-700);
      outline-offset: 2px;
    }

    .kontak {
      margin-top: 1.75rem;
      padding-top: 1.25rem;
      border-top: 1px solid var(--line);
      font-size: 0.8125rem;
      color: var(--ink-soft);
    }

    .kontak a {
      color: var(--brand-700);
      text-decoration: none;
    }

    .kontak a:hover {
      text-decoration: underline;
    }

    @media (min-width: 640px) {
      .kartu {
        padding: 3rem 2.5rem;
      }

      h1 {
        font-size: 1.875rem;
      }
    }
  </style>
</head>

<body>
  <main class="kartu">
    <span class="angka" aria-hidden="true">@yield('code')</span>

    <img class="logo" src="/img/logo-bkpsdm.png" alt="Logo BKPSDM Kota Kendari" width="56" height="56">

    <p class="kode">Kode @yield('code')</p>
    <h1>@yield('judul')</h1>
    <span class="garis" aria-hidden="true"></span>

    <p>@yield('uraian')</p>

    @yield('aksi')

    <p class="kontak">
      Butuh bantuan? Hubungi <a href="mailto:bkpsdm.kendarikota@gmail.com">bkpsdm.kendarikota@gmail.com</a>
      pada Senin-Jumat, 08:00-16:00 WITA.
    </p>
  </main>
</body>

</html>
