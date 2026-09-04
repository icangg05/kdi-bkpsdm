<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { ChevronRight } from 'lucide-vue-next';
import { computed } from 'vue';

const page = usePage()

const kategori = [
  { label: 'Berita', link: route('publikasi.index', 'berita') },
  { label: 'Pengumuman', link: route('publikasi.index', 'pengumuman') },
  { label: 'Statistik Pegawai', link: route('statistik-pegawai') },
  { label: 'Ucapan Selamat', link: route('publikasi.index', 'ucapan-selamat') },
  { label: 'Berita Duka', link: route('publikasi.index', 'berita-duka') },
]

// Penanda halaman aktif dibaca dari URL, bukan dari prop: komponen ini juga
// dipakai di halaman detail berita yang tidak mengirim prop kategori.
const aktif = (link: string) => {
  try {
    return new URL(link, window.location.origin).pathname === page.url.split('?')[0]
  } catch {
    return false
  }
}

const daftar = computed(() => kategori.map((item) => ({ ...item, aktif: aktif(item.link) })))
</script>

<template>
  <nav class="rounded-card bg-white p-5 ring-1 ring-line" aria-label="Kategori publikasi">
    <h2 class="flex items-center gap-2.5 text-base font-semibold text-ink">
      <span class="h-4 w-1 rounded-full bg-gold-500" aria-hidden="true"></span>
      Publikasi
    </h2>

    <ul class="mt-3 flex flex-col gap-1">
      <li v-for="item in daftar" :key="item.label">
        <Link :href="item.link" class="group flex items-center gap-2 rounded-control px-3 py-2.5 text-sm transition"
          :class="item.aktif
            ? 'bg-brand-50 font-semibold text-brand-800'
            : 'text-ink-soft hover:bg-surface-2 hover:text-brand-700'"
          :aria-current="item.aktif ? 'page' : undefined">
        <ChevronRight class="size-4 shrink-0 transition-transform duration-300 group-hover:translate-x-0.5 motion-reduce:transition-none"
          :class="item.aktif ? 'text-gold-600' : 'text-brand-300'" aria-hidden="true" />
        {{ item.label }}
        </Link>
      </li>
    </ul>
  </nav>
</template>
