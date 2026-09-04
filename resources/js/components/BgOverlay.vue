<script setup lang="ts">
defineProps<{ src?: string }>()
</script>

<template>
  <div class="relative flex h-[22rem] items-center justify-center bg-brand-900 bg-cover bg-center text-white lg:h-[30rem]"
    :style="`background-image: url(${src ?? '/img/bg-video.jpg'})`">
    <!-- Gelapan latar. Dua lapis, senada hero beranda: rata brand-900/70 supaya
         teks putih lolos kontras di atas foto apa pun, plus gradien dari bawah
         agar batas ke seksi berikutnya tidak terasa terpotong. -->
    <div class="absolute inset-0 z-10 bg-brand-900/70" aria-hidden="true"></div>
    <div class="absolute inset-0 z-10 bg-gradient-to-t from-brand-900 via-transparent to-brand-900/40"
      aria-hidden="true"></div>

    <div class="container relative z-20 px-8 pt-[5rem] text-center lg:px-0 lg:pt-[7rem]">
      <slot />
    </div>
  </div>
</template>
