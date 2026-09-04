# Website BKPSDM Kota Kendari

Situs resmi Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Kendari — berita, pengumuman, regulasi, layanan, profil pejabat, galeri, dan statistik ASN — plus dashboard admin untuk mengelola semua kontennya.

**Stack:** Laravel 12 (PHP 8.2+) · Inertia · Vue 3 + TypeScript · Tailwind 4 · Vite · MySQL

## Menjalankan secara lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

composer dev   # server + queue + log + vite sekaligus
```

Aplikasi berjalan di http://localhost:8000.

Alternatif dengan Docker: `docker compose up -d` (lihat `compose.yml`).

## Perintah lain

| Perintah | Kegunaan |
| --- | --- |
| `npm run build` | Build aset produksi |
| `npm run lint` / `npm run format` | ESLint / Prettier |
| `php artisan test` | Jalankan test |
