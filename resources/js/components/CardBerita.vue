<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight, Calendar } from 'lucide-vue-next';

defineProps<{ data: any }>()
</script>

<template>
  <!-- Satu Link membungkus seluruh kartu: sampul, judul, dan ringkasan semuanya
       target yang sama, bukan tiga tautan kecil ke halaman yang sama. -->
  <Link :href="route('berita.show', data.slug)"
    class="group relative flex h-full flex-col overflow-hidden rounded-card bg-white ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 active:translate-y-0 motion-reduce:transition-none">
  <span aria-hidden="true"
    class="absolute left-0 top-0 z-10 h-1 w-0 bg-gold-500 transition-all duration-500 group-hover:w-full motion-reduce:transition-none"></span>

  <span class="overflow-hidden bg-brand-50">
    <img :src="data.sampul ? `/storage/${data.sampul}` : '/img/default-publikasi.png'" :alt="data.judul"
      loading="lazy" decoding="async"
      class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105 motion-reduce:transition-none motion-reduce:group-hover:scale-100" />
  </span>

  <span class="flex flex-1 flex-col p-4 lg:p-5">
    <span class="inline-flex items-center gap-1.5 text-xs text-ink-soft">
      <Calendar class="size-3.5" aria-hidden="true" />
      {{ data.tanggal }}
    </span>

    <span class="mt-2 line-clamp-2 text-base font-semibold leading-snug text-ink group-hover:text-brand-700 lg:text-lg">
      {{ data.judul }}
    </span>

    <span class="mt-2 line-clamp-3 text-sm leading-relaxed text-ink-soft">{{ data.isi }}</span>

    <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
      Baca selengkapnya
      <ArrowRight class="size-4 transition-transform group-hover:translate-x-0.5 motion-reduce:transition-none"
        aria-hidden="true" />
    </span>
  </span>
  </Link>
</template>
