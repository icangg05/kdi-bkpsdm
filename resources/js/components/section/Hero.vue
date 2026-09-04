<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3'
import { usePreferredReducedMotion } from '@vueuse/core'
import { ChevronLeft, ChevronRight, Pause, Play } from 'lucide-vue-next'
import { computed, onBeforeUnmount, ref, watchEffect } from 'vue'

const props = usePage().props

const gambarSlider = computed<string[]>(() => (props.slider as string[] | undefined) ?? [])
const beritaHero = computed<any[]>(() => (props.beritaHero as any[] | undefined) ?? [])

// Jumlah gambar slider ditentukan admin. Jangan akses slider[1] atau slider[2]
// langsung: kalau yang diunggah cuma satu, indeksnya kosong dan slide gagal.
const gambarKe = (i: number) =>
  gambarSlider.value[i] ?? gambarSlider.value[gambarSlider.value.length - 1] ?? null

const slides = computed(() => {
  const daftar: { tipe: 'instansi' | 'pejabat' | 'berita'; gambar: string | null }[] = [
    { tipe: 'instansi', gambar: gambarKe(0) },
    { tipe: 'pejabat', gambar: gambarKe(1) },
  ]

  if (beritaHero.value.length) {
    daftar.push({ tipe: 'berita', gambar: beritaHero.value[0].sampul ?? gambarKe(2) })
  }

  return daftar
})

// Sudah diurut terbaru lebih dulu oleh BerandaController (orderBy tanggal desc).
const beritaUtama = computed(() => beritaHero.value[0] ?? null)
const beritaLain = computed(() => beritaHero.value.slice(1, 4))

const index = ref(0)
const berjalan = ref(true)
const reduced = usePreferredReducedMotion()

let timer: ReturnType<typeof setInterval> | undefined

function ke(i: number) {
  const n = slides.value.length
  if (n > 0) index.value = (i + n) % n
}

watchEffect((onCleanup) => {
  clearInterval(timer)
  if (reduced.value === 'reduce' || !berjalan.value || slides.value.length < 2) return
  timer = setInterval(() => ke(index.value + 1), 8000)
  onCleanup(() => clearInterval(timer))
})

onBeforeUnmount(() => clearInterval(timer))

const judulSlide: Record<string, string> = {
  instansi: 'Profil instansi',
  pejabat: 'Pejabat BKPSDM',
  berita: 'Berita terbaru',
}

</script>

