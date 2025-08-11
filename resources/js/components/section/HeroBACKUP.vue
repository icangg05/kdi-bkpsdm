<script setup lang="ts">
import {
  Carousel,
  CarouselContent,
  CarouselItem,
} from '@/components/ui/carousel'
import { Link, usePage } from '@inertiajs/vue3'
import Autoplay from 'embla-carousel-autoplay'

const props = usePage().props
const slider = props.slider as any
// console.log(slider)
</script>

<template>
  <Carousel class="relative w-full select-none pointer-events-none" :plugins="[Autoplay({
    delay: 5000,
  })]">
    <CarouselContent>
      <CarouselItem v-for="(slide, index) in slider" :key="index">
        <div class="relative h-[40rem] lg:h-[100dvh] bg-cover bg-center text-white flex items-center justify-center"
          :style="`background-image: url(storage/${slide})`">
          <!-- Overlay hitam -->
          <div class="absolute inset-0 bg-sky-700/40 z-10"></div>

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
            <div class="pointer-events-auto mt-10 flex flex-col lg:flex-row items-center justify-center gap-4 lg:gap-6">
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
