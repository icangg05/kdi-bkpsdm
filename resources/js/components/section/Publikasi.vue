<script setup>
import { Link } from '@inertiajs/vue3'
import {
  Newspaper,
  Megaphone,
  PartyPopper,
  HeartHandshake,
  BookOpenText
} from 'lucide-vue-next'
import { shallowRef, computed } from 'vue'

const activeCategory = shallowRef('Berita')

const categories = [
  { name: 'Berita', icon: Newspaper },
  { name: 'Pengumuman', icon: Megaphone },
  { name: 'Ucapan Selamat', icon: PartyPopper },
  { name: 'Berita Duka', icon: HeartHandshake }
]

const props = defineProps([
  'berita',
  'pengumuman',
  'ucapanSelamat',
  'beritaDuka',
])

const publikasiData = {
  Berita: {
    utama: props.berita[0] ?? null,
    lainnya: props.berita.slice(1) ?? []
  },
  Pengumuman: {
    utama: props.pengumuman[0] ?? null,
    lainnya: props.pengumuman.slice(1) ?? []
  },
  'Ucapan Selamat': {
    utama: props.ucapanSelamat[0] ?? null,
    lainnya: props.ucapanSelamat.slice(1) ?? []
  },
  'Berita Duka': {
    utama: props.beritaDuka[0] ?? null,
    lainnya: props.beritaDuka.slice(1) ?? []
  },
}

const publikasiUtama = computed(() => publikasiData[activeCategory.value].utama)
const publikasiLain = computed(() => publikasiData[activeCategory.value].lainnya)
</script>

<template>
  <section class="bg-[linear-gradient(to_bottom,_#ffffff_0%,_#e0f2fe_50%,_#ffffff_100%)] pt-16 pb-20">
    <div class="max-w-6xl mx-auto px-4">
      <!-- Judul -->
      <div class="text-center mb-10">
        <BookOpenText class="w-8 h-8 text-sky-600 mx-auto mb-2" />
        <h2 class="text-2xl md:text-4xl font-extrabold text-gray-800 mb-1">Publikasi</h2>
        <div class="h-1 w-16 bg-sky-600 mx-auto rounded-full mb-2"></div>
        <p class="text-gray-600">Informasi seputar aktivitas ASN, pengumuman resmi, dan publikasi lainnya</p>
      </div>

      <!-- Kategori -->
      <div class="flex flex-wrap justify-center gap-3 mb-10">
        <button v-for="{ name, icon } in categories" :key="name" @click="activeCategory = name"
          class="flex items-center gap-2 border rounded-full px-4 py-2 text-sm transition hover:bg-sky-100" :class="{
            'bg-sky-600 text-white hover:bg-sky-700': activeCategory === name,
            'text-gray-700 border-gray-300 bg-gray-50': activeCategory !== name
          }">
          <component :is="icon" class="w-4 h-4" />
          {{ name }}
        </button>
      </div>

      <!-- Transisi -->
      <Transition name="fade-content" mode="out-in">
        <div :key="activeCategory" class="grid md:grid-cols-2 gap-6 items-start">
          <!-- Konten Utama -->
          <div class="rounded-xl overflow-hidden shadow-lg" v-if="publikasiUtama">
            <img :src="publikasiUtama.sampul ? `/storage/${publikasiUtama.sampul}` : '/img/default-publikasi.png'"
              class="w-full aspect-[3/1.7] object-cover" />
            <div class="bg-sky-600 text-white px-6 py-4">
              <Link :href="route('berita.show', publikasiUtama.slug)"
                class="hover:underline font-semibold text-base lg:text-lg leading-tight line-clamp-1">{{
                  publikasiUtama.judul }}</Link>
              <p class="mt-1 text-sm opacity-80">{{ publikasiUtama.tanggal }}</p>
            </div>
          </div>

          <!-- Konten Lainnya -->
          <div class="flex flex-col gap-4" v-if="publikasiLain.length > 0">
            <div v-for="item in publikasiLain" :key="item.id"
              class="flex items-start gap-3 p-4 bg-white border-l-4 border-sky-500 rounded-lg shadow-sm hover:shadow-md transition">
              <Newspaper class="w-5 h-5 text-sky-500 mt-1" />
              <div>
                <Link :href="route('berita.show', item.slug)"
                  class="hover:underline font-medium text-gray-800 leading-tight text-sm lg:text-base line-clamp-1">
                {{ item.judul }}
                </Link>
                <p class="text-sm text-gray-500">{{ item.tanggal }}</p>
              </div>
            </div>
          </div>
        </div>
      </Transition>
    </div>
  </section>
</template>

<style scoped>
.fade-content-enter-active,
.fade-content-leave-active {
  transition: opacity 0.5s ease;
}

.fade-content-enter-from,
.fade-content-leave-to {
  opacity: 0;
}
</style>
