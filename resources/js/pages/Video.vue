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
import { Play, X } from 'lucide-vue-next';
import { getYoutubeEmbedUrl, getYoutubeId } from '@/lib/utils';

const breadcrumbItems = [
  { label: 'Beranda', link: route('beranda') },
  { label: 'Video', link: '#' },
];

const props = usePage().props
const data = props.data as any

const videos = data.data as any

const selected = ref<null | typeof videos.value[0]>(null);

function openVideo(video: typeof videos.value[0]) {
  selected.value = video;
}

function closeVideo() {
  selected.value = null;
}
</script>

<template>

  <Head title="Galeri Video" />

  <AppLayout>
    <BgOverlay src="/img/bg-galeri.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">Galeri Video</h2>
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

    <section v-if="videos.length > 0" class="px-4 mt-[4rem]">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div v-for="(vid, i) in videos" :key="i" class="relative group overflow-hidden rounded-lg shadow">
          <!-- YouTube Thumbnail -->
          <img :src="`https://img.youtube.com/vi/${getYoutubeId(vid.link)}/0.jpg`" alt="Video Thumbnail"
            class="w-full aspect-video object-cover transition-transform duration-300 group-hover:scale-105" />

          <!-- Tombol Play -->
          <button @click="openVideo(vid)"
            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow">
              <Play class="w-5 h-5" />
            </div>
          </button>
        </div>
      </div>

      <!-- Modal -->
      <div v-if="selected" class="z-[9999] fixed inset-0 bg-black/80 flex items-center justify-center px-4">
        <div class="relative w-full max-w-4xl bg-white rounded-lg overflow-hidden">
          <button @click="closeVideo"
            class="absolute top-4 right-4 bg-black/50 hover:bg-black/70 text-white p-1.5 rounded-full z-50">
            <X class="w-6 h-6" />
          </button>
          <div class="relative aspect-video w-full">
            <iframe class="w-full h-full" :src="`${getYoutubeEmbedUrl(selected.link)}?autoplay=1&rel=0`" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <div class="bg-black backdrop-blur-md text-white/90 p-4">
            <h2 class="text-lg font-semibold">{{ selected.judul }}</h2>
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
