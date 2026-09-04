<script setup lang="ts">
import Footer from '@/components/section/Footer.vue';
import Navbar from '@/components/section/Navbar.vue';
</script>

<template>

  <Navbar />

  <slot />

  <div class="mt-20">
    <Footer />
  </div>
</template>
