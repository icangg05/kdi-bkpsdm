<script setup lang="ts">
defineProps < {
  src?: string
} > ()
</script>

<template>
  <div class="select-none relative h-[22rem] lg:h-[30rem] bg-cover bg-center text-white flex items-center justify-center"
    :style="`background-image: url(${src ?? '/img/bg-video.jpg'})`">
    <!-- Overlay hitam -->
    <div class="absolute inset-0 bg-black/55 z-10"></div>

    <div class="pt-[5rem] lg:pt-[7rem] px-8 lg:px-0 relative container z-20 text-center">
      <slot />
    </div>
  </div>
</template>
