<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import {
  ArrowRight,
  Camera,
  FileText,
  Home,
  Images,
  Mail,
  Newspaper,
  RotateCcw,
  Scale,
  Users,
} from 'lucide-vue-next'
import { computed } from 'vue'

const props = withDefaults(defineProps<{ status?: number }>(), { status: 404 })

// Kalimatnya menyebut apa yang terjadi dan apa langkah berikutnya, tanpa
// menyalahkan pengunjung dan tanpa mengklaim hal yang tidak dilakukan
// (misalnya "tim teknis sudah diberi tahu" - tidak ada notifikasi seperti itu).
const PESAN: Record<number, { judul: string; uraian: string }> = {
  401: {
    judul: 'Anda belum masuk',
    uraian: 'Halaman ini hanya dapat dibuka setelah masuk ke sistem.',
  },
  403: {
    judul: 'Akses ditolak',
    uraian: 'Anda tidak memiliki izin untuk membuka halaman ini. Bila seharusnya punya akses, hubungi kami pada jam kerja.',
  },
  404: {
    judul: 'Halaman tidak ditemukan',
    uraian: 'Alamat yang Anda buka tidak ada, sudah dipindahkan, atau tautannya salah ketik. Coba mulai dari salah satu tujuan di bawah.',
  },
  419: {
    judul: 'Sesi Anda telah berakhir',
    uraian: 'Halaman dibiarkan terbuka terlalu lama. Muat ulang halaman ini, lalu kirim kembali isian Anda.',
  },
  429: {
    judul: 'Terlalu banyak permintaan',
    uraian: 'Permintaan dari perangkat Anda terlalu sering dalam waktu singkat. Tunggu sebentar, lalu coba lagi.',
  },
  500: {
    judul: 'Terjadi kesalahan pada server',
    uraian: 'Gangguan ada di sisi kami, bukan pada perangkat Anda. Silakan coba beberapa saat lagi.',
  },
  503: {
    judul: 'Situs sedang dalam pemeliharaan',
    uraian: 'Situs sedang diperbarui dan akan kembali dalam waktu dekat.',
  },
}

const pesan = computed(
  () =>
    PESAN[props.status] ?? {
      judul: 'Terjadi kesalahan',
      uraian: 'Permintaan Anda tidak dapat diproses. Silakan kembali ke beranda atau coba lagi.',
    },
)

// Galat yang bisa hilang dengan mengulang permintaan; sisanya tidak ada
// gunanya ditawari tombol muat ulang.
const bisaDiulang = computed(() => [419, 429, 500, 503].includes(props.status))

// Saat pemeliharaan seluruh alamat mengembalikan galat yang sama, jadi daftar
// tujuan hanya akan menyesatkan.
const tampilkanTujuan = computed(() => props.status !== 503)

const tujuan = [
  { label: 'Layanan Kepegawaian', desc: 'Prosedur dan syarat urusan ASN', href: route('layanan'), icon: FileText },
  { label: 'Regulasi', desc: 'Peraturan dan SOP yang berlaku', href: route('regulasi', 'all'), icon: Scale },
  { label: 'Berita', desc: 'Kabar dan kegiatan instansi', href: route('publikasi.index', 'berita'), icon: Newspaper },
  { label: 'Pengumuman', desc: 'Informasi resmi dan jadwal seleksi', href: route('publikasi.index', 'pengumuman'), icon: Images },
  { label: 'Statistik Pegawai', desc: 'Data ASN Kota Kendari', href: route('statistik-pegawai'), icon: Users },
  { label: 'Galeri Foto', desc: 'Dokumentasi kegiatan', href: route('galeri-foto'), icon: Camera },
]

function muatUlang() {
  window.location.reload()
}
</script>

