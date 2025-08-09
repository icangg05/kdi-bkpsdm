<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Calendar } from 'lucide-vue-next';

const props = defineProps<{
  data: any
}>()
</script>

<template>
  <div class="flex flex-col">
    <img :src="data.sampul ? `/storage/${data.sampul}` : '/img/default-publikasi.png'" alt="Berita"
      class="aspect-[16/10] w-full rounded-lg shadow-md object-cover" />
    <div class="flex flex-col lg:flex-row justify-between mt-4 text-sm text-gray-500 uppercase">
      <!-- <span class="">{{ data.kategori }}</span> -->
      <span class="text-xs inline-flex gap-1">
        <Calendar class="size-3" /> {{ data.tanggal }}
      </span>
    </div>
    <Link :href="route('berita.show', data.slug)"
      class=" mt-2 lg:mt-4 text-base lg:text-lg font-semibold hover:text-sky-600 cursor-pointer leading-tight line-clamp-2 transition ease-in-out">
    {{ data.judul }}
    </Link>
    <p class="mt-2 lg:mt-4 text-black/55 text-sm lg:text-[15px] leading-snug line-clamp-3">
      {{ data.isi }}
    </p>
    <Link :href="route('berita.show', data.slug)"
      class="mt-3 lg:mt-4 text-sky-500 hover:underline font-medium flex items-center gap-1 text-sm">
    Read More
    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
    </svg>
    </Link>
  </div>
</template>
