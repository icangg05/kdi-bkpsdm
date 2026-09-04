<script setup lang="ts">
import { cn } from '@/lib/utils'
import { Link } from '@inertiajs/vue3'
import { Inbox, MoveRight } from 'lucide-vue-next'
import { computed, ref } from 'vue'

const props = defineProps<{
  berita: any[]
  pengumuman: any[]
  ucapanSelamat: any[]
  beritaDuka: any[]
}>()

const kategori = [
  { nama: 'Berita', slug: 'berita', data: () => props.berita },
  { nama: 'Pengumuman', slug: 'pengumuman', data: () => props.pengumuman },
  { nama: 'Ucapan Selamat', slug: 'ucapan-selamat', data: () => props.ucapanSelamat },
  { nama: 'Berita Duka', slug: 'berita-duka', data: () => props.beritaDuka },
]

const aktif = ref(kategori[0])
const daftar = computed<any[]>(() => aktif.value.data() ?? [])
const utama = computed(() => daftar.value[0] ?? null)
const lainnya = computed(() => daftar.value.slice(1, 4))

// Animasi masuk baru dipasang setelah pengguna benar-benar berpindah tab. Saat
// halaman pertama dimuat seksi ini masih di bawah lipatan, jadi tidak ada
// pergantian yang perlu ditandai.
const pernahGanti = ref(false)

function pilih(item: (typeof kategori)[number]) {
  if (item.slug === aktif.value.slug) return
  pernahGanti.value = true
  aktif.value = item
}

const sampul = (item: any) =>
  item?.sampul ? `/storage/${item.sampul}` : '/img/default-publikasi.png'

// Kartu berlatar foto: satu <Link> membungkus seluruh kartu, bukan div dengan
// @click, supaya tetap bisa di-tab dan dibuka dengan Enter.
// `isolate` wajib: tanpa stacking context sendiri, gambar dan scrim ber-z-10
// negatif jatuh ke belakang latar seksi dan kartunya jadi bidang polos.
const kartu =
  'group relative isolate flex size-full flex-col justify-end overflow-hidden rounded-card bg-brand-900 p-5 text-white transition-transform duration-300 hover:scale-[0.985]'
</script>

