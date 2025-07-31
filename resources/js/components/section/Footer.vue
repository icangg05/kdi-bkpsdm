<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { Facebook, Instagram, Twitter, Youtube } from 'lucide-vue-next';

const page = usePage()
const pengaturan = page.props.pengaturan as any

const alamat = pengaturan.find((item: any) => item.nama_pengaturan == 'alamat')?.value
const fb = pengaturan.find((item: any) => item.nama_pengaturan == 'fb')?.value
const ig = pengaturan.find((item: any) => item.nama_pengaturan == 'ig')?.value
const tt = pengaturan.find((item: any) => item.nama_pengaturan == 'tt')?.value
const yt = pengaturan.find((item: any) => item.nama_pengaturan == 'yt')?.value
</script>

<template>
  <footer class="bg-gray-900 text-gray-400 pt-12">
    <!-- Bagian Atas -->
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 pb-10 border-b border-gray-700">
      <!-- Logo dan Deskripsi -->
      <div class="flex flex-col items-start gap-4">
        <div class="flex items-center gap-2">
          <!-- Ganti dengan logo asli -->
          <img src="/img/logo.png" alt="Logo" class="size-17 w-auto" />
          <div class="leading-0">
            <h1 class="font-bold text-white text-2xl">BKP<span class="text-sky-400">SDM</span></h1>
            <span class="text-sm text-white/60">Kota Kendari</span>
          </div>
        </div>

        <p class="text-sm leading-relaxed max-w-sm">
          Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Kendari
          berkomitmen pada pelayanan yang profesional dan transparan.
        </p>
      </div>

      <!-- Alamat -->
      <div>
        <h3 class="text-white font-semibold mb-3">Alamat</h3>
        <p class="text-sm leading-relaxed">
          {{ alamat }}
        </p>
      </div>

      <!-- Sosial Media -->
      <div>
        <h3 class="text-white font-semibold mb-3">Ikuti Kami</h3>
        <div class="flex gap-4 text-white">
          <a :href="fb" target="_blank" class="hover:text-yellow-400 transition">
            <Facebook class="w-5 h-5" />
          </a>
          <a :href="tt" target="_blank" class="hover:text-yellow-400 transition">
            <Twitter class="w-5 h-5" />
          </a>
          <a :href="yt" target="_blank" class="hover:text-yellow-400 transition">
            <Youtube class="w-5 h-5" />
          </a>
          <a :href="ig" target="_blank" class="hover:text-yellow-400 transition">
            <Instagram class="w-5 h-5" />
          </a>
        </div>
      </div>
    </div>

    <!-- Bagian Bawah -->
    <div class="container text-center text-sm text-gray-400 py-6">
      &copy; {{ new Date().getFullYear() }} BKPSDM Kota Kendari. Seluruh hak cipta dilindungi.<br />
      <span class="text-xs text-gray-500">Dikembangkan oleh Dinas Kominfo Kota Kendari</span>
    </div>
  </footer>
</template>
