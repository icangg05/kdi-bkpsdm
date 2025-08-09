<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { convertOembed, getOriginalFilename, refactorFormat } from '@/lib/utils';

const page = usePage();
const title = page.props.title as string;
const halaman = page.props.halaman
// console.log(halaman)

const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda'),
  },
  {
    label: halaman == 'hubungi-kami' ? 'Kontak' : 'Layanan',
    link: halaman == 'hubungi-kami' ? '#' : route('layanan'),
  },
  {
    label: title,
    link: '#',
  },
];

const props = usePage().props
const data = props.data as any
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay :src="halaman == 'hubungi-kami' ? '/img/bg-hubungi-kami.jpg' : '/img/bg-layanan.jpg'">
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
              <BreadcrumbLink as-child class="hover:underline text-sm lg:text-base">
                <Link :href="item.link">
                {{ item.label }}
                </Link>
              </BreadcrumbLink>
              <BreadcrumbSeparator v-if="breadcrumbItems.length - 1 != index" class="ml-0.5 text-sky-400" />
            </BreadcrumbItem>
          </BreadcrumbList>
        </Breadcrumb>
      </div>
    </BgOverlay>

    <!-- Konten Dinamis -->
    <section v-if="data" class="py-12 px-4 max-w-6xl mx-auto">
      <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 border-b pb-2 text-center uppercase">{{ title }}</h3>
        <div class="mb-6 custom-prose" v-html="convertOembed(refactorFormat(data.isi))" />

        <div v-if="data.lampiran" class="flex flex-wrap gap-2">
          <a :href="`/storage/${data.lampiran}`" target="_blank"
            onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;"
            class="inline-block bg-sky-700 text-white text-sm px-6 py-2 rounded-md shadow hover:bg-sky-800">
            {{ getOriginalFilename(data.lampiran) }}
          </a>
        </div>
      </div>
    </section>
    <section v-else class="py-12 px-4 max-w-6xl mx-auto">
      <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 border-b pb-2 text-center uppercase">{{ title }}</h3>
        <div class="mb-4 custom-prose">
          <p class="text-center text-gray-600">Belum ada data</p>
        </div>
      </div>
    </section>
  </AppLayout>
</template>
