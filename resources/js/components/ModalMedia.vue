<script setup lang="ts">
// Memakai primitif Dialog dari reka-ui (sudah terpasang) supaya fokus
// terkunci di dalam modal, Esc menutup, dan scroll halaman ikut terkunci.
// Modal sebelumnya hanya div biasa tanpa satu pun dari perilaku itu.
import { X } from 'lucide-vue-next'
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
      <DialogOverlay class="fixed inset-0 z-[1000] bg-brand-900/80 backdrop-blur-sm" />
      <DialogContent
        class="fixed left-1/2 top-1/2 z-[1000] w-[min(64rem,calc(100vw-2rem))] max-h-[calc(100dvh-2rem)] -translate-x-1/2 -translate-y-1/2 overflow-y-auto rounded-card bg-white shadow-2xl">
        <slot />

        <div class="p-5 lg:p-6">
          <DialogTitle class="text-lg font-semibold text-ink">{{ judul }}</DialogTitle>
          <p v-if="tanggal" class="mt-1 text-sm text-ink-soft">{{ tanggal }}</p>
          <DialogDescription v-if="keterangan" class="mt-3 text-sm leading-relaxed text-ink-soft">
            {{ keterangan }}
          </DialogDescription>
        </div>

        <DialogClose
          class="absolute right-3 top-3 grid size-11 place-items-center rounded-full bg-brand-900/70 text-white transition hover:bg-brand-900"
          aria-label="Tutup">
          <X class="size-5" aria-hidden="true" />
        </DialogClose>
      </DialogContent>
    </DialogPortal>
  </DialogRoot>
</template>
