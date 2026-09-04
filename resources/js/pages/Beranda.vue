<script setup lang="ts">
import Galeri from '@/components/section/Galeri.vue';
import Hero from '@/components/section/Hero.vue';
import InformasiLayanan from '@/components/section/InformasiLayanan.vue';
import Publikasi from '@/components/section/Publikasi.vue';
import StatistikPegawai from '@/components/section/StatistikPegawai.vue';
import Survei from '@/components/section/Survei.vue';
import TeksBerjalan from '@/components/section/TeksBerjalan.vue';
import Video from '@/components/section/Video.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const props = usePage().props

// Semua daftar bisa kosong: isinya ditentukan admin lewat dashboard.
const berita = (props.berita ?? []) as any[]
const pengumuman = (props.pengumuman ?? []) as any[]
const ucapanSelamat = (props.ucapanSelamat ?? []) as any[]
const beritaDuka = (props.beritaDuka ?? []) as any[]
const foto = (props.foto ?? []) as any[]
const video = (props.video ?? []) as any[]
const statistik_asn = (props.statistik_asn ?? []) as any[]
const teks_berjalan = (props.teks_berjalan ?? null) as any
</script>

<template>

  <Head title="Beranda" />

  <AppLayout>
    <Hero />
    <TeksBerjalan :data="teks_berjalan" />

    <Publikasi :berita="berita" :pengumuman="pengumuman" :ucapan-selamat="ucapanSelamat"
      :berita-duka="beritaDuka" />

    <InformasiLayanan />

    <StatistikPegawai v-if="statistik_asn.length" :statistik_asn="statistik_asn" />

    <Galeri v-if="foto.length" :data="foto" />
    <Video v-if="video.length" :data="video" />

    <Survei />
  </AppLayout>
</template>
