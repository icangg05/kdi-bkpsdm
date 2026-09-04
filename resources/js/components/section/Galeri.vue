<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from '@/components/ui/carousel'
import { Link } from '@inertiajs/vue3'
import Autoplay from 'embla-carousel-autoplay'
import { Image, X } from 'lucide-vue-next'
import { ref } from 'vue'

const props = defineProps(['data'])

// Dummy slide data lengkap
const slides = props.data

const selected = ref<typeof slides[0] | null>(null)
const openModal = (slide: typeof slides[0]) => {
  selected.value = slide
}
const closeModal = () => {
  selected.value = null
}
</script>

<template>
  <section>
    <div class="text-center mb-8 select-none">
      <h2 class="mb-3 text-2xl lg:text-3xl font-bold">Galeri Kegiatan</h2>
      <p class="max-w-xl mx-auto text-sm lg:text-base text-gray-500">
        Dokumentasi kegiatan dan momen penting BKPSDM Kota Kendari untuk mendukung tata kelola kepegawaian yang
        transparan dan profesional.
      </p>
    </div>

    <!-- Carousel -->
    <Carousel class="w-full max-w-6xl mx-auto" :opts="{ align: 'start' }" :plugins="[Autoplay({ delay: 3500 })]">
      <CarouselContent class="-ml-1">
        <CarouselItem v-for="(slide, index) in slides" :key="index" class="pl-1 md:basis-1/2 lg:basis-1/3">
          <div class="p-2 cursor-pointer group" @click="openModal(slide)">
            <img class="w-full h-64 object-cover rounded-lg shadow-md transition duration-300 group-hover:scale-105"
              :src="slide.gambar ? `/storage/${slide.gambar}` : '/img/default-publikasi.png'" :alt="slide.judul" />
          </div>
        </CarouselItem>
      </CarouselContent>
      <div class="hidden lg:block">
        <CarouselPrevious />
        <CarouselNext />
      </div>
    </Carousel>

    <!-- Divider & Button -->
    <div class="mt-10 text-center space-y-6">
      <div class="h-1 w-24 bg-sky-400 mx-auto rounded-full"></div>
      <Link :href="route('galeri-foto')"
        class="inline-flex items-center gap-2 px-6 py-2 bg-sky-400 hover:bg-sky-500 text-black font-semibold rounded-full transition">
      <Image class="size-5" />
      Lihat Galeri Lainnya
      </Link>
    </div>

    <!-- Modal with Title, Date, Description -->
    <Transition name="fade">
      <div v-if="selected" class="fixed inset-0 bg-black/80 z-50 flex items-center justify-center px-4"
        @click.self="closeModal">
        <div
          class="relative max-w-5xl w-full bg-white/5 backdrop-blur-md text-white/90 rounded overflow-hidden shadow-2xl">
          <button class="absolute top-4 right-4 z-10 text-white bg-black/50 hover:bg-black/70 p-2 rounded-full"
            @click="closeModal">
            <X class="w-6 h-6" />
          </button>

          <img :src="selected.gambar ? `/storage/${selected.gambar}` : '/img/default-publikasi.png'" alt="Preview"
            class="w-full max-h-[65vh] object-cover" />
          <div class="p-6 space-y-2">
            <h3 class="text-xl font-bold">{{ selected.judul }}</h3>
            <p class="text-sm text-gray-400">{{ selected.tanggal }}</p>
            <p class="text-sm lg:text-base mt-2 leading-snug">{{ selected.deskripsi }}</p>
          </div>
        </div>
      </div>
    </Transition>
  </section>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