<template>

  <Head :title="`${status} ${pesan.judul}`" />

  <AppLayout>
    <!-- Pita gelap. Navbar situs ini translusen dan mengandalkan bidang gelap
         di balik dirinya; di atas latar terang teks putihnya tidak terbaca.
         Jadi halaman galat ikut ritme yang sama: pita gelap dulu, baru isi. -->
    <section class="relative isolate overflow-hidden bg-brand-900 px-4 pb-16 pt-32 text-center lg:pb-20 lg:pt-40">
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.18] [background-image:radial-gradient(var(--color-brand-400)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>
      <div aria-hidden="true" class="absolute -right-32 -top-40 -z-10 size-96 rounded-full bg-brand-700/40 blur-3xl">
      </div>
      <div aria-hidden="true" class="absolute -bottom-40 -left-24 -z-10 size-80 rounded-full bg-gold-500/10 blur-3xl">
      </div>
      <span aria-hidden="true"
        class="pointer-events-none absolute left-1/2 top-1/2 -z-10 -translate-x-1/2 -translate-y-1/2 select-none text-[clamp(8rem,22vw,21rem)] font-extrabold leading-none text-white/[0.06]">
        {{ status }}
      </span>

      <div class="container">
        <div class="mx-auto max-w-2xl">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-400">Kode {{ status }}</p>
          <h1 class="mt-3 text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">
            {{ pesan.judul }}
          </h1>
          <span class="mx-auto mt-5 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>
          <p class="mt-5 text-sm leading-relaxed text-brand-200 lg:text-base">{{ pesan.uraian }}</p>

          <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <Link :href="route('beranda')"
              class="inline-flex w-full items-center justify-center gap-2 rounded-control bg-white px-6 py-3 text-sm font-semibold text-brand-800 transition hover:bg-brand-100 active:translate-y-px sm:w-auto">
            <Home class="size-4" aria-hidden="true" />
            Kembali ke Beranda
            </Link>

            <button v-if="bisaDiulang" type="button" @click="muatUlang"
              class="inline-flex w-full items-center justify-center gap-2 rounded-control px-6 py-3 text-sm font-semibold text-white ring-1 ring-white/40 transition hover:bg-white/10 hover:ring-white/70 active:translate-y-px sm:w-auto">
              <RotateCcw class="size-4" aria-hidden="true" />
              Muat Ulang
            </button>

            <Link v-else :href="route('hubungi-kami')"
              class="inline-flex w-full items-center justify-center gap-2 rounded-control px-6 py-3 text-sm font-semibold text-white ring-1 ring-white/40 transition hover:bg-white/10 hover:ring-white/70 active:translate-y-px sm:w-auto">
            <Mail class="size-4" aria-hidden="true" />
            Hubungi Kami
            </Link>
          </div>
        </div>
      </div>
    </section>

    <!-- Tujuan alternatif. Untuk situs informasi, ini bagian yang benar-benar
         menolong: pengunjung datang mencari sesuatu, bukan mencari halaman ini. -->
    <section v-if="tampilkanTujuan" class="relative isolate overflow-hidden bg-surface-2 py-12 lg:py-16">
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>

      <div class="container">
        <h2 class="text-center text-base font-semibold text-ink lg:text-lg">Mungkin ini yang Anda cari</h2>
        <span class="mx-auto mt-2 block h-0.5 w-10 rounded-full bg-gold-500" aria-hidden="true"></span>

        <ul class="mx-auto mt-8 grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <li v-for="item in tujuan" :key="item.href" class="h-full">
            <Link :href="item.href"
              class="group flex h-full items-start gap-3 rounded-card bg-surface p-4 ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 active:translate-y-0">
            <span
              class="grid size-9 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700 transition group-hover:bg-brand-100">
              <component :is="item.icon" class="size-4" aria-hidden="true" />
            </span>
            <span class="min-w-0 flex-1">
              <span class="block text-sm font-semibold text-ink">{{ item.label }}</span>
              <span class="mt-0.5 block text-xs leading-snug text-ink-soft">{{ item.desc }}</span>
            </span>
            <ArrowRight
              class="mt-1 size-4 shrink-0 text-ink-soft transition group-hover:translate-x-0.5 group-hover:text-brand-700"
              aria-hidden="true" />
            </Link>
          </li>
        </ul>
      </div>
    </section>
  </AppLayout>
</template>
