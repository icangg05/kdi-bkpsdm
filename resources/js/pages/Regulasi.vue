<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router, useForm, usePage } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { Download, Search } from 'lucide-vue-next';
import Pagination from '@/components/Pagination.vue';

const breadcrumbItems = [
  { label: 'Beranda', link: route('beranda') },
  { label: 'Regulasi', link: '#' },
];


const props = usePage().props
const data = props.data as any

const regulasiList = data.data as any
const kategoriList = props.kategoriRegulasi as any
const kategori = props.kategori as any

const form = useForm({
  search: '',
})

function submitSearch() {
  router.get(
    route('regulasi', { kategori }),
    { q: form.search },
    {
      preserveScroll: true,
    }
  );
}

function toKategori(value: string) {
  // alert(value); return
  router.get(
    route('regulasi', { kategori: value }),
    {},
    { preserveScroll: true }
  );
}

</script>

<template>

  <Head title="Regulasi" />

  <AppLayout>
    <BgOverlay src="/img/bg-regulasi.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">
          Regulasi
        </h2>
        <span
          class="pointer-events-none text-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
      </div>
      <div class="flex">
        <Breadcrumb class="mx-auto mt-4 lg:mt-5 text-white/85">
          <BreadcrumbList>
            <BreadcrumbItem v-for="(item, index) in breadcrumbItems" :key="index">
              <BreadcrumbLink :href="item.link" class="hover:underline text-sm lg:text-base">
                {{ item.label }}
              </BreadcrumbLink>
              <BreadcrumbSeparator v-if="breadcrumbItems.length - 1 != index" class="ml-0.5 text-sky-400" />
            </BreadcrumbItem>
          </BreadcrumbList>
        </Breadcrumb>
      </div>
    </BgOverlay>

    <div class="mt-[4rem] container grid grid-cols-1 lg:grid-cols-4 gap-8">
      <!-- Konten Regulasi -->
      <div class="lg:col-span-3 grid grid-cols-1 lg:grid-cols-2 gap-x-0 gap-y-6 lg:gap-x-6 lg:gap-y-6 h-fit">
        <form @submit.prevent="submitSearch" class="flex gap-2 col-span-2">
          <!-- Input + Icon -->
          <div class="relative flex-1">
            <input v-model="form.search" type="seach" placeholder="Pencarian..."
              class="w-full pl-10 pr-4 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-sky-500 focus:outline-none" />
            <Search class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" />
          </div>

          <!-- Tombol -->
          <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded hover:bg-sky-600 transition">
            Cari
          </button>
        </form>

        <div v-if="regulasiList.length > 0" class="col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-3 lg:gap-6">
          <div v-for="(regulasi, i) in regulasiList" :key="i">
            <div class="bg-white rounded-lg shadow-md p-5 h-full">
              <div>
                <h3 class="text-base font-semibold text-gray-800 leading-snug">{{ regulasi.judul }}</h3>
                <p class="text-sky-600 text-xs font-semibold uppercase mt-1">{{ regulasi.kategori_regulasi.nama }}</p>
                <p class="text-sm text-gray-600 mt-2">{{ regulasi.deskripsi }}</p>
              </div>

              <div class="flex items-center justify-between mt-3">
                <a :href="route('regulasi.download', regulasi.id)"
                  class="bg-sky-600 hover:bg-sky-700 text-white text-xs font-medium px-4 py-2 rounded transition ease-in-out flex items-center gap-2">
                  <Download class="w-4 h-4" />
                  <span>Unduh PDF</span>
                </a>
                <span class="text-xs text-gray-500 flex items-center gap-1">
                  <Download class="w-3 h-3 text-gray-400" />
                  <span>{{ regulasi.total_unduh }} kali</span>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div v-else class="col-span-2 text-center text-gray-600 border border-gray-200 p-8 pb-6 rounded">
          <p class="text-sm lg:text-base">Tidak ada data ditemukan.</p>
        </div>

        <!-- Pagination -->
        <Pagination :data="data" />
      </div>

      <!-- Sidebar Kategori -->
      <aside class="bg-white rounded-lg shadow-md p-6 h-fit">
        <h4 class="text-lg font-bold text-gray-800 mb-4">Kategori Regulasi</h4>
        <ul class="space-y-3 select-none">
          <li @click="toKategori('all')"
            class="flex justify-between items-center text-sm text-gray-700 hover:text-sky-600 cursor-pointer">
            <span>Semua Kategori</span>
            <span class="bg-sky-100 text-sky-600 text-xs px-2 py-0.5 rounded-full">
              {{kategoriList.reduce((sum: any, k: any) => sum + k.regulasi_count, 0)}}</span>
          </li>
          <li @click="toKategori(kategori.slug)" v-for="(kategori, i) in kategoriList" :key="i"
            class="flex justify-between items-center text-sm text-gray-700 hover:text-sky-600 cursor-pointer">
            <span>{{ kategori.nama }}</span>
            <span class="bg-sky-100 text-sky-600 text-xs px-2 py-0.5 rounded-full">{{ kategori.regulasi_count }}</span>
          </li>
        </ul>
      </aside>
    </div>
  </AppLayout>
</template>

<style scoped>
li:hover span:first-child {
  text-decoration: underline;
}
</style>
