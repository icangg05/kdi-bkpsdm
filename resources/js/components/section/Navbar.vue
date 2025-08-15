<script setup lang="ts">
import { ref } from 'vue'
import { menu } from '@/constant';
import { Link, usePage } from '@inertiajs/vue3';
import { ChevronDown, Facebook, Info, Instagram, Menu, Phone, TwitterIcon, Youtube, X, Mail } from 'lucide-vue-next';
import NavMobile from '../NavMobile.vue';

const isMobileOpen = ref(false)
function toggleMobile() {
  isMobileOpen.value = !isMobileOpen.value
}

const page = usePage()
const pengaturan = page.props.pengaturan as any
const logo = page.props.logo

const no_hp           = pengaturan.find((item: any) => item.nama_pengaturan == 'no_hp')?.value
const email_dinas     = pengaturan.find((item: any) => item.nama_pengaturan == 'email_dinas')?.value
const jam_operasional = pengaturan.find((item: any) => item.nama_pengaturan == 'jam_operasional')?.value
const fb              = pengaturan.find((item: any) => item.nama_pengaturan == 'fb')?.value
const ig              = pengaturan.find((item: any) => item.nama_pengaturan == 'ig')?.value
const tt              = pengaturan.find((item: any) => item.nama_pengaturan == 'tt')?.value
const yt              = pengaturan.find((item: any) => item.nama_pengaturan == 'yt')?.value
</script>

<template>
  <div class="container absolute top-0 left-0 right-0 z-[990] text-white/85 select-none">
    <!-- Top nav -->
    <div class="py-2 hidden lg:block">
      <div class="flex justify-between items-center">
        <div>
          <div class="inline-flex items-center gap-2 mr-4">
            <Phone class="text-white size-3" />
            <span class="text-sm">Kontak : {{ no_hp }}</span>
          </div>
          <div class="inline-flex items-center gap-2 mr-4">
            <Mail class="text-white size-3" />
            <span class="text-sm">Email : {{ email_dinas }}</span>
          </div>
          <div class="inline-flex items-center gap-2">
            <Info class="text-white size-3" />
            <span class="text-sm">Jam Layanan : {{ jam_operasional }}</span>
          </div>
        </div>
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
    <nav class="mt-3 lg:mt-0 bg-black/15 backdrop-blur-md text-white/95">
      <div class="px-5 py-2 lg:py-1.5 lg:px-6 flex items-center justify-between">
        <!-- Logo -->
        <Link :href="route('beranda')" class="flex items-center gap-2">
        <img :src="logo ? `/storage/${logo}` : ''" alt="Logo" class="size-10 lg:size-14 w-auto" />
        <div class="flex flex-col">
          <h1 class="font-bold text-white text-xl lg:text-2xl">BKP<span class="text-sky-400">SDM</span></h1>
          <span class="-mt-1.5 text-xs lg:text-sm text-white/60 tracking-[0.09em] lg:tracking-[0.108em] font-medium">Kota Kendari</span>
        </div>
        </Link>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex items-center gap-8 uppercase text-sm font-medium">
          <li v-for="(item, index) in menu" :key="index">
            <Link :href="item.link" :class="[
              'relative group lg:py-5 hover:text-sky-300 transition ease-in-out inline-flex items-center space-x-2',
              page.url === item.link ? 'text-sky-400' : '',
              item.items ? '-mr-2.5 ' : ''
            ]">
            <span>{{ item.label }}</span>
            <ChevronDown class="size-4 text-white/70 group-hover:text-sky-400" v-if="item.items" />
            <ul v-if="item.items"
              class="min-w-36 group-hover:opacity-100 group-hover:pointer-events-auto opacity-0 pointer-events-none left-1/2 -translate-x-1/2 absolute z-[9999] top-[61px] bg-black/15 backdrop-blur-md text-white/90 transition ease-in-out duration-500">
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
        <button @click="toggleMobile" class="block lg:hidden">
          <Menu class="size-6 text-sky-500 hover:text-white/85 transition" />
        </button>
      </div>
    </nav>
  </div>

  <!-- Mobile Menu -->
  <NavMobile :is-open="isMobileOpen" @close="isMobileOpen = false" />
</template>
