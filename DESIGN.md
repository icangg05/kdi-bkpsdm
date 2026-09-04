---
name: BKPSDM Kota Kendari
description: Situs informasi kepegawaian resmi Pemerintah Kota Kendari. Palet "Balaikota" diturunkan dari lambang kota.
colors:
  brand-50: "#f2f5fb"
  brand-100: "#e2eaf6"
  brand-200: "#c4d2ea"
  brand-300: "#9db2da"
  brand-400: "#6f8cc6"
  brand-500: "#4a6bb8"
  brand-600: "#33529a"
  brand-700: "#26407a"
  brand-800: "#1b2c52"
  brand-900: "#14213d"
  gold-400: "#f0c24a"
  gold-500: "#e0a106"
  gold-600: "#c08400"
  gold-800: "#7a5200"
  ink: "#16202e"
  ink-soft: "#4a5768"
  line: "#dde3ed"
  surface: "#ffffff"
  surface-2: "#f5f7fb"
typography:
  display:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(1.5rem, 3vw, 2.6rem)"
    fontWeight: 700
    lineHeight: 1.15
    letterSpacing: "normal"
  heading:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(1.5rem, 2.2vw, 1.875rem)"
    fontWeight: 700
    lineHeight: 1.2
  heading-centered:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(2.25rem, 4vw, 3.75rem)"
    fontWeight: 600
    lineHeight: 1.4
  ghost-label:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(8rem, 22vw, 21rem)"
    fontWeight: 800
    lineHeight: 1
  body:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "1rem"
    fontWeight: 400
    lineHeight: 1.65
  eyebrow:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "0.75rem"
    fontWeight: 600
    letterSpacing: "0.2em"
  lockup-agency:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "15px"
    fontWeight: 700
    lineHeight: 1.25
  lockup-govt:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "10px"
    fontWeight: 500
    letterSpacing: "normal"
  chart-label:
    fontFamily: "IBM Plex Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "13px"
    fontWeight: 600
rounded:
  control: "8px"
  card: "12px"
  pill: "9999px"
spacing:
  xs: "8px"
  sm: "16px"
  md: "24px"
  lg: "40px"
  section: "64px"
  section-lg: "96px"
components:
  button-primary:
    backgroundColor: "{colors.brand-700}"
    textColor: "{colors.surface}"
    rounded: "{rounded.control}"
    padding: "12px 24px"
  button-on-dark:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.brand-800}"
    rounded: "{rounded.control}"
    padding: "12px 24px"
  button-outline-on-dark:
    backgroundColor: "transparent"
    textColor: "{colors.surface}"
    rounded: "{rounded.control}"
    padding: "12px 24px"
  card:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.ink}"
    rounded: "{rounded.card}"
    padding: "20px"
  chip-active:
    backgroundColor: "{colors.brand-700}"
    textColor: "{colors.surface}"
    rounded: "{rounded.pill}"
    padding: "10px 16px"
  chip-idle:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.ink-soft}"
    rounded: "{rounded.pill}"
    padding: "10px 16px"
  card-kaca:
    backgroundColor: "rgb(255 255 255 / 0.10)"
    textColor: "{colors.surface}"
    rounded: "{rounded.card}"
    padding: "20px"
---

# Design

## Overview

Situs resmi BKPSDM Kota Kendari. Nada visualnya institusi pemerintah: tenang, padat informasi, tanpa retorika penjualan. Yang menonjol harus isinya (berita, regulasi, prosedur, angka statistik), bukan hiasnya.

Halaman dibaca oleh tiga kelompok yang datang dengan tujuan spesifik: ASN yang mencari prosedur, warga yang mencari pengumuman atau data, dan pelamar yang mengikuti jadwal seleksi. Semua tata letak dinilai dari satu hal: seberapa cepat orang menemukan satu hal yang dia cari.

**Mode halaman:** terang, dikunci. Tidak ada mode gelap. `color-scheme: light` disetel di `html`, dan tidak ada blok token `.dark`, sehingga kelas `dark` dari skrip preferensi sistem tidak berpengaruh pada situs publik. Alasannya: warna grafik ApexCharts dan dashboard Bootstrap "Berry" tidak ikut bertema, jadi mode gelap separuh jadi akan lebih buruk daripada tidak ada.

## Colors

Palet **"Balaikota"** diturunkan dari lambang Kota Kendari (`public/img/logo-kendari.png`): perisai biru, padi dan pendopo emas, garis tepi navy.

