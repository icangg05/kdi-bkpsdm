<script setup lang="ts">
// Memakai primitif Dialog dari reka-ui (sudah terpasang) supaya fokus
// terkunci di dalam modal, Esc menutup, dan scroll halaman ikut terkunci.
// Modal sebelumnya hanya div biasa tanpa satu pun dari perilaku itu.
import { Calendar, X } from 'lucide-vue-next'
import {
  DialogClose,
  DialogContent,
  DialogDescription,
  DialogOverlay,
  DialogPortal,
  DialogRoot,
  DialogTitle,
} from 'reka-ui'

defineProps<{ open: boolean; judul?: string; keterangan?: string; tanggal?: string }>()
defineEmits<{ 'update:open': [value: boolean] }>()
</script>

<template>
  <DialogRoot :open="open" @update:open="$emit('update:open', $event)">
    <DialogPortal>
      <DialogOverlay
        class="fixed inset-0 z-[1000] bg-brand-900/85 backdrop-blur-sm data-[state=open]:animate-in data-[state=open]:fade-in-0 data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:duration-300 data-[state=closed]:duration-200" />

      <!-- Panel dibagi dua: panggung media gelap yang tetap di tempat, dan
           panel keterangan yang bergulir sendiri. Sebelumnya seluruh isi
           modal yang bergulir, sehingga tombol tutup ikut hilang ke atas
           begitu keterangan panjang digulir. -->
      <DialogContent
        class="fixed left-1/2 top-1/2 z-[1000] flex max-h-[calc(100dvh-2rem)] w-[min(64rem,calc(100vw-2rem))] -translate-x-1/2 -translate-y-1/2 flex-col overflow-hidden rounded-card bg-surface shadow-2xl ring-1 ring-white/15 data-[state=open]:animate-in data-[state=open]:fade-in-0 data-[state=open]:zoom-in-95 data-[state=open]:slide-in-from-bottom-2 data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=closed]:zoom-out-95 data-[state=closed]:slide-out-to-bottom-2 data-[state=open]:duration-300 data-[state=closed]:duration-200 data-[state=open]:ease-out data-[state=closed]:ease-in">
        <div class="relative isolate shrink-0 overflow-hidden bg-brand-900">
          <!-- Motif titik yang sama dengan seksi galeri, supaya bidang kosong
               di kiri-kanan foto potret tidak jadi bidang gelap polos. -->
          <div aria-hidden="true"
            class="absolute inset-0 -z-10 opacity-40 [background-image:radial-gradient(var(--color-brand-700)_1px,transparent_1px)] [background-size:22px_22px]">
          </div>
          <slot />

          <DialogClose
            class="absolute right-3 top-3 grid size-11 place-items-center rounded-full bg-brand-900/70 text-white ring-1 ring-white/30 backdrop-blur-sm transition hover:bg-brand-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white motion-reduce:transition-none"
            aria-label="Tutup">
            <X class="size-5" aria-hidden="true" />
          </DialogClose>
        </div>

        <div class="min-h-0 overflow-y-auto p-5 lg:p-6">
          <span class="block h-1 w-10 rounded-full bg-gold-500" aria-hidden="true"></span>
          <DialogTitle class="mt-3 text-lg font-semibold leading-snug text-ink lg:text-xl">{{ judul }}</DialogTitle>
          <p v-if="tanggal" class="mt-1.5 inline-flex items-center gap-1.5 text-sm text-ink-soft">
            <Calendar class="size-4" aria-hidden="true" />
            {{ tanggal }}
          </p>
          <DialogDescription v-if="keterangan" class="mt-3 text-sm leading-relaxed text-ink-soft">
            {{ keterangan }}
          </DialogDescription>
        </div>
      </DialogContent>
    </DialogPortal>
  </DialogRoot>
</template>
