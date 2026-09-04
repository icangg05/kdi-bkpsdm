<script setup lang="ts">
import Footer from '@/components/section/Footer.vue';
import Navbar from '@/components/section/Navbar.vue';
</script>

<template>
  <a href="#konten-utama"
    class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[999] focus:rounded-control focus:bg-white focus:px-4 focus:py-2.5 focus:text-sm focus:font-semibold focus:text-brand-800 focus:shadow-lg">
    Lompat ke konten utama
  </a>

  <Navbar />

  <main id="konten-utama">
    <slot />
  </main>

  <Footer />
</template>
