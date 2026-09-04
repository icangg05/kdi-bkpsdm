<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import CardRecentPost from '@/components/CardRecentPost.vue'
import CardKategori from '@/components/CardKategori.vue'
import CardKontak from '@/components/CardKontak.vue'
import BgOverlay from '@/components/BgOverlay.vue'
import { Calendar, Database, Eye } from 'lucide-vue-next'
import { convertOembed, getOriginalFilename } from '@/lib/utils'

// Props dari Inertia
const props = defineProps<{
  data: any,
  publikasiTerbaru: any
}>()

// Reaktif: current URL dan copied state
const currentUrl = ref(window.location.href)
const copied = ref(false)

// Fungsi salin link
function copyLink() {
  navigator.clipboard.writeText(currentUrl.value)
    .then(() => {
      copied.value = true
      setTimeout(() => copied.value = false, 2000)
    })
    .catch(() => alert('Gagal menyalin link'))
}
</script>


<template>

  <Head title="Berita" />

  <AppLayout>
    <BgOverlay src="/img/bg-publikasi.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[32px] font-bold leading-tight tracking-wide line-clamp-2">
          {{ data.judul }}
        </h2>
        <span
          class="pointer-events-none etext-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
      </div>
      <div class="flex justify-center flex-wrap items-center text-white/85 mt-4 lg:mt-5 gap-6">
        <!-- Kategori -->
        <div class="flex items-center gap-2">
          <Database class="w-4 h-4" />
          <span class="text-sm"><span class="font-medium">{{ data.kategori }}</span></span>
        </div>

        <!-- Tanggal -->
        <div class="flex items-center gap-2">
          <Calendar class="w-4 h-4" />
          <span class="text-sm">{{ data.tanggal }}</span>
        </div>
      </div>
    </BgOverlay>

    <!-- Berita konten -->
    <div class="mt-[3rem] lg:mt-[6rem] container">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-16">
        <!-- Konten Berita Utama -->
        <div class="lg:col-span-2 space-y-10">
          <div class="flex flex-col">
            <!-- Gambar -->
            <img :src="data.sampul ? `/storage/${data.sampul}` : '/img/default-publikasi.png'"
              class="aspect-[16/10] w-full rounded-lg shadow-md object-cover" :alt="data.sampul" />

            <!-- Kategori, Tanggal, Views -->
            <div class="flex flex-wrap justify-between items-center mt-4 text-sm text-gray-500 uppercase">
              <span>{{ data.kategori }}</span>

              <div class="flex items-center gap-4">
                <!-- Tanggal -->
                <span class="inline-flex items-center gap-1 text-xs lg:text-sm">
                  <Calendar class="w-4 h-4" />
                  <span>{{ data.tanggal }}</span>
                </span>

                <!-- Total View -->
                <span class="inline-flex items-center gap-1 text-xs lg:text-sm">
                  <Eye class="w-4 h-4" />
                  <span>{{ data.total_view ?? 0 }}</span>
                </span>
              </div>
            </div>

            <!-- Judul -->
            <h3
              class="mt-2 lg:mt-4 text-xl lg:text-2xl font-semibold hover:underline cursor-pointer leading-tight line-clamp-2">
              {{ data.judul }}
            </h3>

            <!-- Isi -->
            <div class="mt-5 lg:mt-4 prose-sm lg:prose lg:max-w-none !text-gray-800" v-html="convertOembed(data.isi)" />

            <div v-if="data.lampiran" class="mt-6">
              <a :href="`/storage/${data.lampiran}`" target="_blank"
                class="inline-block bg-sky-700 text-white text-sm px-6 py-2 rounded-md shadow hover:bg-sky-800"
                onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;">
                {{ getOriginalFilename(data.lampiran) }}
              </a>
            </div>

            <!-- Share This -->
            <div class="flex flex-wrap justify-end items-center gap-2 mt-10 text-sm">
              <span class="text-gray-600">Bagikan:</span>

              <!-- Facebook -->
              <a :href="`https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`" target="_blank" rel="noopener"
                class="flex items-center gap-1 px-3 py-1 bg-blue-600 text-white rounded hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12a10 10 0 0 0 8 9.8V15h-2v-3h2v-2c0-2.206 1.343-3.5 3.4-3.5.986 0 2.016.175 2.016.175v2.22h-1.137c-1.12 0-1.463.696-1.463 1.41V12h2.5l-.4 3h-2.1v6.8A10 10 0 0 0 22 12z" />
                </svg>
                Facebook
              </a>

              <!-- WhatsApp -->
              <a :href="`https://wa.me/?text=${encodeURIComponent(data.judul + ' - ' + currentUrl)}`" target="_blank"
                rel="noopener"
                class="flex items-center gap-1 px-3 py-1 bg-green-500 text-white rounded hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path
                    d="M20.52 3.48a11.91 11.91 0 0 0-16.9 0 11.91 11.91 0 0 0-2.7 12.68L.5 23.5l7.44-1.95a11.94 11.94 0 0 0 5.72 1.45h.01a11.9 11.9 0 0 0 8.43-3.5 11.91 11.91 0 0 0 0-16.92zm-5.2 11.68c-.26.73-1.51 1.4-2.08 1.48-.53.08-1.2.11-1.92-.12a8.02 8.02 0 0 1-3.34-2.17 7.54 7.54 0 0 1-1.61-3.2c-.06-.36.02-.78.37-1.08.35-.3.97-.5 1.45-.54.48-.05.98.04 1.18.42l.83 1.95c.1.25.08.45-.04.66-.2.35-.41.52-.63.77-.1.12-.2.26-.1.44.2.35.9 1.48 2.2 2.02.27.11.48.1.66-.06.17-.14.77-.7.98-.94.2-.23.43-.19.7-.11l1.96.66c.26.1.45.17.51.27.06.1.06.55-.2 1.28z" />
                </svg>
                WhatsApp
              </a>

              <!-- Copy Link -->
              <button @click="copyLink"
                class="flex items-center gap-1 px-3 py-1 bg-gray-700 text-white rounded hover:opacity-90 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path
                    d="M3 8c0-1.1.9-2 2-2h6v2H5v10h6v2H5c-1.1 0-2-.9-2-2V8zm13 12c1.1 0 2-.9 2-2v-6h-2v6h-6v2h6zm3.5-13H14c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h5.5c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2z" />
                </svg>
                {{ copied ? 'Copied!' : 'Salin Link' }}
              </button>
            </div>
          </div>
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
