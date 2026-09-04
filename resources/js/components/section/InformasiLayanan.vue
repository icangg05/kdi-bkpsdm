<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { useIntersectionObserver } from '@vueuse/core'
import { ArrowRight, ArrowUpRight, Clock, FileBadge, Home, Users } from 'lucide-vue-next'
import { DAFTAR_LAYANAN } from '@/lib/layanan'
import { ref } from 'vue'

// Daftar layanan dipakai bersama halaman detail lewat @/lib/layanan, supaya
// tidak ada lagi dua daftar yang bisa berbeda isi.
// Aplikasi tetap di sini: yang ini milik instansi lain, bukan halaman layanan.
const aplikasi = [
  { label: 'My ASN', desc: 'Portal ASN Digital BKN', link: 'https://asndigital.bkn.go.id/', icon: Users },
  { label: 'Absensi Online', desc: 'Absensi digital ASN Kota Kendari', link: 'https://asn.kendarikota.go.id', icon: Clock },
  { label: 'SI-TPPNS', desc: 'Tambahan penghasilan pegawai ASN', link: 'https://sitppns.kendarikota.go.id', icon: FileBadge },
  { label: 'TAPERA', desc: 'Tabungan Perumahan Rakyat untuk ASN', link: 'https://sitara.tapera.go.id/peserta/login', icon: Home },
]

// Stagger dipicu saat seksi masuk viewport, bukan saat mount: seksi ini di
// bawah lipatan, dan animasi yang selesai sebelum dilihat sama saja dengan
// tidak ada animasi. IntersectionObserver, bukan listener scroll.
const seksi = ref<HTMLElement | null>(null)
const terlihat = ref(false)

const { stop } = useIntersectionObserver(
  seksi,
  ([entry]) => {
    if (!entry?.isIntersecting) return
    terlihat.value = true
    stop()
  },
  { rootMargin: '-10% 0px' },
)

// Kaca gelap: translusen + garis tepi terang di dalam, bukan sekadar blur.
// Kelas `kartu-kaca` di <style> membawa sorotan tepi dan cadangan solid untuk
// prefers-reduced-transparency, yang tidak punya utility Tailwind.
const kartu =
  'kartu-kaca group flex h-full items-start justify-between gap-4 rounded-card bg-white/10 p-5 ring-1 ring-white/15 backdrop-blur-md transition duration-300 hover:bg-white/[0.16] hover:ring-white/30 hover:scale-[1.02] active:scale-[0.99]'
</script>

<template>
  <section id="layanan" ref="seksi" class="relative isolate overflow-hidden py-16 lg:py-24">
    <!-- Latar dikembalikan seperti versi sebelumnya, tetapi memakai aset milik
         instansi di public/img, bukan foto stok yang di-hotlink dari luar. -->
    <img src="/img/bg-layanan.jpg" alt="" aria-hidden="true" loading="lazy" decoding="async"
      class="absolute inset-0 -z-10 size-full object-cover" />
    <div class="absolute inset-0 -z-10 bg-brand-900/80"></div>

    <div class="container">
      <h2 class="text-2xl font-bold text-white lg:text-3xl">Informasi Layanan</h2>
      <p class="mt-2 max-w-2xl text-sm text-brand-200 lg:text-base">
        Prosedur, syarat, dan tautan sistem untuk urusan kepegawaian ASN Kota Kendari.
      </p>

      <h3 class="mt-10 text-base font-semibold text-white">Layanan Kepegawaian</h3>
      <ul class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <li v-for="(item, i) in DAFTAR_LAYANAN" :key="item.slug" :style="{ '--i': i }"
          :class="terlihat && 'kartu-masuk'">
          <Link :href="route('layanan.detail', item.slug)" :class="kartu">
          <span class="flex items-center gap-4">
            <span class="grid size-10 shrink-0 place-items-center rounded-control bg-white/10 ring-1 ring-white/15">
              <component :is="item.icon" class="size-5 text-white" aria-hidden="true" />
            </span>
            <span class="min-w-0">
              <span class="block font-semibold text-white">
                {{ item.label }}
              </span>
              <span class="mt-0.5 block text-sm leading-snug text-brand-200">{{ item.desc }}</span>
            </span>
          </span>
          <ArrowRight
            class="mt-2.5 size-5 shrink-0 text-white/60 transition duration-300 group-hover:translate-x-1 group-hover:text-white"
            aria-hidden="true" />
          </Link>
        </li>
      </ul>

      <h3 class="mt-12 text-base font-semibold text-white">Aplikasi dan Portal</h3>
      <ul class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <li v-for="(item, i) in aplikasi" :key="item.link" :style="{ '--i': i }"
          :class="terlihat && 'kartu-masuk'">
          <a :href="item.link" target="_blank" rel="noopener noreferrer" :class="kartu">
            <span class="flex items-center gap-4">
              <span class="grid size-10 shrink-0 place-items-center rounded-control bg-white/10 ring-1 ring-white/15">
                <component :is="item.icon" class="size-5 text-white" aria-hidden="true" />
              </span>
              <span class="min-w-0">
                <span class="block font-semibold text-white">
                  {{ item.label }}
                  <span class="sr-only">(membuka situs lain di tab baru)</span>
                </span>
                <span class="mt-0.5 block text-sm leading-snug text-brand-200">{{ item.desc }}</span>
              </span>
            </span>
            <!-- Panah serong khusus tautan keluar, panah lurus untuk halaman
                 sendiri: bentuknya ikut memberi tahu ke mana perginya. -->
            <ArrowUpRight
              class="mt-2.5 size-5 shrink-0 text-white/60 transition duration-300 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-white"
              aria-hidden="true" />
          </a>
        </li>
      </ul>
    </div>
  </section>
</template>

<style scoped>
/* Sorotan tepi dalam: yang membuat kaca terbaca sebagai lempeng bening, bukan
   sekadar kotak transparan. Tidak ada utility Tailwind untuk inset shadow ini. */
.kartu-kaca {
  box-shadow:
    inset 0 1px 0 rgb(255 255 255 / 0.18),
    0 10px 30px rgb(20 33 61 / 0.35);
}

/* Sebagian pengguna mematikan efek transparan di setelan sistem. Untuk mereka
   kartunya jadi bidang padat, bukan kaca yang blurnya hilang lalu teksnya
   menumpuk di atas foto. */
@media (prefers-reduced-transparency: reduce) {
  .kartu-kaca {
    background-color: var(--color-brand-800);
    backdrop-filter: none;
    box-shadow: 0 10px 30px rgb(20 33 61 / 0.35);
  }
}

/* `backwards`, bukan `both`: `both` mengunci transform setelah animasi selesai
   dan membuat hover:scale pada kartu tidak lagi berpengaruh. */
.kartu-masuk {
  animation: kartu-naik 0.5s cubic-bezier(0.22, 0.9, 0.3, 1) backwards;
  /* Dibatasi enam langkah: tanpa itu kartu ke-15 baru mulai setelah 675 ms,
     dan orang yang datang mencari satu layanan menunggu lebih dari sedetik
     sebelum daftarnya lengkap. */
  animation-delay: calc(min(var(--i, 0), 6) * 45ms);
}

@keyframes kartu-naik {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (prefers-reduced-motion: reduce) {
  .kartu-masuk {
    animation: none;
  }
}
</style>
