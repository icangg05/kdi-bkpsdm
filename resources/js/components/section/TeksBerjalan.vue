<script setup lang="ts">
import MarqueeText from '@/components/MarqueeText.vue'
import { usePreferredReducedMotion } from '@vueuse/core'
import { Megaphone, Pause, Play } from 'lucide-vue-next'
import { computed, ref } from 'vue'

const props = defineProps<{
  data: { visibility?: string | boolean; duration?: number; items?: string } | null
}>()

const items = computed(() =>
  (props.data?.items ?? '')
    .split('###')
    .map((teks) => teks.trim())
    .filter(Boolean),
)

const tampil = computed(
  () => String(props.data?.visibility) === '1' || props.data?.visibility === true,
)

const dijeda = ref(false)
const reduced = usePreferredReducedMotion()
</script>

<template>
  <section v-if="tampil && items.length" class="bg-brand-800 text-white" aria-label="Informasi terkini">
    <div class="container flex items-center gap-4 py-3">
      <p class="flex shrink-0 items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gold-400">
        <Megaphone class="size-4" aria-hidden="true" />
        <span class="hidden sm:inline">Info Terkini</span>
      </p>

      <!-- Saat pengguna meminta pengurangan gerak, teks tidak berjalan sehingga
           harus tampil utuh sebagai daftar, bukan terpotong di dalam track. -->
      <ul v-if="reduced === 'reduce'" class="min-w-0 flex-1 space-y-1 text-sm">
        <li v-for="(teks, i) in items" :key="i">{{ teks }}</li>
      </ul>

      <MarqueeText v-else :speed="data?.duration" :paused="dijeda" class-name="min-w-0 flex-1 text-sm">
        <span v-for="(teks, i) in items" :key="i" class="mx-6">{{ teks }}</span>
      </MarqueeText>

      <button v-if="reduced !== 'reduce'" type="button" @click="dijeda = !dijeda"
        class="grid size-11 shrink-0 place-items-center rounded-full text-white/80 transition hover:bg-white/10 hover:text-white"
        :aria-label="dijeda ? 'Jalankan teks berjalan' : 'Jeda teks berjalan'">
        <component :is="dijeda ? Play : Pause" class="size-4" />
      </button>
    </div>
  </section>
</template>
