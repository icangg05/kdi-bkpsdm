<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
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
import { Download, FileText, Search, X } from 'lucide-vue-next';
import { computed, ref } from 'vue';

const props = usePage().props as any

const paginator = props.data
const kategoriList = (props.kategoriRegulasi ?? []) as any[]
const kategori = props.kategori as string
const kueri = (props.q ?? '') as string

const cari = ref(kueri)
const regulasiList = computed<any[]>(() => paginator?.data ?? [])

const totalSemua = computed(() =>
  kategoriList.reduce((jumlah, k: any) => jumlah + Number(k.regulasi_count ?? 0), 0),
)

const kategoriAktif = computed(() => kategoriList.find((k: any) => k.slug === kategori) ?? null)
const judulHalaman = computed(() =>
  kategoriAktif.value ? `Regulasi ${kategoriAktif.value.nama}` : 'Regulasi',
)

function submitSearch() {
  router.get(route('regulasi', { kategori }), cari.value ? { q: cari.value } : {}, {
    preserveScroll: true,
  })
}

function bersihkan() {
  cari.value = ''
  submitSearch()
}
</script>

<template>

  <Head :title="judulHalaman" />

  <AppLayout>
    <BgOverlay src="/img/bg-regulasi.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">Regulasi</h1>
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
            <BreadcrumbLink v-if="kategoriAktif" :href="route('regulasi', { kategori: 'all' })"
              class="text-sm hover:text-white hover:underline lg:text-base">
              Regulasi
            </BreadcrumbLink>
            <BreadcrumbPage v-else class="text-sm text-white lg:text-base">Regulasi</BreadcrumbPage>
          </BreadcrumbItem>
          <template v-if="kategoriAktif">
            <BreadcrumbSeparator class="text-brand-200/70" />
            <BreadcrumbItem>
              <BreadcrumbPage class="line-clamp-1 max-w-[16rem] text-sm text-white lg:text-base">
                {{ kategoriAktif.nama }}
              </BreadcrumbPage>
            </BreadcrumbItem>
          </template>
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
              <label for="cari-regulasi" class="sr-only">Cari judul regulasi</label>
              <Search class="pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-ink-soft"
                aria-hidden="true" />
              <input id="cari-regulasi" v-model="cari" type="search" placeholder="Cari judul regulasi..."
                class="w-full rounded-control bg-white py-3 pl-10 pr-4 text-sm text-ink ring-1 ring-line transition placeholder:text-ink-soft focus:outline-none focus:ring-2 focus:ring-brand-500" />
            </div>
            <button type="submit"
              class="rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
              Cari
            </button>
          </form>

          <p v-if="kueri || kategoriAktif" class="mt-4 flex flex-wrap items-center gap-2 text-sm text-ink-soft">
            <span v-if="kategoriAktif"
              class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 font-semibold text-brand-800 ring-1 ring-line">
              {{ kategoriAktif.nama }}
              <Link :href="route('regulasi', { kategori: 'all' })" class="text-ink-soft transition hover:text-brand-700"
                aria-label="Hapus tapis kategori">
              <X class="size-3.5" aria-hidden="true" />
              </Link>
            </span>
            <span v-if="kueri"
              class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 font-semibold text-brand-800 ring-1 ring-line">
              {{ kueri }}
              <button type="button" @click="bersihkan" class="text-ink-soft transition hover:text-brand-700"
                aria-label="Hapus pencarian">
                <X class="size-3.5" aria-hidden="true" />
              </button>
            </span>
            <span>{{ paginator?.total ?? 0 }} regulasi ditemukan</span>
          </p>

          <ul v-if="regulasiList.length" class="mt-6 grid grid-cols-1 gap-5 xl:grid-cols-2">
            <li v-for="(regulasi, i) in regulasiList" :key="regulasi.id"
              class="animate-in fade-in slide-in-from-bottom-3 fill-mode-both duration-500 motion-reduce:animate-none"
              :style="`animation-delay: ${Math.min(i, 8) * 60}ms`">
              <article
                class="group relative flex h-full flex-col overflow-hidden rounded-card bg-white p-5 ring-1 ring-line transition hover:ring-brand-300 motion-reduce:transition-none">
                <span aria-hidden="true"
                  class="absolute left-0 top-0 h-1 w-0 bg-gold-500 transition-all duration-500 group-hover:w-full motion-reduce:transition-none"></span>

                <div class="flex items-start gap-3">
                  <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                    <FileText class="size-5" aria-hidden="true" />
                  </span>
                  <div class="min-w-0">
                    <h2 class="text-base font-semibold leading-snug text-ink">{{ regulasi.judul }}</h2>
                    <!-- Relasi kategori bisa kosong bila kategorinya dihapus admin. -->
                    <p v-if="regulasi.kategori_regulasi?.nama" class="mt-1.5 text-xs font-semibold text-brand-700">
                      {{ regulasi.kategori_regulasi.nama }}
                    </p>
                  </div>
                </div>

                <p v-if="regulasi.deskripsi" class="mt-3 line-clamp-3 text-sm leading-relaxed text-ink-soft">
                  {{ regulasi.deskripsi }}
                </p>

                <div class="mt-auto flex flex-wrap items-center justify-between gap-3 pt-5">
                  <a :href="route('regulasi.download', regulasi.id)"
                    class="inline-flex items-center gap-2 rounded-control bg-brand-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
                    <Download class="size-4" aria-hidden="true" />
                    Unduh berkas
                    <span class="sr-only">{{ regulasi.judul }}</span>
                  </a>
                  <span class="text-xs text-ink-soft">Diunduh {{ regulasi.total_unduh ?? 0 }} kali</span>
                </div>
              </article>
            </li>
          </ul>

          <div v-else class="mt-6 rounded-card bg-white p-8 text-center ring-1 ring-line">
            <p class="text-base font-semibold text-ink">
              {{ kueri ? `Tidak ada hasil untuk "${kueri}"` : 'Belum ada regulasi pada kategori ini' }}
            </p>
            <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-ink-soft">
              {{ kueri
                ? 'Coba kata kunci lain, atau telusuri lewat daftar kategori di samping.'
                : 'Silakan pilih kategori lain pada daftar kategori.' }}
            </p>
            <Link :href="route('regulasi', { kategori: 'all' })"
              class="mt-5 inline-block rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
            Lihat semua regulasi
            </Link>
          </div>

          <div v-if="paginator?.last_page > 1" class="mt-10">
            <Pagination :data="paginator" />
          </div>
        </div>

        <aside class="min-w-0 lg:col-span-4">
          <!-- Kategori dulunya `<li @click>`: tidak bisa di-tab, tidak bisa
               dibuka di tab baru, dan tidak dibacakan sebagai tautan. -->
          <nav class="rounded-card bg-white p-5 ring-1 ring-line lg:sticky lg:top-24" aria-label="Kategori regulasi">
            <h2 class="flex items-center gap-2.5 text-base font-semibold text-ink">
              <span class="h-4 w-1 rounded-full bg-gold-500" aria-hidden="true"></span>
              Kategori Regulasi
            </h2>

            <!-- "Semua Kategori" dipatok di luar area gulir supaya jalan
                 keluar dari tapis selalu terlihat. -->
            <Link :href="route('regulasi', { kategori: 'all' })"
              class="mt-3 flex items-center justify-between gap-3 rounded-control px-3 py-2.5 text-sm transition"
              :class="kategori === 'all'
                ? 'bg-brand-50 font-semibold text-brand-800'
                : 'text-ink-soft hover:bg-surface-2 hover:text-brand-700'"
              :aria-current="kategori === 'all' ? 'page' : undefined">
            <span>Semua Kategori</span>
            <span class="shrink-0 rounded-full bg-surface-2 px-2 py-0.5 text-xs font-semibold text-ink-soft">
              {{ totalSemua }}
            </span>
            </Link>

            <!-- Dua belas kategori terlalu panjang untuk kolom lengket, jadi
                 daftarnya dibatasi tinggi dan digulir sendiri. -->
            <ul
              class="mt-1 flex max-h-[19rem] flex-col gap-1 overflow-y-auto pr-1 [scrollbar-color:var(--color-brand-300)_transparent] [scrollbar-width:thin]">
              <li v-for="item in kategoriList" :key="item.slug">
                <Link :href="route('regulasi', { kategori: item.slug })"
                  class="flex items-center justify-between gap-3 rounded-control px-3 py-2.5 text-sm transition"
                  :class="item.slug === kategori
                    ? 'bg-brand-50 font-semibold text-brand-800'
                    : 'text-ink-soft hover:bg-surface-2 hover:text-brand-700'"
                  :aria-current="item.slug === kategori ? 'page' : undefined">
                <span>{{ item.nama }}</span>
                <span class="shrink-0 rounded-full px-2 py-0.5 text-xs font-semibold"
                  :class="item.slug === kategori ? 'bg-white text-brand-700' : 'bg-surface-2 text-ink-soft'">
                  {{ item.regulasi_count }}
                </span>
                </Link>
              </li>
            </ul>
          </nav>
        </aside>
      </div>
    </section>
  </AppLayout>
</template>
