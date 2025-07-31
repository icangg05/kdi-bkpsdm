<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { ChevronDown, Facebook, Info, Instagram, Menu, Phone, TwitterIcon, Youtube } from 'lucide-vue-next';

const page = usePage()
const pengaturan = page.props.pengaturan as any

const no_hp = pengaturan.find((item: any) => item.nama_pengaturan == 'no_hp')?.value
const jam_operasional = pengaturan.find((item: any) => item.nama_pengaturan == 'jam_operasional')?.value
const fb = pengaturan.find((item: any) => item.nama_pengaturan == 'fb')?.value
const ig = pengaturan.find((item: any) => item.nama_pengaturan == 'ig')?.value
const tt = pengaturan.find((item: any) => item.nama_pengaturan == 'tt')?.value
const yt = pengaturan.find((item: any) => item.nama_pengaturan == 'yt')?.value

const menu = [
  {
    label: 'Beranda',
    link: route('beranda'),
  },
  {
    label: 'Profil',
    link: '#',
    items: [
      {
        label: 'Logo BKPSDM',
        link: route('profil', 'logo'),
      },
      {
        label: 'Sejarah BKPSDM',
        link: route('profil', 'sejarah'),
      },
      {
        label: 'Struktur Organisasi',
        link: route('profil', 'struktur-organisasi'),
      },
      {
        label: 'Profil Pejabat',
        link: route('profil', 'pejabat'),
      },
    ]
  },
  {
    label: 'Publikasi',
    link: '#',
    items: [
      {
        label: 'Berita',
        link: route('publikasi.index', 'berita'),
      },
      {
        label: 'Pengumuman',
        link: route('publikasi.index', 'pengumuman'),
      },
      {
        label: 'Statistik Pegawai',
        link: route('statistik-pegawai'),
      },
      {
        label: 'Ucapan Selamat',
        link: route('publikasi.index', 'ucapan-selamat'),
      },
      {
        label: 'Berita Duka',
        link: route('publikasi.index', 'berita-duka')
      }
    ]
  },
  {
    label: 'Layanan',
    link: route('layanan'),
  },
  {
    label: 'Regulasi',
    link: route('regulasi', 'all')
  },
  {
    label: 'Galeri',
    link: '#',
    items: [
      {
        label: 'Foto',
        link: route('galeri-foto'),
      },
      {
        label: 'Video',
        link: route('galeri-video'),
      },
    ]
  },
  {
    label: 'Hubungi Kami',
    link: route('hubungi-kami')
  },
]

</script>

<template>
  <div class="container absolute top-0 left-0 right-0 z-[990] text-white/85">
    <!-- Top nav -->
    <div class="py-2 hidden lg:block">
      <div class="flex justify-between items-center">
        <!-- Left -->
        <div>
          <div class="inline-flex items-center gap-2 mr-4">
            <span>
              <Phone class="text-white size-3" />
            </span>
            <span class="text-sm">Kontak : {{ no_hp }}</span>
          </div>
          <div class="inline-flex items-center gap-2">
            <span>
              <Info class="text-white size-3" />
            </span>
            <span class="text-sm">Jam Layanan : {{ jam_operasional }}</span>
          </div>
        </div>

        <!-- Right -->
        <div class="inline-flex items-center gap-5">
          <a :href="fb" target="_blank">
            <Facebook class="size-4" />
          </a>
          <a :href="tt" target="_blank">
            <TwitterIcon class="size-4" />
          </a>
          <a :href="yt" target="_blank">
            <Youtube class="size-4" />
          </a>
          <a :href="ig" target="_blank">
            <Instagram class="size-4" />
          </a>
        </div>
      </div>
    </div>

    <!-- Navbar -->
    <nav class="mt-3 lg:mt-0 bg-white/5 backdrop-blur-md text-white/90">
      <div class="px-5 py-2 lg:py-0 lg:px-6 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-2">
          <!-- Ganti dengan logo asli -->
          <img src="/img/logo.png" alt="Logo" class="size-10 w-auto" />
          <div class="leading-0">
            <h1 class="font-bold text-white text-xl">BKP<span class="text-sky-400">SDM</span></h1>
            <span class="text-xs text-white/60">Kota Kendari</span>
          </div>
        </div>

        <!-- Navigation Menu -->
        <ul class="hidden lg:flex items-center gap-8 uppercase text-sm font-medium">
          <li v-for="(item, index) in menu" :key="index">
            <Link :href="item.link" :class="[
              'relative group lg:py-5 hover:text-sky-400 transition ease-in-out inline-flex items-center space-x-2',
              page.url === item.link
                ? 'text-sky-400'
                : '',
              item.items ? '-mr-2.5 ' : ''
            ]">

            <span>{{ item.label }}</span>
            <ChevronDown class="size-4 text-white/70 group-hover:text-sky-400" v-if="item.items" />

            <ul v-if="item.items"
              class="min-w-36 group-hover:opacity-100 group-hover:pointer-events-auto opacity-0 pointer-events-none left-1/2 -translate-x-1/2 absolute top-[61px] bg-white/15 backdrop-blur-md text-white/90 transition ease-in-out duration-500">
              <li v-for="(sub, subIndex) in item.items" :key="subIndex" :class="{
                'pt-3': subIndex === 0,
                'pb-3': subIndex === item.items.length - 1
              }">
                <Link :href="sub.link"
                  class="text-sm block px-6 py-3 text-nowrap transition ease-in-out hover:text-sky-400">
                {{ sub.label }}
                </Link>
              </li>

            </ul>
            </Link>
          </li>
        </ul>

        <!-- Mobile hamburger -->
        <Menu class="block lg:hidden size-6 text-sky-500 transition ease-in-out hover:text-white/85" />
      </div>
    </nav>
  </div>

</template>
