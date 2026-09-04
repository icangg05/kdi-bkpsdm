<script setup lang="ts">
import { ref } from 'vue'
import { PlayCircle } from 'lucide-vue-next'
import { Link } from '@inertiajs/vue3'
import { getYoutubeEmbedUrl, getYoutubeId } from '@/lib/utils'

const selectedVideo = ref<null | {
  link: string
  judul: string
  deskripsi: string
  tanggal: string
}>(null)

const closeVideo = () => (selectedVideo.value = null)
defineProps(['data'])

</script>

<template>
  <section class="relative overflow-hidden bg-fixed bg-cover bg-center select-none"
    style="background-image: url('img/bg-galeri.jpg')">
    <div class="bg-sky-700/40 backdrop-brightness-50 py-20 px-4">
      <!-- Heading -->
      <div class="text-center mb-12 text-white">
        <h2 class="text-3xl font-bold">Video Kegiatan</h2>
        <p class="mt-3 max-w-2xl mx-auto text-gray-300 text-sm lg:text-base">
          Kumpulan video kegiatan, layanan, dan momen penting BKPSDM Kota Kendari sebagai bagian dari transparansi dan
          profesionalisme tata kelola kepegawaian.
        </p>
      </div>

      <!-- Grid Video -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div v-for="(video, index) in data" :key="index"
          class="bg-black/40 rounded-lg backdrop-blur-sm p-5 text-white border border-white/20 hover:bg-white/20 transition-all duration-300">
          <!-- Icon + Judul -->
          <div class="flex items-center gap-3 mb-4">
            <div class="flex flex-col items-center">
              <div class="w-1 h-4 bg-sky-400 mb-1 rounded-sm"></div>
              <PlayCircle class="size-7 text-sky-400" />
            </div>
            <h3 class="text-lg font-semibold cursor-pointer line-clamp-1 hover:underline"
              @click="selectedVideo = video">
              {{ video.judul }}
            </h3>
          </div>

          <!-- Deskripsi -->
          <p class="text-gray-300 text-sm mb-4 line-clamp-2">{{ video.deskripsi }}</p>

          <!-- Thumbnail + Play -->
          <div class="relative cursor-pointer group rounded-md overflow-hidden" @click="selectedVideo = video">
            <img :src="`https://img.youtube.com/vi/${getYoutubeId(video.link)}/0.jpg`"
              class="w-full h-48 object-cover group-hover:brightness-75 transition" alt="Video Thumbnail" />
            <PlayCircle
              class="absolute inset-0 m-auto size-14 text-white opacity-80 group-hover:scale-110 transition-transform" />
          </div>
        </div>
      </div>

      <!-- Bottom Section: Divider + Button -->
      <div class="mt-16 text-center space-y-6">
        <div class="h-1 w-24 bg-sky-400 mx-auto rounded-full"></div>
        <Link :href="route('galeri-video')"
          class="inline-flex items-center gap-2 px-6 py-2 bg-sky-400 hover:bg-sky-500 text-black font-semibold rounded-full transition">
          <PlayCircle class="size-5" />
          Lihat Video Lainnya
        </Link>
      </div>
    </div>

    <!-- Video Popup Modal -->
    <div v-if="selectedVideo" class="fixed inset-0 bg-black/80 z-50 flex items-center justify-center px-4">
      <div class="relative w-full max-w-4xl space-y-4">
        <iframe class="w-full aspect-video rounded-lg" :src="`${getYoutubeEmbedUrl(selectedVideo.link)}?autoplay=1&rel=0`" frameborder="0"
          allowfullscreen></iframe>

        <!-- Text info -->
        <div class="text-white text-center space-y-1">
          <h3 class="text-xl font-semibold">{{ selectedVideo.judul }}</h3>
          <p class="text-sm text-gray-300">{{ selectedVideo.deskripsi }}</p>
          <p class="text-xs text-gray-400">{{ selectedVideo.tanggal }}</p>
        </div>

        <!-- Close Button -->
        <button class="absolute top-2 right-2 bg-white/10 hover:bg-white/20 text-white rounded-full p-2"
          @click="closeVideo">
          ✕
        </button>
      </div>
    </div>
  </section>
</template>
