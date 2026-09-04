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
const beritaHero = props.beritaHero as any
// console.log(slider)

</script>

<template>
  <Carousel class="relative w-full select-none pointer-events-none" :plugins="[Autoplay({
    delay: 5000,
    stopOnInteraction: false, // jangan berhenti saat interaksi
    stopOnMouseEnter: false,  // jangan berhenti saat hover
    stopOnFocusIn: false,     // jangan berhenti saat fokus
  })]">
    <CarouselContent>
      <!-- SLIDER KEDUA (Pejabat BKPSDM) -->
      <CarouselItem>
        <div class="relative h-[40rem] lg:h-[100dvh] bg-cover bg-center flex items-center justify-center"
          :style="`background-image: url(storage/${slider[0]})`">
          <div class="absolute inset-0 bg-gradient-to-t from-sky-950/95 via-sky-900/75 to-sky-800/55 overlay-anim">
          </div>

          <div class="ml-3.5 lg:ml-auto pt-[40px] lg:pt-[100px] px-8 lg:px-0 relative container z-20 text-center">
            <div class="relative">
              <h2 class="font-lobster z-0 text-xl lg:text-4xl font-bold leading-tight tracking-wide
                bg-gradient-to-r from-sky-400 to-yellow-400 bg-clip-text text-transparent">
                Selamat Datang Di Website Resmi
              </h2>

              <h6 class="max-w-5xl mx-auto mt-2 lg:mt-1 z-0 text-xl lg:text-[36px] text-white font-bold leading-[1] tracking-wide">
                BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA KOTA KENDARI</h6>
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
              Tentang BKPSDM
              </Link>
              <a href="#layanan"
                class="rounded-3xl px-6 lg:px-8 py-3 lg:py-3.5 border border-white bg-transparent text-white text-sm lg:text-base font-semibold">
                Layanan Kepegawaian
              </a>
            </div>
          </div>
        </div>
      </CarouselItem>
      <!-- SLIDER PERTAMA (Tetap) -->

      <!-- SLIDER KEDUA (Pejabat BKPSDM) -->
      <CarouselItem>
        <div class="relative h-[40rem] lg:h-[100dvh] bg-cover bg-center flex items-center justify-center"
          :style="`background-image: url(storage/${slider[1]})`">
          <div class="absolute inset-0 bg-gradient-to-t from-sky-900/85 via-sky-800/60 to-sky-700/40 overlay-anim">
          </div>

          <div class="lg:pt-10 ml-3.5 lg:ml-2 relative z-20 text-center text-white px-6">
            <h2 class="title-anim text-2xl lg:text-5xl font-extrabold leading-[1] tracking-wide drop-shadow-lg">
              Pejabat BKPSDM Kota Kendari
            </h2>

            <div class="line-anim w-24 h-1 bg-sky-400 mx-auto my-4 rounded-full"></div>

            <p class="subtitle-anim max-w-2xl mx-auto text-white/90 text-sm lg:text-lg leading-relaxed">
              Mengenal lebih dekat jajaran pimpinan, pejabat struktural, dan staf yang berdedikasi
              membangun tata kelola kepegawaian yang profesional dan transparan.
            </p>

            <div class="pointer-events-auto mt-8">
              <Link :href="route('profil', 'pejabat')"
                class="btn-anim rounded-3xl px-6 lg:px-8 py-3 lg:py-3.5 border border-sky-600 bg-sky-600 text-white text-sm lg:text-base font-semibold inline-block">
              Lihat Pejabat
              </Link>
            </div>
          </div>
        </div>
      </CarouselItem>


      <!-- SLIDER KETIGA (Berita Terbaru) -->
      <CarouselItem v-if="beritaHero.length > 0">
        <div class="relative h-[40rem] lg:h-[100dvh] bg-cover bg-center flex items-center px-6 lg:px-0"
          :style="`background-image: url(storage/${beritaHero[0].sampul ?? slider[2]})`">
          <div class="absolute inset-0 bg-gradient-to-t from-sky-900/95 via-sky-900/85 to-sky-900/60"></div>

          <div class="pt-10 lg:pt-28 translate-x-2 relative z-20 w-full max-w-6xl mx-auto text-white">
            <div class="max-w-4xl">
              <h1 class="text-2xl lg:text-4xl font-extrabold mb-4 drop-shadow-md line-clamp-2 leading-[1]">
                {{ beritaHero[0].judul }}
              </h1>
              <p class="text-sm lg:text-base mb-4 text-white/80 font-medium">
                {{ beritaHero[0].tanggal }} —
                <span class="uppercase tracking-wide">{{ beritaHero[0].kategori }}</span>
              </p>
              <p class="text-base lg:text-lg text-white/90 mb-6 line-clamp-3 hidden lg:block">
                {{ beritaHero[0].isi }}
              </p>
              <Link :href="route('berita.show', beritaHero[0].slug)"
                class="pointer-events-auto inline-block text-sm lg:text-base rounded-full px-6 py-3 bg-sky-600 hover:bg-sky-700 border border-sky-500 font-semibold transition shadow-lg">
              Selengkapnya
              </Link>
            </div>

            <div v-if="beritaHero.length > 1" class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
              <div v-for="(news, i) in beritaHero.slice(1, 4)" :key="news.id"
                class="bg-white/10 hover:bg-white/15 rounded-xl p-4 backdrop-blur-sm transition">
                <h3 class="font-semibold text-sm lg:text-lg text-white mb-2 line-clamp-1 lg:line-clamp-2">
                  {{ news.judul }}
                </h3>
                <div class="flex justify-between gap-3 flex-row">
                  <p class="text-xs text-white/70">
                    {{ news.tanggal }} — {{ news.kategori }}
                  </p>
                  <Link :href="route('berita.show', news.slug)"
                    class="pointer-events-auto text-sky-400 hover:underline text-xs lg:text-sm font-semibold">
                  Baca Selengkapnya
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </CarouselItem>

    </CarouselContent>
  </Carousel>

</template>


<style scoped>
/* overlay fade + slight scale */
.overlay-anim {
  opacity: 0;
  transform: scale(1.02);
  animation: bgFade 0.9s ease-out 0.05s forwards;
}

@keyframes bgFade {
  from {
    opacity: 0;
    transform: scale(1.02);
  }

  to {
    opacity: 1;
    transform: scale(1);
  }
}

/* fade + up */
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* scale in horizontally */
@keyframes scaleIn {
  0% {
    transform: scaleX(0);
    opacity: 0;
  }

  100% {
    transform: scaleX(1);
    opacity: 1;
  }
}

/* Apply to elements with staggered delays */
.title-anim {
  opacity: 0;
  animation: fadeInUp 0.75s cubic-bezier(.22, .9, .3, 1) 0.18s forwards;
}

.line-anim {
  transform-origin: left center;
  opacity: 0;
  animation: scaleIn 0.55s cubic-bezier(.22, .9, .3, 1) 0.5s forwards;
}

.subtitle-anim {
  opacity: 0;
  animation: fadeInUp 0.75s cubic-bezier(.22, .9, .3, 1) 0.7s forwards;
}

.btn-anim {
  opacity: 0;
  transform: translateY(8px);
  animation: fadeInUp 0.7s cubic-bezier(.22, .9, .3, 1) 0.95s forwards;
}
</style>
