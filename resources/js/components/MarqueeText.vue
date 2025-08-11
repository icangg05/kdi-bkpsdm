<template>
  <div ref="container" class="overflow-hidden w-full" :class="containerClass" @mouseenter="handleMouseEnter"
    @mouseleave="handleMouseLeave">
    <div ref="track" class="inline-flex whitespace-nowrap will-change-transform" :style="trackStyle">
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
import { ref, onMounted, watch, nextTick, computed } from 'vue'

interface Props {
  text?: string | number
  speed?: number // pixels per second
  pauseOnHover?: boolean
  className?: string
}

const props = withDefaults(defineProps<Props>(), {
  text: '',
  speed: 100,
  pauseOnHover: true,
  className: ''
})

const container = ref<HTMLDivElement | null>(null)
const track = ref<HTMLDivElement | null>(null)
const item = ref<HTMLDivElement | null>(null)
const animating = ref(true)
const duration = ref(0)

const containerClass = computed(() => props.className)

function calc() {
  if (!container.value || !item.value) return
  const containerW = container.value.getBoundingClientRect().width
  const itemW = item.value.getBoundingClientRect().width
  const distance = Math.max(itemW, containerW)

  // Deteksi mobile: kalau <= 768px lebar layar
  const isMobile = window.innerWidth <= 768
  const baseSpeed = props.speed > 0 ? props.speed : 100
  const adjustedSpeed = isMobile ? baseSpeed / 2 : baseSpeed

  duration.value = adjustedSpeed > 0 ? distance / adjustedSpeed : 0
}

// function calc() {
//   if (!container.value || !item.value) return
//   const containerW = container.value.getBoundingClientRect().width
//   const itemW = item.value.getBoundingClientRect().width
//   const distance = Math.max(itemW, containerW)
//   duration.value = props.speed > 0 ? distance / props.speed : 0
// }

onMounted(async () => {
  await nextTick()
  calc()
  window.addEventListener('resize', calc)
})

watch(() => props.text, async () => {
  await nextTick()
  calc()
})

const trackStyle = computed(() => ({
  '--marquee-duration': `${duration.value}s`,
  animationPlayState: animating.value ? 'running' : 'paused'
} as Record<string, string>))

function handleMouseEnter() {
  if (props.pauseOnHover) animating.value = false
}
function handleMouseLeave() {
  if (props.pauseOnHover) animating.value = true
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

[ref="track"],
.inline-flex {
  animation-name: marquee-scroll;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-duration: var(--marquee-duration, 10s);
}
</style>
