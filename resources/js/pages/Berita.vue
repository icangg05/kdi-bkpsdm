<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router, useForm, usePage } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'
import CardRecentPost from '@/components/CardRecentPost.vue';
import CardBerita from '@/components/CardBerita.vue';
import CardKategori from '@/components/CardKategori.vue';
import CardKontak from '@/components/CardKontak.vue';
import BgOverlay from '@/components/BgOverlay.vue';
import { Search } from 'lucide-vue-next';
import Pagination from '@/components/Pagination.vue';

const page = usePage()
const props = page.props as any
// console.log(props.pengaturan)

const title = props.title as string
const publikasi = props.publikasi as string
const paginator = props.data
const data = props.data.data as any
const publikasiTerbaru = props.publikasiTerbaru as any

const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda')
  },
  {
    label: 'Publikasi',
    link: '#',
  },
  {
    label: title,
    link: route('publikasi.index', publikasi)
  },
]

const form = useForm({
  search: '',
})

function submitSearch() {
  router.get(
    route('publikasi.index', {
      publikasi,
    }),
    { q: form.search },
    {
      preserveScroll: true,
    }
  )
}

</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-publikasi.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">
          {{ title }}
        </h2>
        <span
          class="pointer-events-none etext-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
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

    <!-- Berita konten -->
    <div class="mt-[3rem] lg:mt-[6rem] container">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-16">
        <!-- Konten Berita Utama -->
        <div class="lg:col-span-2 space-y-10">
          <form @submit.prevent="submitSearch" class="flex gap-2">
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

          <div v-if="data.length > 0" class="grid grid-cols-2 gap-4">
            <div v-for="(item, i) in data" :key="i">
              <CardBerita :data="item" />
            </div>
          </div>
          <div v-else class="text-center text-gray-600 border border-gray-200 p-8 pb-6 rounded">
            <p class="text-sm lg:text-base">Tidak ada data ditemukan.</p>
          </div>

          <Pagination :data="paginator" />
        </div>

        <!-- Sidebar -->
        <div class="space-y-10">
          <!-- Recent Posts -->
          <CardRecentPost v-if="publikasiTerbaru.length > 0" :data="publikasiTerbaru" />

          <!-- Have Any Question -->
          <CardKontak />

          <!-- Categories -->
          <CardKategori />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