<template>
  <section class="relative isolate grid min-h-[38rem] overflow-hidden bg-brand-900 lg:min-h-[44rem]"
    aria-roledescription="carousel" aria-label="Sorotan beranda">
    <!-- Lapisan gambar. Gambar slider dekoratif: maknanya dibawa teks di atasnya
         dan tabel Slider tidak punya kolom keterangan. -->
    <div class="absolute inset-0 -z-10">
      <template v-for="(slide, i) in slides" :key="`bg-${i}`">
        <img v-if="slide.gambar" :src="`/storage/${slide.gambar}`" alt="" aria-hidden="true"
          :fetchpriority="i === 0 ? 'high' : 'low'" :loading="i === 0 ? 'eager' : 'lazy'" decoding="async"
          class="absolute inset-0 h-full w-full object-cover transition-opacity duration-700"
          :class="i === index ? 'opacity-100' : 'opacity-0'" />
      </template>
      <div class="absolute inset-0 bg-gradient-to-r from-brand-900 via-brand-900/85 to-brand-900/45"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-brand-900 via-transparent to-brand-900/70"></div>
      <div aria-hidden="true"
        class="absolute -left-20 top-1/2 size-[34rem] -translate-y-1/2 rounded-full bg-brand-500/20 blur-3xl"></div>
    </div>

    <!-- Semua panel ditumpuk di sel grid yang sama supaya tinggi seksi tidak
         melompat tiap pergantian. Panel non-aktif diberi `inert`: tidak bisa
         di-tab dan tidak dibacakan pembaca layar. -->
    <div v-for="(slide, i) in slides" :key="slide.tipe"
      class="container col-start-1 row-start-1 w-full self-center pb-28 pt-32 transition-opacity duration-500 lg:pt-36"
      :class="i === index ? 'opacity-100' : 'pointer-events-none opacity-0'" :inert="i !== index"
      role="group" aria-roledescription="slide" :aria-label="`${judulSlide[slide.tipe]} (${i + 1} dari ${slides.length})`">

      <!-- Hiasan kecil di atas teks slide. Dekoratif, tidak dibacakan pembaca layar. -->
      <span class="mb-6 flex items-center gap-2" aria-hidden="true">
        <span class="h-px w-12 bg-gold-400"></span>
        <span class="size-1.5 rotate-45 bg-gold-400"></span>
        <span class="h-px w-6 bg-gold-400/50"></span>
        <span class="size-1 rounded-full bg-gold-400/50"></span>
      </span>

      <!-- 1. Identitas instansi -->
      <div v-if="slide.tipe === 'instansi'" class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-400">
          Pemerintah Kota Kendari
        </p>
        <h1 class="mt-4 text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">
          Badan Kepegawaian dan Pengembangan Sumber Daya Manusia
        </h1>
        <p class="mt-5 max-w-xl text-sm leading-relaxed text-brand-100 lg:text-base">
          Informasi kepegawaian, regulasi, dan layanan ASN Kota Kendari dalam satu pintu.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
          <Link :href="route('layanan')"
            class="rounded-control bg-white px-6 py-3 text-sm font-semibold text-brand-800 transition hover:bg-brand-50 active:translate-y-px lg:text-base">
          Layanan Kepegawaian
          </Link>
          <Link :href="route('profil', 'sejarah')"
            class="rounded-control border border-white/50 px-6 py-3 text-sm font-semibold text-white transition hover:border-white hover:bg-white/10 active:translate-y-px lg:text-base">
          Profil Instansi
          </Link>
        </div>
      </div>

      <!-- 2. Pejabat -->
      <div v-else-if="slide.tipe === 'pejabat'" class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-400">Profil</p>
        <h2 class="mt-4 text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">
          Pejabat BKPSDM Kota Kendari
        </h2>
        <p class="mt-5 max-w-xl text-sm leading-relaxed text-brand-100 lg:text-base">
          Jajaran pimpinan, pejabat struktural, dan pelaksana yang menangani urusan kepegawaian
          Kota Kendari.
        </p>
        <div class="mt-8">
          <Link :href="route('profil', 'pejabat')"
            class="inline-block rounded-control bg-white px-6 py-3 text-sm font-semibold text-brand-800 transition hover:bg-brand-50 active:translate-y-px lg:text-base">
          Lihat Pejabat
          </Link>
        </div>
      </div>

      <!-- 3. Berita terbaru + tiga berita berikutnya -->
      <div v-else-if="beritaUtama">
        <div class="max-w-3xl">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-400">
            {{ beritaUtama.kategori }}
          </p>
          <h2 class="mt-4 line-clamp-2 text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">
            {{ beritaUtama.judul }}
          </h2>
          <p class="mt-3 text-sm text-brand-200">{{ beritaUtama.tanggal }}</p>
          <p class="mt-4 line-clamp-2 max-w-xl text-sm leading-relaxed text-brand-100 lg:text-base">
            {{ beritaUtama.isi }}
          </p>
          <div class="mt-7">
            <Link :href="route('berita.show', beritaUtama.slug)"
              class="inline-block rounded-control bg-white px-6 py-3 text-sm font-semibold text-brand-800 transition hover:bg-brand-50 active:translate-y-px lg:text-base">
            Baca Selengkapnya
            </Link>
          </div>
        </div>

        <ul v-if="beritaLain.length" class="mt-8 hidden gap-4 sm:grid sm:grid-cols-3">
          <li v-for="item in beritaLain" :key="item.id">
            <Link :href="route('berita.show', item.slug)"
              class="block h-full rounded-card bg-brand-900/50 p-4 ring-1 ring-white/15 transition hover:bg-brand-900/70 hover:ring-white/40">
            <span class="block text-xs uppercase tracking-wide text-gold-400">{{ item.kategori }}</span>
            <span class="mt-2 line-clamp-2 text-sm font-semibold leading-snug text-white">
              {{ item.judul }}
            </span>
            <span class="mt-2 block text-xs text-brand-200">{{ item.tanggal }}</span>
            </Link>
          </li>
        </ul>
      </div>
    </div>

    <!-- Kendali slider: jeda, mundur, maju, dan titik langsung. -->
    <div v-if="slides.length > 1" class="container col-start-1 row-start-1 flex w-full items-center gap-2 self-end pb-10">
      <button type="button" @click="berjalan = !berjalan"
        class="grid size-11 place-items-center rounded-full border border-white/30 text-white transition hover:bg-white/10"
        :aria-label="berjalan ? 'Jeda pergantian slide' : 'Jalankan pergantian slide'">
        <component :is="berjalan ? Pause : Play" class="size-4" />
      </button>
      <button type="button" @click="ke(index - 1)"
        class="grid size-11 place-items-center rounded-full border border-white/30 text-white transition hover:bg-white/10"
        aria-label="Slide sebelumnya">
        <ChevronLeft class="size-4" />
      </button>
      <button type="button" @click="ke(index + 1)"
        class="grid size-11 place-items-center rounded-full border border-white/30 text-white transition hover:bg-white/10"
        aria-label="Slide berikutnya">
        <ChevronRight class="size-4" />
      </button>

      <div class="ml-3 flex items-center gap-2">
        <button v-for="(slide, i) in slides" :key="`dot-${slide.tipe}`" type="button" @click="ke(i)"
          class="grid h-11 w-5 place-items-center" :aria-label="judulSlide[slide.tipe]" :aria-current="i === index">
          <span class="h-1.5 w-full rounded-full transition-colors"
            :class="i === index ? 'bg-gold-400' : 'bg-white/40'"></span>
        </button>
      </div>
    </div>
  </section>
</template>
