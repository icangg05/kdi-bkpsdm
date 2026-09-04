<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { ref } from 'vue';
import { ZoomIn, X } from 'lucide-vue-next';
import Pagination from '@/components/Pagination.vue';

const breadcrumbItems = [
  { label: 'Beranda', link: route('beranda') },
  { label: 'Galeri', link: '#' },
];

const props = usePage().props
const data = props.data as any

const images = data.data
const selected = ref<null | typeof images.value[0]>(null);

function openImage(image: typeof images.value[0]) {
  selected.value = image;
}

function closeImage() {
  selected.value = null;
}
</script>

<template>

  <Head title="Galeri Foto" />

  <AppLayout>
    <BgOverlay src="/img/bg-galeri.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">
          Galeri Foto
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

    <section v-if="images.length > 0" class="px-4 mt-[4rem]">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div v-for="(img, i) in images" :key="i" class="relative group overflow-hidden rounded-lg shadow">
          <img :src="img.gambar ? `/storage/${img.gambar}` : '/img/default-publikasi.png'" alt="img.jpg"
            class="w-full aspect-[4/2.7] object-cover transition-transform duration-300 group-hover:scale-105" />
          <button @click="openImage(img)"
            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow">
              <ZoomIn class="w-5 h-5" />
            </div>
          </button>
        </div>
      </div>

      <Pagination :data="data" />

      <!-- Modal -->
      <div v-if="selected" class="z-[9999] fixed inset-0 bg-black/80 flex items-center justify-center px-4">
        <div class="relative max-w-4xl w-full bg-white rounded-lg overflow-hidden">
          <button @click="closeImage"
            class="absolute top-4 right-4 bg-black/50 hover:bg-black/70 text-white p-1.5 rounded-full z-50">
            <X class="w-6 h-6" />
          </button>
          <img :src="selected.gambar ? `/storage/${selected.gambar}` : '/img/default-publikasi.png'" alt="img"
            class="w-full max-h-[70vh] object-cover" />
          <div class="bg-black backdrop-blur-md text-white/90 p-4">
            <h2 class="text-lg font-semibold">{{ selected.judul }} {{ selected.gambar }}</h2>
            <p class="text-sm text-gray-300">{{ selected.tanggal }}</p>
            <p class="text-sm mt-1">{{ selected.deskripsi }}</p>
          </div>
        </div>
      </div>
    </section>
    <div v-else
      class="container mt-[4rem] text-center text-gray-500 text-sm lg:text-base shadow p-6 border border-gray-100">
      Tidak ada data ditemukan.
    </div>
  </AppLayout>
</template>
