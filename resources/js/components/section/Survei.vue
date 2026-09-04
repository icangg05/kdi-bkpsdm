<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';

const props = usePage().props as any
const link_survei = props.pengaturan.find((item: any) => item.nama_pengaturan == 'link_survei')?.value
</script>

<template>
  <div
    class="container bg-gradient-to-r from-sky-700 via-cyan-700 to-blue-900 lg:rounded-lg p-10 lg:p-12 flex flex-col md:flex-row items-center justify-between text-white shadow-lg">
    <div class="text-center lg:text-left">
      <h2 class="text-xl lg:text-2xl font-bold">Survei Kepuasan Masyarakat</h2>
      <p class="mt-2 text-sky-100 text-sm lg:text-base">
        Yuk, Isi Survei Singkat Ini untuk Bantu Kami Lebih Baik.
      </p>
    </div>
    <a :href="link_survei ?? '#'" target="_blank"
      class="mt-4 md:mt-0 bg-white text-sky-700 hover:bg-sky-100 text-sm lg:text-base font-semibold px-6 py-3 rounded transition duration-200 shadow-md">
      Klik di Sini untuk Survei
    </a>
  </div>
</template>
