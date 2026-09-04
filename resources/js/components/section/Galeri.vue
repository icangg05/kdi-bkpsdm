<script setup lang="ts">
import ModalMedia from '@/components/ModalMedia.vue'
import { Link } from '@inertiajs/vue3'
import { ArrowRight, Images } from 'lucide-vue-next'
import { ref } from 'vue'

defineProps<{ data: any[] }>()

const terpilih = ref<any | null>(null)
const gambar = (item: any) => (item?.gambar ? `/storage/${item.gambar}` : '/img/default-publikasi.png')
</script>

<template>
  <section class="relative isolate overflow-hidden bg-surface-2 py-16 lg:py-24">
    <!-- Hiasan latar: raster titik halus + dua noda warna merek/emas, semua dekoratif. -->
    <div aria-hidden="true"
      class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
    </div>
    <div aria-hidden="true"
      class="absolute -left-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl"></div>
    <div aria-hidden="true"
      class="absolute -bottom-32 -right-20 -z-10 size-80 rounded-full bg-gold-400/20 blur-3xl"></div>

    <div class="container">
      <div class="mx-auto max-w-2xl text-center">
        <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs font-semibold text-brand-700 ring-1 ring-line">
          <Images class="size-3.5" aria-hidden="true" />
          Dokumentasi
        </span>
        <h2 class="mt-4 text-2xl font-bold text-ink lg:text-3xl">Galeri Kegiatan</h2>
        <span class="mx-auto mt-3 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>
        <p class="mt-3 text-sm text-ink-soft lg:text-base">
          Rekam jejak kegiatan BKPSDM Kota Kendari.
        </p>
      </div>

      <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <button v-for="item in data" :key="item.id" type="button" @click="terpilih = item"
          class="group relative block overflow-hidden rounded-card bg-white text-left shadow-sm ring-1 ring-line transition hover:-translate-y-1 hover:shadow-lg focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 motion-reduce:transition-none motion-reduce:hover:translate-y-0">
          <img :src="gambar(item)" :alt="item.judul" loading="lazy" decoding="async"
            class="aspect-[4/3] w-full bg-brand-50 object-cover transition duration-500 group-hover:scale-105 motion-reduce:transition-none motion-reduce:group-hover:scale-100" />

          <!-- Judul dibaca di atas gelapan bawah, bukan di baris terpisah, agar foto tetap dominan. -->
          <span class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-brand-900/90 via-brand-900/45 to-transparent p-4 pt-10">
            <span class="line-clamp-1 text-sm font-semibold text-white">{{ item.judul }}</span>
            <span class="mt-0.5 block text-xs text-brand-100">{{ item.tanggal }}</span>
          </span>

          <span aria-hidden="true"
            class="absolute left-0 top-0 h-1 w-0 bg-gold-500 transition-all duration-500 group-hover:w-full motion-reduce:transition-none"></span>
        </button>
      </div>

      <div class="mt-10 text-center">
        <Link :href="route('galeri-foto')"
          class="group inline-flex items-center gap-2 rounded-control bg-brand-700 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500">
        Semua foto
        <ArrowRight class="size-4 transition-transform group-hover:translate-x-0.5 motion-reduce:transition-none" aria-hidden="true" />
        </Link>
      </div>
    </div>

    <ModalMedia :open="!!terpilih" @update:open="terpilih = null" :judul="terpilih?.judul"
      :tanggal="terpilih?.tanggal" :keterangan="terpilih?.deskripsi">
      <img v-if="terpilih" :src="gambar(terpilih)" :alt="terpilih.judul"
        class="mx-auto block max-h-[60dvh] w-full object-contain" />
    </ModalMedia>
  </section>
</template>
