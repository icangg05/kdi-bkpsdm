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

const latestNews = [
  {
    id: 1,
    title: 'BKPSDM Tingkatkan Kompetensi ASN Lewat Pelatihan Modern',
    date: '10 Agustus 2025',
    category: 'Berita',
    excerpt:
      'BKPSDM Kota Kendari menggelar pelatihan untuk meningkatkan kompetensi ASN di era digitalisasi pemerintahan...',
    image: 'berita-utama.jpg',
  },
  {
    id: 2,
    title: 'Pengumuman: Jadwal Pendaftaran CPNS 2025',
    date: '9 Agustus 2025',
    category: 'Pengumuman',
    excerpt: '',
    image: 'dummy2.jpg',
  },
  {
    id: 3,
    title: 'Ucapan Selamat Hari Jadi Kota Kendari',
    date: '8 Agustus 2025',
    category: 'Ucapan Selamat',
    excerpt: '',
    image: 'dummy3.jpg',
  },
  {
    id: 4,
    title: 'Berita Duka: Meninggalnya Tokoh ASN Kota Kendari',
    date: '7 Agustus 2025',
    category: 'Berita Duka',
    excerpt: '',
    image: 'dummy4.jpg',
  },

]

</script>

<template>
  <Carousel class="relative w-full select-none pointer-events-none" :plugins="[Autoplay({
    delay: 5000,
  })]">
    <CarouselContent>
      <!-- SLIDER KEDUA (Pejabat BKPSDM) -->
      <CarouselItem>
        <div class="relative h-[40rem] lg:h-[100dvh] bg-cover bg-center flex items-center justify-center"
          :style="`background-image: url(storage/${slider[0]})`">
          <!-- Overlay gradient (animated) -->
          <div class="absolute inset-0 bg-gradient-to-t from-sky-950/95 via-sky-900/75 to-sky-800/55 overlay-anim">
          </div>

          <div class="pt-[5.5rem] ml-5 lg:ml-auto lg:pt-[8rem] px-8 lg:px-0 relative container z-20 text-center">
            <div class="relative">
              <h2 class="z-0 text-3xl lg:text-[48px] text-white font-bold leading-tight tracking-wide">
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
          <!-- Overlay gradient (animated) -->
          <div class="absolute inset-0 bg-gradient-to-t from-sky-900/85 via-sky-800/60 to-sky-700/40 overlay-anim">
          </div>

          <!-- Konten -->
          <div class="relative z-20 text-center text-white px-6">
            <h2 class="title-anim text-3xl lg:text-6xl font-extrabold tracking-wide drop-shadow-lg">
              Pejabat BKPSDM Kota Kendari
            </h2>

            <!-- Garis dekoratif -->
            <div class="line-anim w-24 h-1 bg-sky-400 mx-auto my-4 rounded-full"></div>

            <!-- Subjudul -->
            <p class="subtitle-anim max-w-2xl mx-auto text-white/90 text-sm lg:text-lg leading-relaxed">
              Mengenal lebih dekat jajaran pimpinan, pejabat struktural, dan staf yang berdedikasi
              membangun tata kelola kepegawaian yang profesional dan transparan.
            </p>

            <!-- Tombol mirip slider 1 -->
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
      <CarouselItem>
        <div class="relative h-[40rem] lg:h-[100dvh] bg-cover bg-center flex flex-col justify-center px-6 lg:px-0"
          :style="`background-image: url(storage/${slider[2]})`">
          <div class="absolute inset-0 bg-sky-900/70 z-10"></div>

          <div class="relative z-20 max-w-5xl mx-auto text-white">
            <!-- Judul besar berita utama -->
            <h2 class="text-4xl lg:text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg line-clamp-2">
              {{ latestNews[0].title }}
            </h2>
            <p class="text-sm lg:text-base mb-6 text-white/80 font-medium">
              {{ latestNews[0].date }} — <span class="uppercase">{{ latestNews[0].category }}</span>
            </p>
            <p class="max-w-xl text-white/90 mb-8 line-clamp-2">
              {{ latestNews[0].excerpt }}
            </p>
            <Link :href="route('berita.show', latestNews[0].id)"
              class="inline-block rounded-3xl px-6 py-3 border border-sky-600 bg-sky-600 font-semibold text-white hover:bg-sky-700 transition">
            Selengkapnya
            </Link>

            <!-- Daftar berita kecil -->
            <div class="mt-16 hidden lg:grid grid-cols-1 lg:grid-cols-3 gap-6">
              <div v-for="(news, i) in latestNews.slice(1, 4)" :key="news.id"
                class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                <h3 class="font-semibold text-lg text-white truncate mb-2">
                  {{ news.title }}
                </h3>
                <p class="text-xs text-white/70 mb-1">
                  {{ news.date }} — {{ news.category }}
                </p>
                <Link :href="route('berita.show', news.id)" class="text-sky-400 hover:underline text-sm font-semibold">
                Baca
                </Link>
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
