<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

// `ringkas` dipakai navbar: di layar sempit nama instansi penuh memakan tiga
// baris di samping tombol menu. Footer tetap menulis nama lengkapnya, di sana
// ruangnya ada dan nama resmi memang tempatnya di situ.
withDefaults(defineProps<{ ringkas?: boolean }>(), { ringkas: false });
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

    <!-- Akronim untuk mata, nama lengkap tetap untuk pembaca layar. -->
    <span v-if="ringkas" class="lg:hidden">
      <span class="text-sm font-bold uppercase tracking-[0.2em] text-white" aria-hidden="true">BKPSDM</span>
      <span class="sr-only">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</span>
    </span>

    <span class="text-xs font-bold uppercase leading-tight text-white lg:text-[15px]"
      :class="ringkas && 'hidden lg:block'">
      Badan Kepegawaian dan<br />Pengembangan Sumber Daya Manusia
    </span>
  </span>
  </Link>
</template>
