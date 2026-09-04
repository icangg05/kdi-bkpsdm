<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'
import { Mail, MapPin, Phone } from 'lucide-vue-next'

const page = usePage()
const pengaturan = page.props.pengaturan as any[]

const nilai = (nama: string) => pengaturan?.find((item: any) => item.nama_pengaturan == nama)?.value ?? null

const alamat = nilai('alamat')
const noHp = nilai('no_hp')
const emailDinas = nilai('email_dinas')
</script>

<template>
  <section v-if="alamat || noHp || emailDinas"
    class="relative isolate overflow-hidden rounded-card bg-brand-900 bg-cover bg-center p-5 text-white lg:p-6"
    style="background-image: url('/img/bg-galeri.jpg')">
    <!-- Gelapan padat, bukan kaca: kartu ini tampil di kolom terang dan harus
         tetap terbaca ketika transparansi dimatikan pengguna. -->
    <div class="absolute inset-0 -z-10 bg-brand-900/90" aria-hidden="true"></div>
    <div aria-hidden="true" class="absolute -right-10 -top-10 -z-10 size-40 rounded-full bg-gold-400/20 blur-3xl"></div>

    <h2 class="flex items-center gap-2.5 text-base font-semibold">
      <span class="h-4 w-1 rounded-full bg-gold-400" aria-hidden="true"></span>
      Informasi Kontak
    </h2>

    <ul class="mt-4 flex flex-col gap-3.5">
      <li v-if="alamat" class="flex items-start gap-3">
        <span class="grid size-9 shrink-0 place-items-center rounded-control bg-white/10">
          <MapPin class="size-4" aria-hidden="true" />
        </span>
        <span class="text-sm leading-relaxed text-brand-100">{{ alamat }}</span>
      </li>

      <li v-if="noHp" class="flex items-start gap-3">
        <span class="grid size-9 shrink-0 place-items-center rounded-control bg-white/10">
          <Phone class="size-4" aria-hidden="true" />
        </span>
        <a :href="`tel:${noHp}`" class="text-sm font-semibold transition hover:text-gold-400">{{ noHp }}</a>
      </li>

      <li v-if="emailDinas" class="flex items-start gap-3">
        <span class="grid size-9 shrink-0 place-items-center rounded-control bg-white/10">
          <Mail class="size-4" aria-hidden="true" />
        </span>
        <a :href="`mailto:${emailDinas}`" class="break-all text-sm transition hover:text-gold-400">
          {{ emailDinas }}
        </a>
      </li>
    </ul>
  </section>
</template>
