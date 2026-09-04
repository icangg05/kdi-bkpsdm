<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <!-- Sebelumnya baris nama instansi memakai <h1>, sehingga setiap halaman
       punya dua h1: satu di navbar dan satu di isi halaman. -->
  <Link :href="route('beranda')" class="flex items-center gap-2.5">
  <img src="/img/logo-bkpsdm.png" alt="Logo BKPSDM Kota Kendari" width="56" height="56"
    class="size-10.5 w-auto lg:size-14" />
  <span class="flex flex-col">
    <span class="text-[10px] font-medium uppercase text-white/80 lg:text-xs">
      Pemerintah Kota Kendari
    </span>
    <span class="text-xs font-bold uppercase leading-tight text-white lg:text-[15px]">
      Badan Kepegawaian dan<br />Pengembangan Sumber Daya Manusia
    </span>
  </span>
  </Link>
</template>
