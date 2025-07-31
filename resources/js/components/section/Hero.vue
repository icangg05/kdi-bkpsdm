<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
} from '@/components/ui/carousel'
import { Link, usePage } from '@inertiajs/vue3'
import Autoplay from 'embla-carousel-autoplay'

const slides = [
  {
    image: '/img/bg-hero1.jpg', // kota/metropolitan look
  },
  {
    image: 'https://images.unsplash.com/photo-1462556791646-c201b8241a94?q=80&w=1165&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  },
  {
    image: 'https://images.unsplash.com/photo-1557908612-fdf0b3b2e68e?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', // gedung tinggi, nuansa resmi
  },
]

const props = usePage().props
const slider = props.slider as any
// console.log(slider)
</script>

<template>
  <Carousel class="relative w-full" :plugins="[Autoplay({
    delay: 5000,
  })]">
    <CarouselContent>
      <CarouselItem v-for="(slide, index) in slider" :key="index">
        <div class="relative h-[80dvh] lg:h-[100dvh] bg-cover bg-center text-white flex items-center justify-center"
          :style="`background-image: url(storage/${slide})`">
          <!-- Overlay hitam -->
          <div class="absolute inset-0 bg-black/55 z-10"></div>

          <!-- Konten di atas overlay -->
          <div class="pt-[5.5rem] ml-5 lg:ml-auto lg:pt-[8rem] px-8 lg:px-0 relative container z-20 text-center">
            <div class="relative">
              <h2 class="z-0 text-3xl lg:text-[48px] font-bold leading-tight tracking-wide">
                Selamat Datang Di BKPSDM Kota Kendari
              </h2>
              <span
                class="pointer-events-none text-[4.5rem] lg:text-[12rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
            </div>
            <p class="mt-8 lg:mt-13 max-w-2xl mx-auto text-sm lg:text-base text-white/85">
              BKPSDM berkomitmen mewujudkan tata kelola kepegawaian yang profesional dan transparan di lingkungan
              Pemerintah Kota Kendari. Kami mendorong pengembangan kompetensi ASN melalui pelatihan dan pembinaan
              berkelanjutan.
            </p>
            <div class="mt-10 flex flex-col lg:flex-row items-center justify-center gap-4 lg:gap-6">
              <Link :href="route('profil', 'sejarah')"
                class="rounded-3xl px-6 lg:px-8 py-3 lg:py-3.5 border border-sky-600 bg-sky-600 text-white text-sm lg:text-base font-semibold">
              Tentang
              BKPSDM</Link>
              <a href="#layanan"
                class="rounded-3xl px-6 lg:px-8 py-3 lg:py-3.5 border border-white bg-transparent text-white text-sm lg:text-base font-semibold">Layanan
                Kepegawaian</a>
            </div>
          </div>
        </div>
      </CarouselItem>
    </CarouselContent>
    <!-- <CarouselPrevious class="absolute left-5" />
    <CarouselNext class="absolute right-5" /> -->
  </Carousel>
</template>
