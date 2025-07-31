<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ChevronRight } from 'lucide-vue-next';

const categories = [
  {
    label: 'Berita',
    link: route('publikasi.index', 'berita'),
  },
  {
    label: 'Pengumuman',
    link: route('publikasi.index', 'pengumuman'),
  },
  {
    label: 'Statistik Pegawai',
    link: route('statistik-pegawai'),
  },
  {
    label: 'Ucapan Selamat',
    link: route('publikasi.index', 'ucapan-selamat'),
  },
  {
    label: 'Berita Duka',
    link: route('publikasi.index', 'berita-duka'),
  },
]
</script>

<template>
  <div class="border border-gray-200 p-8 pb-7 rounded">
    <h4 class="text-lg font-semibold border-b pb-2 mb-3">Publikasi</h4>
    <ul class="space-y-2 text-sm">
      <li v-for="(item, i) in categories" :key="i">
        <Link :href="item.link" class="group flex items-center gap-2 text-gray-700 hover:text-sky-600">
          <ChevronRight class="text-sky-600 size-5 group-hover:rotate-90 transition ease-in-out duration-500" />
          {{ item.label }}
        </Link>
      </li>
    </ul>
  </div>
</template>
