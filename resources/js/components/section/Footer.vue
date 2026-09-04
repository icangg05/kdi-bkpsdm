<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { Clock, Facebook, Instagram, Mail, MapPin, Phone, Twitter, Youtube } from 'lucide-vue-next';
import { computed } from 'vue';

const page = usePage()
const ambil = (nama: string) =>
  (page.props.pengaturan as any[])?.find((item) => item.nama_pengaturan == nama)?.value || null

const alamat = ambil('alamat')
const noHp = ambil('no_hp')
const emailDinas = ambil('email_dinas')
const jamOperasional = ambil('jam_operasional')

// Peta situs mengikuti menu utama, supaya footer betul-betul jadi jalan pintas
// ke seluruh informasi publik, bukan hiasan.
const kolom = [
  {
    judul: 'Profil',
    tautan: [
      { label: 'Sejarah BKPSDM', href: route('profil', 'sejarah') },
      { label: 'Struktur Organisasi', href: route('profil', 'struktur-organisasi') },
      { label: 'Profil Pejabat', href: route('profil', 'pejabat') },
      { label: 'Logo BKPSDM', href: route('profil', 'logo') },
    ],
  },
  {
    judul: 'Publikasi',
    tautan: [
      { label: 'Berita', href: route('publikasi.index', 'berita') },
      { label: 'Pengumuman', href: route('publikasi.index', 'pengumuman') },
      { label: 'Statistik Pegawai', href: route('statistik-pegawai') },
      { label: 'Berita Duka', href: route('publikasi.index', 'berita-duka') },
    ],
  },
  {
    judul: 'Layanan',
    tautan: [
      { label: 'Layanan Kepegawaian', href: route('layanan') },
      { label: 'Regulasi', href: route('regulasi', 'all') },
      { label: 'Galeri Foto', href: route('galeri-foto') },
      { label: 'Hubungi Kami', href: route('hubungi-kami') },
    ],
  },
]

// Akun yang belum diisi masih tersimpan sebagai "#" di tabel pengaturan.
// Tautan seperti itu tidak ditampilkan, bukan dirender sebagai tautan mati.
const sosial = computed(() =>
  [
    { nama: 'Instagram', icon: Instagram, link: ambil('ig') },
    { nama: 'Facebook', icon: Facebook, link: ambil('fb') },
    { nama: 'Twitter', icon: Twitter, link: ambil('tt') },
    { nama: 'YouTube', icon: Youtube, link: ambil('yt') },
  ].filter((item) => item.link && item.link !== '#'),
)

const tahun = new Date().getFullYear()
</script>

<template>
  <footer class="bg-brand-900 text-brand-200">
    <div class="container pt-20 lg:pt-24">
      <div class="grid gap-12 lg:grid-cols-12 lg:gap-8">
        <!-- Kolom identitas. Kalimat deskripsi generik diganti alamat dan
             kontak: isinya sama-sama satu blok, tapi yang ini betul dicari. -->
        <div class="lg:col-span-5">
          <AppLogo />

          <ul class="mt-6 space-y-3 text-sm leading-relaxed">
            <li v-if="alamat" class="flex gap-3">
              <MapPin class="mt-0.5 size-4 shrink-0 text-brand-300" aria-hidden="true" />
              <span>{{ alamat }}</span>
            </li>
            <li v-if="noHp" class="flex gap-3">
              <Phone class="mt-0.5 size-4 shrink-0 text-brand-300" aria-hidden="true" />
              <a :href="`tel:${noHp}`" class="transition hover:text-white hover:underline">{{ noHp }}</a>
            </li>
            <li v-if="emailDinas" class="flex gap-3">
              <Mail class="mt-0.5 size-4 shrink-0 text-brand-300" aria-hidden="true" />
              <a :href="`mailto:${emailDinas}`" class="transition hover:text-white hover:underline">
                {{ emailDinas }}
              </a>
            </li>
            <li v-if="jamOperasional" class="flex gap-3">
              <Clock class="mt-0.5 size-4 shrink-0 text-brand-300" aria-hidden="true" />
              <span>{{ jamOperasional }}</span>
            </li>
          </ul>

          <ul v-if="sosial.length" class="mt-6 flex items-center gap-1">
            <li v-for="item in sosial" :key="item.nama">
              <a :href="item.link" target="_blank" rel="noopener noreferrer"
                class="grid size-11 place-items-center rounded-full text-brand-200 transition hover:bg-white/10 hover:text-white"
                :aria-label="`${item.nama} BKPSDM Kota Kendari (tab baru)`">
                <component :is="item.icon" class="size-5" aria-hidden="true" />
              </a>
            </li>
          </ul>
        </div>

        <!-- Peta situs -->
        <nav class="grid gap-10 sm:grid-cols-3 lg:col-span-7 lg:gap-8" aria-label="Peta situs">
          <div v-for="grup in kolom" :key="grup.judul">
            <h2 class="font-semibold text-white">{{ grup.judul }}</h2>
            <ul class="mt-4 space-y-3 text-sm">
              <li v-for="item in grup.tautan" :key="item.label">
                <Link :href="item.href" class="transition hover:text-white hover:underline">
                {{ item.label }}
                </Link>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <div class="mt-14 border-t border-white/10 py-6 lg:mt-16">
        <div class="flex flex-col gap-2 text-sm sm:flex-row sm:items-center sm:justify-between">
          <p>&copy; {{ tahun }} BKPSDM Kota Kendari. Seluruh hak cipta dilindungi.</p>
          <p class="text-brand-300">Dikembangkan oleh Dinas Kominfo Kota Kendari</p>
        </div>
      </div>
    </div>
  </footer>
</template>
