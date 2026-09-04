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
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ArrowRight } from 'lucide-vue-next';
import { computed } from 'vue';

const page = usePage()
const title = page.props.title as string
const paginator = page.props.data as any
const data = computed<any[]>(() => paginator?.data ?? [])

const foto = (item: any) => (item?.foto ? `/storage/${item.foto}` : '/img/default-user.jpg')

const unit = (item: any) => item?.jabatan?.unit_organisasi?.nama ?? null
const bagian = (item: any) => {
  const nama = item?.jabatan?.unit_organisasi?.bagian?.nama
  return nama && nama !== unit(item) ? nama : null
}

// Kepala Badan diurut paling depan oleh ProfilController, tapi urutan itu
// bergantung data: kalau recordnya belum ada, jangan asumsikan indeks 0 adalah
// pimpinan. Dicari eksplisit, sisanya jadi daftar.
const kepala = computed(
  () => data.value.find((i) => /kepala badan/i.test(i?.jabatan?.nama ?? '')) ?? data.value[0] ?? null,
)
const sisa = computed(() => data.value.filter((i) => i !== kepala.value))

</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-profil.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">
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
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>
      <div aria-hidden="true" class="absolute -right-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl"></div>
      <div aria-hidden="true" class="absolute -bottom-32 -left-24 -z-10 size-80 rounded-full bg-gold-400/20 blur-3xl">
      </div>

      <div class="container">
        <p class="max-w-2xl text-sm leading-relaxed text-ink-soft lg:text-base">
          Pejabat struktural dan pelaksana di lingkungan BKPSDM Kota Kendari yang menangani urusan
          kepegawaian dan pengembangan sumber daya aparatur.
        </p>

        <!-- Pimpinan tampil sebagai blok terpisah, bukan kartu besar di tengah:
             hierarkinya dibawa oleh ukuran potret dan tipografi. -->
        <div v-if="kepala" class="mt-8 grid gap-6 rounded-card bg-white p-5 ring-1 ring-line lg:grid-cols-12 lg:gap-10 lg:p-8">
          <div class="relative lg:col-span-4">
            <!-- Bidang emas yang menyembul di belakang potret: bentuk, bukan
                 sekadar kotak foto. Dekoratif. -->
            <span aria-hidden="true"
              class="absolute -left-2 -top-2 hidden h-24 w-24 rounded-card bg-gold-400/25 lg:block"></span>
            <img :src="foto(kepala)" :alt="`Foto ${kepala.nama}`" fetchpriority="high" decoding="async"
              class="relative aspect-[4/5] w-full rounded-card bg-brand-50 object-cover object-top ring-1 ring-line" />
          </div>

          <div class="flex flex-col justify-center lg:col-span-8">
            <span class="h-1 w-12 rounded-full bg-gold-500" aria-hidden="true"></span>
            <h2 class="mt-5 text-xl font-bold leading-tight text-ink lg:text-3xl">{{ kepala.nama }}</h2>
            <p v-if="kepala.jabatan?.nama" class="mt-2 text-base font-semibold text-brand-700 lg:text-lg">
              {{ kepala.jabatan.nama }}
            </p>
            <p v-if="unit(kepala)" class="mt-2 text-sm text-ink-soft lg:text-base">{{ unit(kepala) }}</p>
            <p v-if="bagian(kepala)" class="text-sm text-ink-soft lg:text-base">{{ bagian(kepala) }}</p>

            <div class="mt-6">
              <Link :href="route('profil.pejabat-detail', kepala.hashid)"
                class="inline-flex items-center gap-2 rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px lg:text-base">
              Lihat profil
              <ArrowRight class="size-4" aria-hidden="true" />
              </Link>
            </div>
          </div>
        </div>

        <!-- Satu grid empat kolom: hemat ruang vertikal, bagian tetap terbaca
             sebagai baris keterangan di dalam kartu. -->
        <ul v-if="sisa.length" class="mt-10 grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-5">
          <li v-for="(item, i) in sisa" :key="item.id"
            class="animate-in fade-in slide-in-from-bottom-3 fill-mode-both duration-500 motion-reduce:animate-none"
            :style="`animation-delay: ${Math.min(i, 8) * 60}ms`">
            <Link :href="route('profil.pejabat-detail', item.hashid)"
              class="group relative flex h-full flex-col overflow-hidden rounded-card bg-white ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 active:translate-y-0 motion-reduce:transition-none">
            <!-- Garis emas menyapu dari kiri saat kartu disorot. -->
            <span aria-hidden="true"
              class="absolute left-0 top-0 z-10 h-1 w-0 bg-gold-500 transition-all duration-500 group-hover:w-full motion-reduce:transition-none"></span>

            <span class="overflow-hidden bg-brand-50">
              <img :src="foto(item)" :alt="`Foto ${item.nama}`" loading="lazy" decoding="async"
                class="aspect-[4/5] w-full object-cover object-top transition duration-500 group-hover:scale-105 motion-reduce:transition-none motion-reduce:group-hover:scale-100" />
            </span>

            <span class="flex flex-1 flex-col p-3.5 lg:p-4">
              <span class="text-sm font-semibold leading-snug text-ink group-hover:text-brand-700 lg:text-base">
                {{ item.nama }}
              </span>
              <span v-if="item.jabatan?.nama" class="mt-1.5 text-xs leading-snug text-ink-soft lg:text-sm">
                {{ item.jabatan.nama }}
              </span>
              <span v-if="unit(item)" class="mt-1 text-xs leading-snug text-ink-soft">
                {{ unit(item) }}
              </span>

              <span class="mt-3 inline-flex items-center gap-1.5 text-xs font-semibold text-brand-700 lg:text-sm">
                Lihat profil
                <ArrowRight class="size-3.5 transition-transform group-hover:translate-x-0.5 motion-reduce:transition-none"
                  aria-hidden="true" />
              </span>
            </span>
            </Link>
          </li>
        </ul>

        <!-- Daftar pejabat diisi admin, jadi kosong itu keadaan yang mungkin. -->
        <div v-if="!data.length" class="mt-8 rounded-card bg-white p-8 text-center ring-1 ring-line">
          <p class="text-base font-semibold text-ink">Data pejabat belum tersedia</p>
          <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-ink-soft">
            Daftar pejabat BKPSDM Kota Kendari belum diisi. Silakan hubungi kami bila Anda
            membutuhkan informasi ini.
          </p>
          <Link :href="route('hubungi-kami')"
            class="mt-5 inline-block rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
          Hubungi Kami
          </Link>
        </div>

        <!-- Pagination punya dua root, jadi kelasnya dipasang di pembungkus. -->
        <div v-if="paginator?.last_page > 1" class="mt-10">
          <Pagination :data="paginator" />
        </div>
      </div>
    </section>
  </AppLayout>
</template>
