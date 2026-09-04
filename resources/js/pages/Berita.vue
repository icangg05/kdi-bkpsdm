<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import CardBerita from '@/components/CardBerita.vue';
import CardKategori from '@/components/CardKategori.vue';
import CardKontak from '@/components/CardKontak.vue';
import CardRecentPost from '@/components/CardRecentPost.vue';
import Pagination from '@/components/Pagination.vue';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { ArrowRight, Calendar, Search, X } from 'lucide-vue-next';
import { computed, ref } from 'vue';

const page = usePage()
const props = page.props as any

const title = props.title as string
const publikasi = props.publikasi as string
const paginator = props.data
const publikasiTerbaru = (props.publikasiTerbaru ?? []) as any[]

// Kata kunci datang dari controller supaya kotak pencarian tidak kosong lagi
// setelah hasilnya tampil, dan pengguna bisa melihat filter yang sedang aktif.
const kueri = (props.q ?? '') as string
const cari = ref(kueri)

const data = computed<any[]>(() => paginator?.data ?? [])
// Berita paling baru tampil sebagai sorotan lebar; sisanya masuk grid.
const sorotan = computed(() => (!kueri && paginator?.current_page === 1 ? data.value[0] : null))
const daftar = computed(() => (sorotan.value ? data.value.slice(1) : data.value))

const sampul = (item: any) => (item?.sampul ? `/storage/${item.sampul}` : '/img/default-publikasi.png')

function submitSearch() {
  router.get(route('publikasi.index', publikasi), cari.value ? { q: cari.value } : {}, {
    preserveScroll: true,
  })
}

function bersihkan() {
  cari.value = ''
  submitSearch()
}
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-publikasi.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">{{ title }}</h1>
      <span class="mx-auto mt-4 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>

      <Breadcrumb class="mt-5">
        <BreadcrumbList class="justify-center text-brand-100">
          <BreadcrumbItem>
            <BreadcrumbLink :href="route('beranda')" class="text-sm hover:text-white hover:underline lg:text-base">
              Beranda
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator class="text-brand-200/70" />
          <BreadcrumbItem>
            <BreadcrumbPage class="text-sm text-white lg:text-base">{{ title }}</BreadcrumbPage>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </BgOverlay>

    <section class="relative isolate overflow-hidden bg-surface-2 py-12 lg:py-16">
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>
      <div aria-hidden="true" class="absolute -right-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl"></div>
      <div aria-hidden="true" class="absolute -bottom-32 -left-24 -z-10 size-80 rounded-full bg-gold-400/20 blur-3xl">
      </div>

      <div class="container grid gap-8 lg:grid-cols-12 lg:gap-10">
        <div class="min-w-0 lg:col-span-8">
          <form @submit.prevent="submitSearch" class="flex flex-col gap-3 sm:flex-row" role="search">
            <div class="relative flex-1">
              <label for="cari-publikasi" class="sr-only">Cari {{ title.toLowerCase() }}</label>
              <Search class="pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-ink-soft"
                aria-hidden="true" />
              <input id="cari-publikasi" v-model="cari" type="search" :placeholder="`Cari ${title.toLowerCase()}...`"
                class="w-full rounded-control bg-white py-3 pl-10 pr-4 text-sm text-ink ring-1 ring-line transition placeholder:text-ink-soft focus:outline-none focus:ring-2 focus:ring-brand-500" />
            </div>
            <button type="submit"
              class="rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
              Cari
            </button>
          </form>

          <p v-if="kueri" class="mt-4 flex flex-wrap items-center gap-2 text-sm text-ink-soft">
            Hasil pencarian
            <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 font-semibold text-brand-800 ring-1 ring-line">
              {{ kueri }}
              <button type="button" @click="bersihkan" class="text-ink-soft transition hover:text-brand-700"
                aria-label="Hapus pencarian">
                <X class="size-3.5" aria-hidden="true" />
              </button>
            </span>
            <span>{{ paginator?.total ?? 0 }} publikasi ditemukan</span>
          </p>

          <!-- Sorotan: terbitan terbaru mendapat sampul lebar dan ringkasan
               lebih panjang, jadi halaman punya satu titik masuk yang jelas. -->
          <Link v-if="sorotan" :href="route('berita.show', sorotan.slug)"
            class="group relative mt-6 grid overflow-hidden rounded-card bg-white ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 active:translate-y-0 sm:grid-cols-2 motion-reduce:transition-none">
          <span aria-hidden="true"
            class="absolute left-0 top-0 z-10 h-1 w-0 bg-gold-500 transition-all duration-500 group-hover:w-full motion-reduce:transition-none"></span>

          <span class="overflow-hidden bg-brand-50">
            <img :src="sampul(sorotan)" :alt="sorotan.judul" fetchpriority="high" decoding="async"
              class="h-full min-h-56 w-full object-cover transition duration-500 group-hover:scale-105 motion-reduce:transition-none motion-reduce:group-hover:scale-100" />
          </span>

          <span class="flex flex-col justify-center p-5 lg:p-7">
            <span class="inline-flex items-center gap-1.5 text-xs text-ink-soft">
              <Calendar class="size-3.5" aria-hidden="true" />
              {{ sorotan.tanggal }}
            </span>
            <span class="mt-2 line-clamp-3 text-lg font-bold leading-snug text-ink group-hover:text-brand-700 lg:text-2xl">
              {{ sorotan.judul }}
            </span>
            <span class="mt-3 line-clamp-3 text-sm leading-relaxed text-ink-soft">{{ sorotan.isi }}</span>
            <span class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
              Baca selengkapnya
              <ArrowRight class="size-4 transition-transform group-hover:translate-x-0.5 motion-reduce:transition-none"
                aria-hidden="true" />
            </span>
          </span>
          </Link>

          <ul v-if="daftar.length" class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
            <li v-for="(item, i) in daftar" :key="item.slug"
              class="animate-in fade-in slide-in-from-bottom-3 fill-mode-both duration-500 motion-reduce:animate-none"
              :style="`animation-delay: ${Math.min(i, 8) * 60}ms`">
              <CardBerita :data="item" />
            </li>
          </ul>

          <!-- Kosong karena pencarian dan kosong karena belum ada terbitan itu
               dua keadaan berbeda, jadi jalan keluarnya juga berbeda. -->
          <div v-if="!data.length" class="rounded-card bg-white p-8 text-center ring-1 ring-line"
            :class="kueri ? 'mt-6' : 'mt-8'">
            <p class="text-base font-semibold text-ink">
              {{ kueri ? `Tidak ada hasil untuk "${kueri}"` : `Belum ada ${title.toLowerCase()}` }}
            </p>
            <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-ink-soft">
              {{ kueri
                ? 'Coba kata kunci lain, atau lihat seluruh terbitan pada kategori ini.'
                : 'Terbitan pada kategori ini belum tersedia. Silakan periksa kategori publikasi lainnya.' }}
            </p>
            <button v-if="kueri" type="button" @click="bersihkan"
              class="mt-5 rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
              Tampilkan semua
            </button>
          </div>

          <div v-if="paginator?.last_page > 1" class="mt-10">
            <Pagination :data="paginator" />
          </div>
        </div>

        <aside class="min-w-0 lg:col-span-4">
          <div class="flex flex-col gap-5 lg:sticky lg:top-24">
            <CardRecentPost v-if="publikasiTerbaru.length" :data="publikasiTerbaru" />
            <CardKategori />
            <CardKontak />
          </div>
        </aside>
      </div>
    </section>
  </AppLayout>
</template>
