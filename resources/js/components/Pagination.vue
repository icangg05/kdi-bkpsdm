<script setup>
import { router } from '@inertiajs/vue3'
defineProps({
  data: Object,
})
</script>

<template>
  <!-- Mobile: hanya tombol Prev & Next + info halaman -->
  <div class="select-none block sm:hidden col-span-2 mt-6 text-sm space-y-2 text-center">
    <div class="flex justify-between border border-gray-300 rounded-md overflow-hidden shadow-sm">
      <a v-if="data.prev_page_url" @click.prevent="router.get(data.prev_page_url, {}, { preserveScroll: true })"
        href="#" class="px-4 py-2 w-1/2 text-center hover:bg-sky-100 border-r border-gray-300">
        &laquo; Sebelumnya
      </a>
      <span v-else class="px-4 py-2 w-1/2 text-center text-gray-400 border-r border-gray-300">
        &laquo; Sebelumnya
      </span>

      <a v-if="data.next_page_url" @click.prevent="router.get(data.next_page_url, {}, { preserveScroll: true })"
        href="#" class="px-4 py-2 w-1/2 text-center hover:bg-sky-100">
        Berikutnya &raquo;
      </a>
      <span v-else class="px-4 py-2 w-1/2 text-center text-gray-400">
        Berikutnya &raquo;
      </span>
    </div>

    <div class="text-gray-600">
      Halaman {{ data.current_page }} dari {{ data.last_page }}
    </div>
  </div>

  <!-- Desktop: semua links -->
  <div v-if="data.links.length > 3" class="select-none hidden sm:flex justify-center col-span-2 mt-6">
    <nav class="inline-flex shadow-sm rounded-md overflow-hidden border border-gray-300 text-sm">
      <a v-for="(link, i) in data.links" :key="i" v-html="link.label" :href="link.url || '#'"
        @click.prevent="link.url && router.get(link.url, {}, { preserveScroll: true })" :class="[
          'px-3 py-2 border-r border-gray-300 hover:bg-sky-100 transition',
          {
            'bg-sky-500 text-white hover:bg-sky-600': link.active,
            'text-gray-600': !link.active,
          },
          { 'cursor-not-allowed text-gray-400': !link.url },
        ]" />
    </nav>
  </div>
</template>
