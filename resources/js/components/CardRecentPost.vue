<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
  data: any
}>()
</script>

<template>
  <div class="border border-gray-200 p-8 pb-6 rounded">
    <h4 class="text-lg font-semibold border-b pb-2 mb-3">Publikasi Terbaru</h4>
    <div v-for="(item, index) in data" :key="index" class="mb-4">
      <Link :href="route('berita.show', item.slug)" class="block text-sm font-semibold hover:text-sky-600 text-gray-800 line-clamp-2 transition ease-in-out">
      {{ item.judul }}
      </Link>
      <p class="text-gray-500 text-xs flex items-center gap-1 mt-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
        </svg>
        {{ item.tanggal }}
      </p>
    </div>
  </div>
</template>
