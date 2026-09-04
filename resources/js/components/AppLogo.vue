<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage()
// const logo = page.props.logo
const logo = '/img/logo-bkpsdm.png'
</script>

<template>
  <Link :href="route('beranda')" class="flex items-center gap-2">
  <img :src="logo" alt="Logo" class="size-10.5 lg:size-14 w-auto" />
  <div class="flex flex-col">
    <span class="-mt-1.5 text-[10px] lg:text-xs text-white/80 font-medium">
      PEMERINTAH KOTA KENDARI
    </span>
    <h1 class="font-bold text-white text-xs lg:text-[15px] leading-none">BADAN KEPEGAWAIAN DAN<br/>PENGEMBANGAN SUMBER DAYA MANUSIA</h1>
  </div>
  </Link>
</template>
