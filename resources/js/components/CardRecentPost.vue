<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Calendar } from 'lucide-vue-next';

defineProps<{ data: any }>()
</script>

<template>
  <section class="rounded-card bg-white p-5 ring-1 ring-line">
    <h2 class="flex items-center gap-2.5 text-base font-semibold text-ink">
      <span class="h-4 w-1 rounded-full bg-gold-500" aria-hidden="true"></span>
      Publikasi Terbaru
    </h2>

    <ul class="mt-4 divide-y divide-line">
      <li v-for="item in data" :key="item.slug" class="py-3 first:pt-0 last:pb-0">
        <Link :href="route('berita.show', item.slug)" class="group block">
        <span class="line-clamp-2 text-sm font-semibold leading-snug text-ink transition group-hover:text-brand-700">
          {{ item.judul }}
        </span>
        <span class="mt-1.5 inline-flex items-center gap-1.5 text-xs text-ink-soft">
          <Calendar class="size-3.5" aria-hidden="true" />
          {{ item.tanggal }}
        </span>
        </Link>
      </li>
    </ul>
  </section>
</template>
