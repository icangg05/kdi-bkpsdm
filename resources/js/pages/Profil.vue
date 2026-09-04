<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import ModalMedia from '@/components/ModalMedia.vue';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import AppLayout from '@/layouts/AppLayout.vue';
import { convertOembed, formatTanggalIndo, getOriginalFilename } from '@/lib/utils';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Download, Maximize2 } from 'lucide-vue-next';
import { computed, ref } from 'vue';

const page = usePage()
const title = page.props.title as string
const slug = page.props.slug as string
const data = page.props.data as any

// Ketiga halaman profil memakai satu tabel yang sama (Halaman) dan isinya
// ditentukan admin: 'logo' punya gambar + isi, 'sejarah' punya isi + lampiran,
// 'struktur-organisasi' cuma gambar. Jadi tata letaknya satu, bercabang pada
// ada-tidaknya bagian, bukan bercabang per slug seperti sebelumnya.
const gambar = computed(() => (data?.gambar ? `/storage/${data.gambar}` : null))
const lampiran = computed(() => (data?.lampiran ? `/storage/${data.lampiran}` : null))
const isi = computed(() => (data?.isi ? convertOembed(data.isi) : null))
const diperbarui = computed(() => (data?.updated_at ? formatTanggalIndo(data.updated_at) : null))

const halamanProfil = [
  { label: 'Logo', slug: 'logo' },
  { label: 'Sejarah', slug: 'sejarah' },
  { label: 'Struktur Organisasi', slug: 'struktur-organisasi' },
  { label: 'Profil Pejabat', slug: 'pejabat' },
]

const modalTerbuka = ref(false)
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-profil.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] tracking-normal text-white sm:text-3xl lg:text-[2.6rem]">
        {{ title }}
      </h1>
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
      <!-- Motif yang sama dengan seksi galeri di beranda: raster titik halus
           plus dua noda warna merek dan emas. Semuanya dekoratif. -->
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>
      <div aria-hidden="true" class="absolute -right-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl"></div>
      <div aria-hidden="true" class="absolute -bottom-32 -left-24 -z-10 size-80 rounded-full bg-gold-400/20 blur-3xl"></div>

      <div class="container grid gap-8 lg:grid-cols-12 lg:gap-10">
        <article class="min-w-0 lg:col-span-8">
          <!-- Gambar dokumen (arti logo, bagan struktur). Bagan organisasi lebar
               dan tidak terbaca di layar sempit, jadi gambarnya bisa dibuka
               besar lewat modal dan ada tautan ke berkas aslinya. -->
          <figure v-if="gambar" class="overflow-hidden rounded-card bg-white ring-1 ring-line">
            <button type="button" @click="modalTerbuka = true"
              class="block w-full cursor-zoom-in bg-brand-50 p-4 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 lg:p-6">
              <img :src="gambar" :alt="title" loading="lazy" decoding="async"
                class="mx-auto max-h-[32rem] w-full object-contain" />
            </button>
            <figcaption class="flex flex-wrap items-center justify-between gap-3 border-t border-line px-4 py-3 lg:px-6">
              <span class="text-sm text-ink-soft">{{ title }}</span>
              <button type="button" @click="modalTerbuka = true"
                class="inline-flex items-center gap-2 rounded-control px-2 py-1 text-sm font-semibold text-brand-700 transition hover:text-brand-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500">
                <Maximize2 class="size-4" aria-hidden="true" />
                Perbesar gambar
              </button>
            </figcaption>
          </figure>

          <!-- Isi CKEditor dinaikkan ke atas lembar putih supaya terbaca sebagai
               dokumen di atas latar bermotif, bukan teks yang menempel di latar. -->
          <div v-if="isi" class="rounded-card bg-white p-6 ring-1 ring-line lg:p-8" :class="gambar ? 'mt-6' : ''">
            <span class="mb-6 block h-1 w-12 rounded-full bg-gold-500" aria-hidden="true"></span>
            <div class="custom-prose" v-html="isi" />
          </div>

          <!-- Isi halaman ditentukan admin dan bisa saja belum diisi. -->
          <div v-if="!gambar && !isi" class="rounded-card bg-white p-8 text-center ring-1 ring-line">
            <p class="text-base font-semibold text-ink">Konten belum tersedia</p>
            <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-ink-soft">
              Halaman {{ title }} belum diisi. Silakan hubungi BKPSDM Kota Kendari bila Anda
              membutuhkan informasi ini.
            </p>
            <Link :href="route('hubungi-kami')"
              class="mt-5 inline-block rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
            Hubungi Kami
            </Link>
          </div>
        </article>

        <aside class="min-w-0 lg:col-span-4">
          <div class="flex flex-col gap-5 lg:sticky lg:top-24">
            <nav class="rounded-card bg-white p-5 ring-1 ring-line" aria-label="Halaman profil lainnya">
              <h2 class="text-sm font-semibold text-ink">Profil Instansi</h2>
              <ul class="mt-3 flex flex-col gap-1">
                <li v-for="item in halamanProfil" :key="item.slug">
                  <Link :href="route('profil', item.slug)"
                    class="flex items-center gap-2.5 rounded-control px-3 py-2.5 text-sm transition"
                    :class="item.slug === slug
                      ? 'bg-brand-50 font-semibold text-brand-800'
                      : 'text-ink-soft hover:bg-surface-2 hover:text-brand-700'"
                    :aria-current="item.slug === slug ? 'page' : undefined">
                  <span class="h-4 w-1 rounded-full transition-colors"
                    :class="item.slug === slug ? 'bg-gold-500' : 'bg-line'" aria-hidden="true"></span>
                  {{ item.label }}
                  </Link>
                </li>
              </ul>
            </nav>

            <!-- Nama berkas dari admin masih berisi timestamp unggahan, jadi
                 dirapikan dulu lewat getOriginalFilename. -->
            <a v-if="lampiran" :href="lampiran" target="_blank" rel="noopener noreferrer"
              class="group flex items-start gap-3 rounded-card bg-white p-5 ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 active:translate-y-0">
              <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                <Download class="size-5" aria-hidden="true" />
              </span>
              <span class="min-w-0">
                <span class="block text-sm font-semibold text-ink group-hover:text-brand-700">
                  Unduh berkas lampiran
                </span>
                <span class="mt-1 block break-words text-xs text-ink-soft">
                  {{ getOriginalFilename(data.lampiran) }}
                </span>
                <span class="sr-only">(membuka berkas di tab baru)</span>
              </span>
            </a>

            <p v-if="diperbarui" class="px-1 text-xs text-ink-soft">
              Diperbarui {{ diperbarui }}
            </p>
          </div>
        </aside>
      </div>
    </section>

    <ModalMedia v-if="gambar" :open="modalTerbuka" @update:open="modalTerbuka = $event" :judul="title"
      keterangan="Gambar ditampilkan penuh. Tekan Esc untuk menutup.">
      <img :src="gambar" :alt="title" class="max-h-[70dvh] w-full bg-surface-2 object-contain" />
    </ModalMedia>
  </AppLayout>
</template>
