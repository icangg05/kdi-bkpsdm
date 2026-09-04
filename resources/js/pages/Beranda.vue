<script setup lang="ts">
import MarqueeText from '@/components/MarqueeText.vue';
import Galeri from '@/components/section/Galeri.vue';
import Hero from '@/components/section/Hero.vue';
import InformasiLayanan from '@/components/section/InformasiLayanan.vue';
import PublikasiTabs from '@/components/section/Publikasi.vue';
import StatistikPegawai from '@/components/section/StatistikPegawai.vue';
import Survei from '@/components/section/Survei.vue';
import Video from '@/components/section/Video.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const props = usePage().props

const berita = props.berita
const pengumuman = props.pengumuman
const ucapanSelamat = props.ucapanSelamat
const beritaDuka = props.beritaDuka

const foto = props.foto as any
const video = props.video as any
const statistik_asn = props.statistik_asn
const teks_berjalan = props.teks_berjalan as any
</script>

<template>

  <Head title="Beranda" />

  <AppLayout>
    <Hero />

    <div class="lg:container py-12 pb-0 lg:pb-4">
      <div
        class="relative overflow-hidden lg:rounded-xl shadow-lg bg-gradient-to-r from-sky-700 via-cyan-700 to-blue-900 border border-white/20">
        <!-- Glow effect -->
        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>

        <!-- Marquee content -->
        <div v-if="teks_berjalan.visibility == '1'" class="relative py-4 px-3 lg:px-6">
          <MarqueeText :speed="teks_berjalan.duration" className="text-white font-semibold text-sm lg:text-base tracking-wide">
            <span class="ml-50"></span>
            <span class="mx-4" v-for="(item, i) in teks_berjalan.items.split('###')" :key="i">{{ item }}</span>
          </MarqueeText>
        </div>

        <!-- Decorative bottom border -->
        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-400 via-sky-500 to-sky-600"></div>
      </div>
    </div>

    <PublikasiTabs :berita="berita" :pengumuman="pengumuman" :ucapanSelamat="ucapanSelamat" :beritaDuka="beritaDuka" />
    <div class="grid gap-y-20 md:gap-y-20">
      <InformasiLayanan />
      <StatistikPegawai :statistik_asn="statistik_asn" />
      <Video v-if="video.length > 0" :data="video" />
      <Galeri v-if="foto.length > 0" :data="foto" />
      <Survei />
    </div>
  </AppLayout>
</template>
