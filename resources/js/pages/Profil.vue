<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { convertOembed, getOriginalFilename } from '@/lib/utils';

const page = usePage()
const title = page.props.title as string
const slug = page.props.slug as string
const data = page.props.data as any

const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda'),
  },
  {
    label: 'Profil',
    link: '#',
  },
  {
    label: title,
    link: '#',
  },
];
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-profil.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide text-white">
          {{ title }}
        </h2>
        <span
          class="pointer-events-none text-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">
          BKPSDM
        </span>
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

    <!-- Konten Dinamis -->
    <section v-if="data" class="py-8 lg:py-12 px-0 lg:px-4 max-w-6xl mx-auto">
      <div v-if="slug === 'logo'" class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 uppercase">Logo Portrait</h3>
        <img :src="`/storage/${data.gambar}`" alt="Logo BKN" class="w-50 lg:w-60 mx-auto mb-6" />
        <div v-if="data.lampiran" class="text-center">
          <a :href="`/storage/${data.lampiran}`" target="_blank"
            class="inline-block bg-sky-700 text-white text-sm px-6 py-2 rounded-md shadow hover:bg-sky-800"
            onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;">
            {{ getOriginalFilename(data.lampiran) }}
          </a>
        </div>
        <div class="mt-6 custom-prose" v-html="convertOembed(data.isi ?? '')" />
      </div>

      <div v-else-if="slug === 'sejarah'" class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 border-b pb-2 uppercase">SEJARAH BKPSDM</h3>
        <div class="mt-6 custom-prose" v-html="convertOembed(data.isi ?? '')" />
        <div v-if="data.lampiran" class="mt-8">
          <a :href="`/storage/${data.lampiran}`" target="_blank"
            class="inline-block bg-sky-700 text-white text-sm px-6 py-2 rounded-md shadow hover:bg-sky-800"
            onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;">
            {{ getOriginalFilename(data.lampiran) }}
          </a>
        </div>
      </div>

      <div v-else-if="slug === 'struktur-organisasi'" class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 border-b pb-2 uppercase">Struktur Organisasi BKPSDM</h3>
        <img :src="`/storage/${data.gambar}`" alt="Struktur Organisasi BKPSDM" class="mx-auto rounded-lg shadow" />
      </div>

      <div v-else class="text-center text-red-600 font-semibold">
        Halaman tidak ditemukan atau konten belum tersedia.
      </div>
    </section>
    <section v-else class="py-8 lg:py-12 px-0 lg:px-4 max-w-6xl mx-auto">
      <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 uppercase">{{ title }}</h3>
        <p class="text-center text-gray-600">Belum ada data.</p>
      </div>
    </section>
  </AppLayout>
</template>
