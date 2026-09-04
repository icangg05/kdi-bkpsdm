<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import NavMobile from '@/components/NavMobile.vue';
import { menu } from '@/constant';
import { Link, usePage } from '@inertiajs/vue3';
import { ChevronDown, Clock, Facebook, Instagram, Mail, Menu, Phone, Twitter, Youtube } from 'lucide-vue-next';
import { computed, ref } from 'vue';

const isMobileOpen = ref(false)

const page = usePage()
const ambil = (nama: string) =>
  (page.props.pengaturan as any[])?.find((item) => item.nama_pengaturan == nama)?.value || null

const noHp = ambil('no_hp')
const emailDinas = ambil('email_dinas')
const jamOperasional = ambil('jam_operasional')

const sosial = computed(() =>
  [
    { nama: 'Facebook', icon: Facebook, link: ambil('fb') },
    { nama: 'Twitter', icon: Twitter, link: ambil('tt') },
    { nama: 'YouTube', icon: Youtube, link: ambil('yt') },
    { nama: 'Instagram', icon: Instagram, link: ambil('ig') },
  ].filter((item) => item.link && item.link !== '#'),
)
</script>

<template>
  <!-- Scrim tipis di belakang navbar: gambar slider diunggah admin, jadi
       tidak ada jaminan bagian atasnya cukup gelap untuk teks putih. -->
  <div
    class="absolute inset-x-0 top-0 z-[990] bg-gradient-to-b from-brand-900/75 via-brand-900/35 to-transparent px-4 pb-10 text-white lg:px-[4%]">
    <!-- Baris kontak -->
    <div class="hidden py-2 xl:block">
      <div class="flex items-center justify-between">
        <ul class="flex items-center gap-6 text-sm text-white/85">
          <li v-if="noHp" class="inline-flex items-center gap-2">
            <Phone class="size-3.5" aria-hidden="true" />
            <a :href="`tel:${noHp}`" class="hover:text-white hover:underline">{{ noHp }}</a>
          </li>
          <li v-if="emailDinas" class="inline-flex items-center gap-2">
            <Mail class="size-3.5" aria-hidden="true" />
            <a :href="`mailto:${emailDinas}`" class="hover:text-white hover:underline">{{ emailDinas }}</a>
          </li>
          <li v-if="jamOperasional" class="inline-flex items-center gap-2">
            <Clock class="size-3.5" aria-hidden="true" />
            <span>{{ jamOperasional }}</span>
          </li>
        </ul>

        <ul v-if="sosial.length" class="flex items-center">
          <li v-for="item in sosial" :key="item.nama">
            <!-- Target sentuh 44px. Sebelumnya ikon 16px tanpa padding. -->
            <a :href="item.link" target="_blank" rel="noopener noreferrer"
              class="grid size-11 place-items-center rounded-full transition hover:bg-white/10"
              :aria-label="`${item.nama} BKPSDM Kota Kendari (tab baru)`">
              <component :is="item.icon" class="size-4" aria-hidden="true" />
            </a>
          </li>
        </ul>
      </div>
    </div>

    <nav class="mt-3 bg-brand-900/35 backdrop-blur-md xl:mt-0" aria-label="Menu utama">
      <div class="flex items-center justify-between px-4 py-2 xl:px-6">
        <AppLogo ringkas />

        <ul class="hidden items-center gap-7 text-sm font-medium uppercase xl:flex">
          <!-- Submenu dulu berada di dalam elemen <a> induknya, yang tidak sah
               sebagai HTML dan menyembunyikannya dari keyboard. Sekarang jadi
               saudara kandung, dan ikut terbuka saat menerima fokus. -->
          <li v-for="item in menu" :key="item.label" class="group relative">
            <Link :href="item.link" :class="[
              'inline-flex items-center gap-1.5 py-5 transition hover:text-gold-400',
              page.url === item.link ? 'text-gold-400' : '',
            ]" :aria-current="page.url === item.link ? 'page' : undefined">
            <span>{{ item.label }}</span>
            <ChevronDown v-if="item.items" class="size-4 text-white/70" aria-hidden="true" />
            </Link>

            <ul v-if="item.items"
              class="pointer-events-none absolute left-1/2 top-full min-w-44 -translate-x-1/2 bg-brand-900/95 py-2 opacity-0 backdrop-blur-md transition duration-200 group-hover:pointer-events-auto group-hover:opacity-100 group-focus-within:pointer-events-auto group-focus-within:opacity-100">
              <li v-for="sub in item.items" :key="sub.label">
                <Link :href="sub.link"
                  class="block whitespace-nowrap px-5 py-2.5 text-sm normal-case transition hover:bg-white/10 hover:text-gold-400">
                {{ sub.label }}
                </Link>
              </li>
            </ul>
          </li>
        </ul>

        <button type="button" @click="isMobileOpen = true"
          class="grid size-11 place-items-center rounded-control xl:hidden" aria-label="Buka menu"
          :aria-expanded="isMobileOpen">
          <Menu class="size-6" aria-hidden="true" />
        </button>
      </div>
    </nav>
  </div>

  <NavMobile :is-open="isMobileOpen" @close="isMobileOpen = false" />
</template>
