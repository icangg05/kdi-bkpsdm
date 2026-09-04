<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import ModalMedia from '@/components/ModalMedia.vue';
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
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Calendar, ZoomIn } from 'lucide-vue-next';
import { computed, ref } from 'vue';

const props = usePage().props as any
const paginator = props.data
const foto = computed<any[]>(() => paginator?.data ?? [])

const terpilih = ref<any | null>(null)
const gambar = (item: any) => (item?.gambar ? `/storage/${item.gambar}` : '/img/default-publikasi.png')
</script>

<template>

  <Head title="Galeri Foto" />

  <AppLayout>
    <BgOverlay src="/img/bg-galeri.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">Galeri Foto</h1>
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
            <BreadcrumbPage class="text-sm text-white lg:text-base">Galeri Foto</BreadcrumbPage>
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

      <div class="container">
        <div class="flex flex-wrap items-center gap-3">
          <Link :href="route('galeri-foto')"
            class="rounded-full bg-brand-700 px-4 py-2 text-sm font-semibold text-white" aria-current="page">
          Foto
          </Link>
          <Link :href="route('galeri-video')"
            class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-ink-soft ring-1 ring-line transition hover:text-brand-700 hover:ring-brand-300">
          Video
          </Link>
          <span class="text-sm text-ink-soft">{{ paginator?.total ?? 0 }} foto</span>
        </div>

        <ul v-if="foto.length" class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
          <li v-for="(item, i) in foto" :key="item.id"
            class="animate-in fade-in slide-in-from-bottom-3 fill-mode-both duration-500 motion-reduce:animate-none"
            :style="`animation-delay: ${Math.min(i, 8) * 60}ms`">
            <button type="button" @click="terpilih = item"
              class="group relative block h-full w-full overflow-hidden rounded-card bg-white text-left ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 active:translate-y-0 motion-reduce:transition-none">
              <span aria-hidden="true"
                class="absolute left-0 top-0 z-10 h-1 w-0 bg-gold-500 transition-all duration-500 group-hover:w-full motion-reduce:transition-none"></span>

              <span class="relative block overflow-hidden bg-brand-50">
                <img :src="gambar(item)" :alt="item.judul" loading="lazy" decoding="async"
                  class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105 motion-reduce:transition-none motion-reduce:group-hover:scale-100" />
                <!-- Penanda perbesar selalu tampak (sekadar menguat saat hover):
                     di layar sentuh tidak ada hover, dan penanda yang cuma
                     muncul saat hover sama dengan tidak ada penanda. -->
                <span
                  class="absolute right-3 top-3 grid size-9 place-items-center rounded-full bg-brand-900/70 text-white opacity-80 transition group-hover:opacity-100 motion-reduce:transition-none">
                  <ZoomIn class="size-4" aria-hidden="true" />
                </span>
              </span>

              <span class="block p-4">
                <span class="line-clamp-2 text-sm font-semibold leading-snug text-ink group-hover:text-brand-700 lg:text-base">
                  {{ item.judul }}
                </span>
                <span class="mt-1.5 inline-flex items-center gap-1.5 text-xs text-ink-soft">
                  <Calendar class="size-3.5" aria-hidden="true" />
                  {{ item.tanggal }}
                </span>
              </span>
            </button>
          </li>
        </ul>

        <div v-else class="mt-6 rounded-card bg-white p-8 text-center ring-1 ring-line">
          <p class="text-base font-semibold text-ink">Belum ada foto</p>
          <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-ink-soft">
            Dokumentasi foto kegiatan belum diunggah. Silakan lihat galeri video.
          </p>
          <Link :href="route('galeri-video')"
            class="mt-5 inline-block rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
          Galeri Video
          </Link>
        </div>

        <div v-if="paginator?.last_page > 1" class="mt-10">
          <Pagination :data="paginator" />
        </div>
      </div>
    </section>

    <!-- Modal dari primitif Dialog: fokus terkunci, Esc menutup, scroll halaman
         ikut terkunci. Sebelumnya overlay div buatan sendiri tanpa semua itu. -->
    <ModalMedia :open="!!terpilih" @update:open="terpilih = null" :judul="terpilih?.judul"
      :tanggal="terpilih?.tanggal" :keterangan="terpilih?.deskripsi">
      <img v-if="terpilih" :src="gambar(terpilih)" :alt="terpilih.judul"
        class="mx-auto block max-h-[70dvh] w-full object-contain" />
    </ModalMedia>
  </AppLayout>
</template>
