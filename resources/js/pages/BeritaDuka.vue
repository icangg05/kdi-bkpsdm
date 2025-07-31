<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'
import CardRecentPost from '@/components/CardRecentPost.vue';
import CardBerita from '@/components/CardBerita.vue';
import CardKategori from '@/components/CardKategori.vue';
import CardKontak from '@/components/CardKontak.vue';
import BgOverlay from '@/components/BgOverlay.vue';

const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda')
  },
  {
    label: 'Publikasi',
    link: '#',
  },
  {
    label: 'Berita Duka',
    link: route('berita-duka')
  },
]
</script>

<template>

  <Head title="Berita" />

  <AppLayout>
    <BgOverlay src="https://static.vecteezy.com/system/resources/thumbnails/011/188/042/small/3d-realistic-style-megaphone-illustration-on-blue-banner-background-concept-of-join-us-job-vacancy-and-announcement-in-modern-flat-cartoon-style-design-vector.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">
          Berita Duka
        </h2>
        <span
          class="pointer-events-none etext-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
      </div>
      <div class="flex">
        <Breadcrumb class="mx-auto mt-4 lg:mt-5 text-white/85">
          <BreadcrumbList>
            <BreadcrumbItem v-for="(item, index) in breadcrumbItems" :key="index">
              <BreadcrumbLink :href="item.link" class="hover:underline text-sm lg:text-base">
                {{ item.label }}
              </BreadcrumbLink>
              <BreadcrumbSeparator v-if="breadcrumbItems.length - 1 != index" class="ml-0.5 text-sky-400" />
            </BreadcrumbItem>
          </BreadcrumbList>
        </Breadcrumb>
      </div>
    </BgOverlay>

    <!-- Berita konten -->
    <div class="mt-[3rem] lg:mt-[6rem] container">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-16">
        <!-- Konten Berita Utama -->
        <div class="lg:col-span-2 space-y-10">
          <div class="grid grid-cols-2 gap-6">
            <div v-for="(item, index) in 4" :key="index">
              <CardBerita />
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-10">
          <!-- Recent Posts -->
          <CardRecentPost />

          <!-- Have Any Question -->
          <CardKontak />

          <!-- Categories -->
          <CardKategori />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
