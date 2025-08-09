<script setup lang="ts">
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
</script>

<template>

  <Head title="Beranda" />

  <AppLayout>
    <Hero />
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
