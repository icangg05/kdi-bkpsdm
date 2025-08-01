<script setup>
import { Link, router } from '@inertiajs/vue3'
import {
  LayoutGrid,
  FileText,
  HeartCrack,
  TrendingUp,
  Briefcase,
  Shuffle,
  BookOpen,
  Clock,
  FileBadge,
  ClipboardList,
  BadgePlus,
} from 'lucide-vue-next'

const layanan = [
  {
    label: 'Cuti ASN',
    desc: 'Alur Pengajuan cuti bagi PNS dan PPPK',
    link: route('layanan.detail', 'cuti-asn'),
    icon: FileText,
    is_blank: false
  },
  {
    label: 'Cerai',
    desc: 'Pengurusan izin perceraian ASN sesuai peraturan',
    link: route('layanan.detail', 'cerai'),
    icon: HeartCrack,
    is_blank: false
  },
  {
    label: 'Kenaikan Pangkat',
    desc: 'Layanan kenaikan pangkat dan inpassing pensiun',
    link: route('layanan.detail', 'kenaikan-pangkat'),
    icon: TrendingUp,
    is_blank: false
  },
  {
    label: 'Jabatan Fungsional',
    desc: 'Informasi dan pembinaan jabatan fungsional ASN',
    link: route('layanan.detail', 'jabatan-fungsional'),
    icon: Briefcase,
    is_blank: false
  },
  {
    label: 'Mutasi Pegawai',
    desc: 'Proses mutasi antar unit kerja atau instansi',
    link: route('layanan.detail', 'mutasi-pegawai'),
    icon: Shuffle,
    is_blank: false
  },
  {
    label: 'Tugas Belajar',
    desc: 'Ketentuan dan proses pengajuan tugas belajar ASN',
    link: route('layanan.detail', 'tugas-belajar'),
    icon: BookOpen,
    is_blank: false
  },
  {
    label: 'Absensi Online',
    desc: 'Sistem absensi digital ASN Kota Kendari',
    link: 'https://asn.kendarikota.go.id',
    icon: Clock,
    is_blank: true
  },
  {
    label: 'TPPNS',
    desc: 'Tambahan Penghasilan Pegawai (TPP) bagi ASN Kota Kendari',
    link: 'https://sitppns.kendarikota.go.id',
    icon: FileBadge,
    is_blank: true
  },
  {
    label: 'Konsultasi Kinerja',
    desc: 'Evaluasi dan penyusunan SKP ASN yang efektif',
    link: route('layanan.detail', 'konsultasi-kinerja'),
    icon: ClipboardList,
  },
  {
    label: 'COC Manajemen ASN',
    desc: 'Manajemen kode etik dan perilaku ASN (COC)',
    link: route('layanan.detail', 'coc-manajemen-asn'),
    icon: BadgePlus,
  },
]

function toPage(link, isBlank) {
  if (!isBlank)
    return router.visit(link)
  else
    window.open(link, '_blank')
}
</script>

<template>
  <section id="layanan" class="relative bg-black/70 select-none">
    <!-- Gambar background dengan filter grayscale -->
    <div class="absolute inset-0">
      <img
        src="https://images.unsplash.com/photo-1669295384050-a1d4357bd1d7?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        class="w-full h-full object-cover filter grayscale" alt="Background" />
      <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <div class="relative z-10 container py-20 text-white/85">
      <div>
        <LayoutGrid class="size-10 lg:size-12" />
        <h2 class="mt-3 mb-3 text-2xl lg:text-3xl font-bold">Informasi Layanan</h2>
        <p class="text-sm mb-8 max-w-xl">
          Temukan informasi lengkap tentang layanan kepegawaian yang disediakan oleh BKPSDM Kota Kendari. Setiap layanan
          dirancang untuk mendukung transparansi, efisiensi, dan kemudahan akses bagi ASN.
        </p>
      </div>

      <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
        <span v-for="(item, index) in layanan" :key="index" @click="toPage(item.link, item.is_blank)"
          class="cursor-pointer text-center p-6 bg-white/5 backdrop-blur-md hover:bg-white/10 transition ease-in-out rounded-md">
          <div class="flex justify-center mb-2">
            <component :is="item.icon" class="text-sky-500 size-10" />
          </div>
          <p class="font-bold text-sm lg:text-lg">{{ item.label }}</p>
          <p class="mt-1 text-xs lg:text-sm opacity-80">{{ item.desc }}</p>
        </span>
      </div>
    </div>
  </section>
</template>