- **Biru (`brand-*`)** adalah warna dasar sekaligus warna aksi. `brand-700` untuk tombol dan tautan, `brand-800`/`brand-900` untuk bidang gelap (hero, pita survei, footer).
- **Emas (`gold-*`)** adalah aksen penanda, bukan warna tombol dan bukan warna isi bidang besar. Pakainya untuk hal kecil: eyebrow hero, dot slider aktif. Untuk teks emas di atas putih pakai `gold-800`, bukan `gold-500` (kontrasnya gagal).
- **Netral** hanya tiga: `ink` untuk teks utama, `ink-soft` untuk teks sekunder, `line` untuk garis dan ring.
- Latar seksi berselang-seling `surface` (putih) dan `surface-2`. Tidak ada gradien latar seksi.

Satu palet untuk seluruh halaman. Tidak ada `sky-*`, `emerald-*`, `pink-*`, `purple-*`, `orange-*` di situs publik.

**Grafik** memakai satu ramp biru berurutan (`resources/js/lib/chart.ts`), bukan pelangi kategorikal: kategori pendidikan dan jabatan itu ordinal, dan ramp satu rona menjaga seluruh seksi statistik terbaca sebagai satu sistem.

## Typography

IBM Plex Sans, satu keluarga, seluruh situs. Dimuat lewat `<link rel="preconnect">` + `<link rel="stylesheet">` di `resources/views/app.blade.php`, bukan `@import` di dalam CSS.

Hierarki dibentuk lewat bobot dan warna, bukan ukuran ekstrem:

| Peran | Kelas |
| --- | --- |
| Judul hero (h1) | `text-2xl sm:text-3xl lg:text-[2.6rem] font-bold leading-[1.15]` |
| Judul seksi (h2) | `text-2xl lg:text-3xl font-bold text-ink` |
| Judul kartu (h3) | `text-base lg:text-lg font-semibold text-ink` |
| Isi | `text-sm lg:text-base text-ink-soft leading-relaxed` |
| Eyebrow | `text-xs font-semibold uppercase tracking-[0.2em]` |

Eyebrow dijatah: **maksimal satu per tiga seksi**. Di beranda hanya hero yang memakainya.

## Layout

- `container`: `width: 100%`, `max-width: 1200px`, padding 1rem (1.875rem di `lg`). Jangan pernah dikembalikan ke `width: 1200px`, itu menyebabkan scroll horizontal di viewport 1024-1199px.
- Ritme seksi: `py-16 lg:py-24`. Jarak antar seksi diatur oleh padding seksi itu sendiri, bukan oleh `gap` induk atau margin negatif.
- Grid, bukan aritmetika flex. Kolom 12 untuk komposisi asimetris (`lg:col-span-7` / `lg:col-span-5`).
- Menu desktop menyala di `xl` (1280px), bukan `lg`. Lockup nama instansi terlalu panjang untuk muat satu baris bersama tujuh butir menu di 1024px.
- Setiap seksi punya keluarga tata letak berbeda. Di beranda: hero media penuh, pita teks berjalan, sorotan + daftar, grid kartu berkelompok, tab data + grafik, korsel media, grid media 3 kolom, pita ajakan membulat.
- **Pita ajakan membulat** adalah satu-satunya seksi yang tidak full-bleed: kotak `rounded-card` di dalam `container`, berlatar foto gelap, teks di kiri dan satu tombol di kanan yang sejajar dengan titik tengah blok teks. Dipakai sekali per halaman.
- Setiap grid yang berisi grafik ApexCharts wajib `min-w-0` pada item gridnya. Tanpa itu `min-width: auto` membuat lebar intrinsik SVG mendorong trek grid melebihi container dan halaman meluber horizontal di mobile.

## Elevation & Depth

Di atas bidang terang, kedalaman dibentuk oleh `ring-1 ring-line`, bukan bayangan. Kartu memakai ring; bayangan hanya untuk lapisan yang benar-benar mengambang (modal).

Di atas bidang gelap berfoto ada satu varian: **kartu kaca** (`card-kaca`). Isian `white/10`, `ring-1 ring-white/15`, `backdrop-blur-md`, plus sorotan tepi dalam `inset 0 1px 0 rgb(255 255 255 / 0.18)`. Sorotan tepi itu yang membuatnya terbaca sebagai lempeng bening, bukan kotak transparan. Judul putih, keterangan `brand-200`, ikon putih di dalam kotak `white/10`.