<template>
  <!-- overflow-hidden wajib: label latar raksasa menjorok ke luar container dan
       tanpa ini memicu scroll horizontal. -->
  <section class="relative isolate overflow-hidden bg-surface-2 py-16 lg:py-24">
    <span aria-hidden="true"
      class="pointer-events-none absolute -left-[8%] -top-6 -z-10 select-none text-[clamp(8rem,22vw,21rem)] font-extrabold leading-none text-brand-900/[0.04]">
      PUBLIKASI
    </span>

    <div class="container">
      <h2 class="text-center text-4xl font-semibold leading-[1.4] text-ink md:text-5xl lg:text-6xl">
        Publikasi
      </h2>
      <p class="mx-auto mt-3 max-w-[46rem] text-center text-base leading-relaxed text-ink-soft md:text-lg">
        Berita kegiatan, pengumuman resmi, dan kabar kepegawaian di lingkungan Pemerintah Kota
        Kendari.
      </p>

      <div class="mt-8 flex flex-wrap justify-center gap-2" role="group" aria-label="Pilih kategori publikasi">
        <button v-for="item in kategori" :key="item.slug" type="button" @click="pilih(item)"
          :aria-pressed="aktif.slug === item.slug" :class="cn(
            'rounded-full px-4 py-2.5 text-sm font-medium transition',
            aktif.slug === item.slug
              ? 'bg-brand-700 text-white'
              : 'bg-white text-ink-soft ring-1 ring-line hover:bg-brand-50 hover:text-brand-800',
          )">
          {{ item.nama }}
        </button>
      </div>

      <!-- Isi berganti karena pengguna menekan chip. Kartu baru naik berurutan
           supaya pergantiannya terbaca sebagai susunan baru, bukan kedipan.
           Tanpa <Transition> pembungkus: mode out-in melepas blok lama lebih
           dulu, tinggi seksi runtuh sesaat, dan konten di bawahnya melompat.
           Penggantian berkunci begini terjadi dalam satu tick, tanpa celah. -->
      <div v-if="utama" :key="aktif.slug" class="mt-10 grid gap-5 lg:h-[620px] lg:grid-cols-[1.6fr_1fr]">
        <!-- Sorotan -->
        <Link :href="route('berita.show', utama.slug)" :style="{ '--i': 0 }"
          :class="cn(kartu, pernahGanti && 'kartu-masuk', 'h-[360px] lg:h-auto')">
        <img :src="sampul(utama)" :alt="utama.judul" loading="lazy" decoding="async"
          class="absolute inset-0 -z-10 size-full object-cover transition-transform duration-500 group-hover:scale-105" />
        <span
          class="absolute inset-x-0 bottom-0 -z-10 h-3/4 bg-gradient-to-t from-brand-900 via-brand-900/85 to-transparent transition-all duration-500 group-hover:h-full"></span>

        <article class="relative flex items-end gap-4">
          <div class="flex flex-1 flex-col gap-3">
            <h3 class="text-2xl font-semibold leading-tight md:text-3xl lg:text-4xl">
              {{ utama.judul }}
            </h3>
            <span class="w-fit rounded-md bg-white/25 px-2 py-0.5 text-sm text-white backdrop-blur-md">
              {{ utama.tanggal }}
            </span>
          </div>
          <MoveRight class="size-9 shrink-0 transition-transform duration-300 group-hover:translate-x-2"
            :stroke-width="1.25" aria-hidden="true" />
        </article>
        </Link>

        <!-- Sisanya, dibagi rata tinggi kolomnya berapa pun jumlahnya -->
        <div v-if="lainnya.length" class="grid auto-rows-fr gap-5">
          <Link v-for="(item, i) in lainnya" :key="item.id" :href="route('berita.show', item.slug)"
            :style="{ '--i': i + 1 }" :class="cn(kartu, pernahGanti && 'kartu-masuk', 'h-[240px] lg:h-auto')">
          <img :src="sampul(item)" :alt="item.judul" loading="lazy" decoding="async"
            class="absolute inset-0 -z-10 size-full object-cover transition-transform duration-500 group-hover:scale-105" />
          <span
            class="absolute inset-x-0 bottom-0 -z-10 h-3/4 bg-gradient-to-t from-brand-900 via-brand-900/85 to-transparent transition-all duration-500 group-hover:h-full"></span>

          <article class="relative flex items-end gap-3">
            <div class="flex flex-1 flex-col gap-2">
              <h3 class="line-clamp-2 text-lg font-semibold leading-snug md:text-xl">
                {{ item.judul }}
              </h3>
              <span class="w-fit rounded-md bg-white/25 px-2 py-0.5 text-xs text-white backdrop-blur-md">
                {{ item.tanggal }}
              </span>
            </div>
            <MoveRight class="size-6 shrink-0 transition-transform duration-300 group-hover:translate-x-2"
              :stroke-width="1.25" aria-hidden="true" />
          </article>
          </Link>
        </div>
      </div>

      <!-- Kategori boleh kosong: admin belum tentu mengisi keempatnya. -->
      <div v-else class="mt-10 rounded-card border border-dashed border-line bg-white px-6 py-16 text-center">
        <Inbox class="mx-auto size-8 text-brand-300" aria-hidden="true" />
        <p class="mt-3 text-sm font-medium text-ink">Belum ada {{ aktif.nama.toLowerCase() }}</p>
        <p class="mt-1 text-sm text-ink-soft">
          Konten kategori ini akan tampil di sini setelah dipublikasikan.
        </p>
      </div>

      <div class="mt-10 text-center">
        <Link :href="route('publikasi.index', aktif.slug)"
          class="group inline-flex items-center gap-2 rounded-control text-sm font-semibold text-brand-700 hover:text-brand-800">
        Lihat semua {{ aktif.nama }}
        <MoveRight class="size-4 transition-transform group-hover:translate-x-1" aria-hidden="true" />
        </Link>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Yang dianimasikan kartunya, berurutan dari sorotan ke bawah.
   `backwards`, bukan `both`: `both` mengunci transform setelah animasi selesai
   dan membuat hover:scale pada kartu tidak lagi berpengaruh. */
.kartu-masuk {
  animation: kartu-naik 0.45s cubic-bezier(0.22, 0.9, 0.3, 1) backwards;
  animation-delay: calc(var(--i, 0) * 70ms);
}

@keyframes kartu-naik {
  from {
    opacity: 0;
    transform: translateY(14px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (prefers-reduced-motion: reduce) {
  .kartu-masuk {
    animation: none;
  }
}
</style>
