<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Facebook, Instagram, Mail, Phone, Twitter, Youtube } from 'lucide-vue-next';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';

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

const props = page.props
const data = props.data as any

const pengaturan = page.props.pengaturan as any

const email_dinas = pengaturan.find((item: any) => item.nama_pengaturan == 'email_dinas')?.value
const no_hp = pengaturan.find((item: any) => item.nama_pengaturan == 'no_hp')?.value
const alamat = pengaturan.find((item: any) => item.nama_pengaturan == 'alamat')?.value
const fb = pengaturan.find((item: any) => item.nama_pengaturan == 'fb')?.value
const ig = pengaturan.find((item: any) => item.nama_pengaturan == 'ig')?.value
const tt = pengaturan.find((item: any) => item.nama_pengaturan == 'tt')?.value
const yt = pengaturan.find((item: any) => item.nama_pengaturan == 'yt')?.value
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
      <div class="bg-white shadow-lg rounded-xl p-8 lg:p-12">
        <h3 class="text-2xl font-bold mb-8 border-b pb-4 text-center uppercase">{{ title }}</h3>

        <div class="grid lg:grid-cols-2 gap-10">
          <!-- Kolom Kiri -->
          <div>
            <h4 class="text-lg font-semibold mb-2">BKPSDM Kota Kendari</h4>
            <p class="font-medium">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kota Kendari</p>
            <p class="mt-4">
              {{ alamat ?? '-' }}<br />
              Telp / Fax. {{ no_hp ?? '-' }}
            </p>
            <p class="mt-4">
              <span class="font-semibold">E-Mail:</span>&nbsp;
              <a :href="`mailto:${email_dinas}`" class="text-sky-700 hover:underline">
                {{ email_dinas ?? '-' }}
              </a>
            </p>
            <p>
              <span class="font-semibold">Web:</span>&nbsp;
              <a href="https://bkpsdm.kendarikota.go.id" target="_blank" class="text-sky-700 hover:underline">
                bkpsdm.kendarikota.go.id
              </a>
            </p>
          </div>

          <!-- Kolom Kanan -->
          <div class="flex flex-col justify-center">
            <div>
              <p class="font-semibold text-gray-700 mb-2">
                Saran / Kritik / Pertanyaan silahkan disampaikan melalui E-Mail:
              </p>
              <a :href="`mailto:${email_dinas}`" class="text-lg font-bold text-sky-700 hover:underline">
                {{ email_dinas ?? '-' }}
              </a>
            </div>
            <div class="flex gap-6 mt-10">
              <a :href="fb" target="_blank" class="text-sky-700 hover:text-sky-900">
                <Facebook class="w-8 h-8" />
              </a>
              <a :href="tt" target="_blank" class="text-sky-400 hover:text-sky-600">
                <Twitter class="w-8 h-8" />
              </a>
              <a :href="ig" target="_blank" class="text-pink-600 hover:text-pink-800">
                <Instagram class="w-8 h-8" />
              </a>
              <a :href="yt" target="_blank" class="text-red-600 hover:text-red-800">
                <Youtube class="w-8 h-8" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section v-if="data" class="py-12 px-4 max-w-6xl mx-auto">
      <div class="bg-white shadow-lg rounded-xl p-6">
        <h3 class="text-xl font-semibold mb-4 border-b pb-2 text-center uppercase">{{ title }}</h3>
        <div class="mb-6 custom-prose" v-html="convertOembed(refactorFormat(data.isi ?? ''))" />

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
    </section> -->
  </AppLayout>
</template>
