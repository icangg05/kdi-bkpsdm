<script setup lang="ts">
import ModalMedia from '@/components/ModalMedia.vue'
import { getYoutubeEmbedUrl, getYoutubeThumbnail } from '@/lib/utils'
import { Link } from '@inertiajs/vue3'
import { ArrowRight, CalendarDays, Play } from 'lucide-vue-next'
import { ref } from 'vue'

defineProps<{ data: any[] }>()

const terpilih = ref<any | null>(null)

// Kaca gelap yang sama dengan Informasi Layanan: translusen, garis tepi terang
// di dalam, dan cadangan bidang padat untuk prefers-reduced-transparency.
const kartu =
  'kartu-kaca group flex w-full flex-col rounded-card bg-white/10 p-5 text-left ring-1 ring-white/15 backdrop-blur-md transition duration-300 hover:bg-white/[0.16] hover:ring-white/30'
</script>

<template>
  <section class="relative isolate overflow-hidden py-16 lg:py-24">
    <img src="/img/bg-layanan.jpg" alt="" aria-hidden="true" loading="lazy" decoding="async"
      class="absolute inset-0 -z-10 size-full object-cover" />
    <div class="absolute inset-0 -z-10 bg-brand-900/80"></div>

    <div class="container">
      <div class="mx-auto max-w-3xl text-center">
        <h2 class="text-3xl font-bold leading-tight tracking-tight text-white md:text-4xl lg:text-5xl">
          Video Kegiatan
        </h2>
        <p class="mx-auto mt-5 max-w-xl text-base leading-relaxed text-brand-200 lg:text-lg">
          Rekaman kegiatan dan sosialisasi layanan kepegawaian BKPSDM Kota Kendari.
        </p>
      </div>

      <!-- Kolom masoneri: tinggi kartu mengikuti panjang keterangannya sendiri,
           seperti referensi, tanpa memotong teks agar barisnya rata. -->
      <ul class="mt-12 gap-5 sm:columns-2 lg:columns-3">
        <li v-for="video in data" :key="video.id" class="mb-5 break-inside-avoid">
          <button type="button" @click="terpilih = video" :class="kartu">
            <span class="font-semibold leading-snug text-white">
              {{ video.judul }}
            </span>

            <span v-if="video.deskripsi" class="mt-2 line-clamp-3 text-sm leading-relaxed text-brand-200">
              {{ video.deskripsi }}
            </span>

            <span class="relative mt-4 block overflow-hidden rounded-control">
              <img :src="getYoutubeThumbnail(video.link)" :alt="`Sampul video ${video.judul}`" loading="lazy"
                decoding="async" class="aspect-video w-full bg-brand-800 object-cover" />
              <span class="absolute inset-0 grid place-items-center bg-brand-900/15 transition group-hover:bg-brand-900/35">
                <span
                  class="grid size-16 place-items-center rounded-full bg-brand-900/45 text-white ring-1 ring-white/70 backdrop-blur-sm transition duration-300 group-hover:scale-105 group-hover:bg-brand-900/65">
                  <Play class="size-7 translate-x-0.5 fill-current" aria-hidden="true" />
                </span>
              </span>
            </span>

            <span class="mt-5 flex items-center gap-2 border-t border-white/15 pt-4 text-xs text-brand-200">
              <CalendarDays class="size-4 shrink-0" aria-hidden="true" />
              {{ video.tanggal }}
              <span class="sr-only">— buka pemutar video</span>
            </span>
          </button>
        </li>
      </ul>

      <div class="mt-6 flex justify-center">
        <Link :href="route('galeri-video')"
          class="group inline-flex items-center gap-2 rounded-control bg-white/10 px-5 py-3 text-sm font-semibold text-white ring-1 ring-white/20 backdrop-blur-md transition hover:bg-white/20 hover:ring-white/40">
        Lihat semua video
        <ArrowRight class="size-4 transition-transform group-hover:translate-x-0.5" aria-hidden="true" />
        </Link>
      </div>
    </div>

    <!-- iframe hanya dibuat saat modal terbuka, jadi tidak ada enam pemutar
         YouTube yang ikut dimuat bersama halaman. -->
    <ModalMedia :open="!!terpilih" @update:open="terpilih = null" :judul="terpilih?.judul"
      :tanggal="terpilih?.tanggal" :keterangan="terpilih?.deskripsi">
      <iframe v-if="terpilih" class="aspect-video w-full" :src="getYoutubeEmbedUrl(terpilih.link)"
        :title="terpilih.judul" allow="accelerometer; autoplay; encrypted-media; picture-in-picture"
        allowfullscreen></iframe>
    </ModalMedia>
  </section>
</template>

<style scoped>
.kartu-kaca {
  box-shadow:
    inset 0 1px 0 rgb(255 255 255 / 0.18),
    0 10px 30px rgb(20 33 61 / 0.35);
}

@media (prefers-reduced-transparency: reduce) {
  .kartu-kaca {
    background-color: var(--color-brand-800);
    backdrop-filter: none;
    box-shadow: 0 10px 30px rgb(20 33 61 / 0.35);
  }
}
</style>
