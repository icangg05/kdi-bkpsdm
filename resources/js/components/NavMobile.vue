<script setup lang="ts">
import { menu } from '@/constant'
import { Link } from '@inertiajs/vue3'
import { onKeyStroke } from '@vueuse/core'
import { X } from 'lucide-vue-next'

const props = defineProps({ isOpen: Boolean })
const emit = defineEmits(['close'])

function closeMenu() {
  emit('close')
}

// Esc menutup panel. Sebelumnya satu-satunya jalan keluar adalah menekan
// backdrop, yang tidak terjangkau keyboard.
onKeyStroke('Escape', () => {
  if (props.isOpen) closeMenu()
})
</script>

<template>
  <Transition name="fade">
    <div v-if="isOpen" class="fixed inset-0 z-[99998] bg-brand-900/80 backdrop-blur-sm" @click.self="closeMenu" />
  </Transition>

  <Transition name="slide">
    <div v-if="isOpen" id="menu-mobile" role="dialog" aria-modal="true" aria-label="Menu utama"
      class="fixed inset-y-0 right-0 z-[99999] w-4/5 max-w-sm overflow-y-auto bg-brand-900 p-5 text-white">
      <div class="flex justify-end">
        <button type="button" @click="closeMenu"
          class="grid size-11 place-items-center rounded-full transition hover:bg-white/10" aria-label="Tutup menu">
          <X class="size-6" aria-hidden="true" />
        </button>
      </div>

      <ul class="mt-2 space-y-1 text-base font-medium">
        <li v-for="item in menu" :key="item.label">
          <Link @click="closeMenu" :href="item.link"
            class="block rounded-control px-3 py-3 transition hover:bg-white/10 hover:text-gold-400">
          {{ item.label }}
          </Link>

          <ul v-if="item.items" class="mb-2 space-y-1 pl-3 text-sm text-brand-200">
            <li v-for="sub in item.items" :key="sub.label">
              <Link @click="closeMenu" :href="sub.link"
                class="block rounded-control px-3 py-2.5 transition hover:bg-white/10 hover:text-gold-400">
              {{ sub.label }}
              </Link>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </Transition>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
  transition: transform 0.35s cubic-bezier(0.22, 0.9, 0.3, 1);
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(100%);
}

@media (prefers-reduced-motion: reduce) {

  .slide-enter-active,
  .slide-leave-active {
    transition: none;
  }
}
</style>
