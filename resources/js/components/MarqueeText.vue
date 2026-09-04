<template>
  <div ref="container" class="w-full overflow-hidden" :class="containerClass" @mouseenter="handleMouseEnter"
    @mouseleave="handleMouseLeave">
    <div class="marquee-track inline-flex whitespace-nowrap" :style="trackStyle">
      <div class="marquee-item pr-8" ref="item">
        <slot>{{ text }}</slot>
      </div>
      <div class="marquee-item pr-8" aria-hidden="true">
        <slot>{{ text }}</slot>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { useElementSize, usePreferredReducedMotion } from '@vueuse/core'
import { computed, ref } from 'vue'

interface Props {
  text?: string | number
  speed?: number // piksel per detik
  pauseOnHover?: boolean
  paused?: boolean
  className?: string
}

const props = withDefaults(defineProps<Props>(), {
  text: '',
  speed: 100,
  pauseOnHover: true,
  paused: false,
  className: '',
})

const container = ref<HTMLDivElement | null>(null)
const item = ref<HTMLDivElement | null>(null)
const hovered = ref(false)
const reduced = usePreferredReducedMotion()

// useElementSize memakai ResizeObserver, jadi lebar ikut terhitung ulang saat
// font selesai dimuat atau layar berubah, tanpa listener resize manual.
const { width: containerW } = useElementSize(container)
const { width: itemW } = useElementSize(item)

const containerClass = computed(() => props.className)

const duration = computed(() => {
  const distance = Math.max(itemW.value, containerW.value)
  const isMobile = containerW.value <= 768
  const base = props.speed > 0 ? props.speed : 100
  const kecepatan = isMobile ? base / 2 : base
  return kecepatan > 0 ? distance / kecepatan : 0
})

const berhenti = computed(
  () => reduced.value === 'reduce' || props.paused || (props.pauseOnHover && hovered.value),
)

const trackStyle = computed(
  () =>
    ({
      '--marquee-duration': `${duration.value}s`,
      animationPlayState: berhenti.value ? 'paused' : 'running',
    }) as Record<string, string>,
)

function handleMouseEnter() {
  hovered.value = true
}
function handleMouseLeave() {
  hovered.value = false
}
</script>

<style scoped>
@keyframes marquee-scroll {
  from {
    transform: translate3d(0, 0, 0);
  }

  to {
    transform: translate3d(-50%, 0, 0);
  }
}

.marquee-item {
  display: inline-block;
}

/* Selektor sebelumnya adalah `.inline-flex`, sehingga setiap elemen inline-flex
   di dalam slot ikut dianimasikan. Sekarang dikunci ke kelas milik track. */
.marquee-track {
  animation-name: marquee-scroll;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-duration: var(--marquee-duration, 10s);
  will-change: transform;
}

@media (prefers-reduced-motion: reduce) {
  .marquee-track {
    animation: none;
  }
}
</style>
