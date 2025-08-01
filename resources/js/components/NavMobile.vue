<script setup lang="ts">
// import { defineProps, defineEmits } from 'vue'
import { menu } from '@/constant'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  isOpen: Boolean
})
const emit = defineEmits(['close'])

function closeMenu() {
  emit('close')
}
</script>

<template>
  <!-- Animated backdrop -->
  <Transition name="fade">
    <div
      v-if="isOpen"
      class="fixed inset-0 z-[99998] bg-black/80 backdrop-blur-md"
      @click.self="closeMenu"
    />
  </Transition>

  <!-- Animated sliding panel -->
  <Transition name="slide">
    <div
      v-if="isOpen"
      class="fixed inset-y-0 right-0 w-4/5 max-w-sm z-[99999] bg-white/5 backdrop-blur-md text-white p-6 overflow-y-auto"
    >
      <!-- Close button -->
      <div class="flex justify-end mb-4">
        <button @click="closeMenu" class="text-white hover:text-sky-400 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

      <!-- Menu items -->
      <ul class="space-y-6 text-base font-medium">
        <li v-for="(item, index) in menu" :key="index">
          <Link @click="closeMenu" :href="item.link" class="block hover:text-sky-400">
            {{ item.label }}
          </Link>

          <ul v-if="item.items" class="mt-2 pl-4 space-y-2 text-sm text-white/80">
            <li v-for="(sub, subIndex) in item.items" :key="subIndex">
              <Link @click="closeMenu" :href="sub.link" class="block hover:text-sky-400">
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
/* Fade for backdrop */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}

/* Slide for panel */
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.4s ease;
}
.slide-enter-from {
  transform: translateX(100%);
}
.slide-enter-to {
  transform: translateX(0%);
}
.slide-leave-from {
  transform: translateX(0%);
}
.slide-leave-to {
  transform: translateX(100%);
}
</style>