Kartu kaca wajib punya cadangan padat di `@media (prefers-reduced-transparency: reduce)`: latar jadi `brand-800` dan `backdrop-filter: none`. Tanpa itu, pengguna yang mematikan transparansi mendapat teks yang menumpuk langsung di atas foto.

Kartu kaca hanya untuk seksi yang memang berlatar foto gelap. Jangan dipakai di atas `surface` atau `surface-2`.

Hover kartu: `-translate-y-0.5` plus `ring-brand-300`. Aktif: kembali ke `translate-y-0` atau `translate-y-px`.

## Shapes

Tiga tingkat, dipakai konsisten:

- `rounded-control` (8px): tombol, input, thumbnail kecil.
- `rounded-card` (12px): kartu, media, panel, modal.
- `rounded-full`: chip kategori, tombol ikon bundar, dot.

## Components

**Tombol.** Di atas bidang gelap: isi putih dengan teks `brand-800` (utama), garis putih transparan (sekunder). Di atas bidang terang: isi `brand-700` dengan teks putih. Tidak ada tombol emas.

**Tombol ikon.** Selalu `size-11` (44px) meskipun ikonnya `size-4`. Berlaku untuk ikon sosial, kendali slider, tombol jeda, dan hamburger.

**Kartu tautan.** Satu elemen `<a>` atau `<Link>` membungkus seluruh kartu, bukan `<span @click>`. Tautan keluar memakai `target="_blank" rel="noopener noreferrer"` plus ikon `ExternalLink` dan teks `sr-only` "(membuka situs lain di tab baru)".

**Modal.** Selalu lewat `components/ModalMedia.vue` (primitif Dialog reka-ui): kunci fokus, Esc menutup, scroll halaman terkunci. Jangan membangun overlay `<div>` sendiri.

**Grafik.** Selalu lewat `components/KartuGrafik.vue`. Kartu itu menyediakan judul, daftar `sr-only` berisi angka sebenarnya (SVG ApexCharts tidak terbaca pembaca layar), dan opsi `angka` untuk menulis nilai secara terbuka. Label data bawaan ApexCharts di grafik batang dimatikan: warnanya dipaksa oleh library dan kontrasnya gagal.

**Gerak.** `MOTION_INTENSITY` rendah. Hanya transisi hover/aktif, pergantian gambar hero, dan teks berjalan. Ketiganya punya tombol jeda dan berhenti sendiri di `prefers-reduced-motion: reduce`. Teks berjalan berganti jadi daftar statis, bukan sekadar berhenti terpotong.

**Keadaan kosong.** Setiap daftar yang isinya ditentukan admin wajib punya keadaan kosong. Seksi yang seluruhnya bergantung data (galeri, video, statistik) tidak dirender sama sekali kalau datanya kosong.

## Do's and Don'ts

**Lakukan**

- Turunkan warna baru dari `@theme` di `resources/css/app.css`. Kalau butuh nada yang belum ada, tambahkan ke skala `brand-*`.
- Tulis kelas Tailwind dari token: `text-ink`, `ring-line`, `bg-surface-2`, `text-brand-700`.
- Anggap semua konten variabel: judul panjang, gambar hilang, kategori kosong, HTML kaya dari CKEditor.
- Beri `loading="lazy"` dan `alt` bermakna pada setiap gambar; `alt=""` + `aria-hidden` hanya untuk gambar yang benar-benar dekoratif.
- Pertahankan slug route, `id` jangkar (`#layanan`), dan label menu utama. Situs ini diindeks dan ditautkan dari luar.

**Jangan**

- Jangan pakai teks bergradien (`bg-clip-text`), garis tebal satu sisi (`border-l-4`), atau emoji di dalam salinan antarmuka.
- Jangan pasang foto stok eksternal sebagai latar seksi. Situs ini menerbitkan catatan resmi; gambar yang bukan miliknya tidak dipakai sebagai identitas.
- Jangan `select-none` pada blok informasi. Menyalin nomor, alamat, dan judul regulasi itu bagian dari keterbukaan informasi publik.
- Jangan mengakses indeks larik konten secara langsung (`slider[2]`, `berita[0].judul`) tanpa penjaga. Admin bisa mengunggah lebih sedikit dari yang diasumsikan.
- Jangan menambahkan `<h1>` kedua. `AppLogo` memakai `<span>`; `<h1>` milik isi halaman.
- Jangan menaruh elemen interaktif di dalam `<a>`. Submenu adalah saudara kandung tautan induknya, bukan anaknya.
