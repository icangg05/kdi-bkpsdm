<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const pengaturan = page.props.pengaturan as any

const alamat = pengaturan.find((item: any) => item.nama_pengaturan == 'alamat')?.value
const no_hp = pengaturan.find((item: any) => item.nama_pengaturan == 'no_hp')?.value
const email_dinas = pengaturan.find((item: any) => item.nama_pengaturan == 'email_dinas')?.value
</script>

<template>
  <div class="bg-[url('/img/bg-galeri.jpg')] bg-cover bg-center text-white rounded-lg p-6 shadow-md">
    <div class="bg-black/70 p-5 rounded-lg space-y-3">
      <h4 class="text-lg font-semibold">Informasi Kontak</h4>
      <p class="text-sm text-white/80">{{ alamat }}</p>
      <p class="text-sm font-semibold text-white">{{ no_hp }}</p>
      <p class="text-white text-sm">{{ email_dinas }}</p>
    </div>
  </div>
</template>
