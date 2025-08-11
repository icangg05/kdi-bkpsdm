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
} from '@/components/ui/breadcrumb'
import { Check, UserRound } from 'lucide-vue-next';
import { convertOembed } from '@/lib/utils';


const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda')
  },
  {
    label: 'Profil',
    link: '#',
  },
  {
    label: 'Profil Pejabat Tinggi BKPSDM',
    link: route('profil', 'pejabat'),
  },
  {
    label: 'Detail',
    link: '#'
  },
]

const props = usePage().props
const data = props.data as any
</script>

<template>

  <Head title="Profil Pejabat" />

  <AppLayout>
    <BgOverlay src="/img/bg-profil.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">
          Detail Profil Pejabat
        </h2>
        <span
          class="pointer-events-none text-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
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

    <!-- Main konten -->
    <div class="lg:container mt-[3rem]">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-8 lg:gap-8">
        <!-- Kiri: Gambar dan info dasar -->
        <div
          class="h-fit relative col-span-1 rounded-2xl overflow-hidden shadow-lg bg-white/60 backdrop-blur-sm border border-sky-100">
          <div class="relative">
            <img :src="data.foto ? `/storage/${data.foto}` : '/img/default-user.jpg'" alt="Foto {{ data.nama }}"
              class="w-full h-80 object-cover object-top transition-transform duration-500 hover:scale-105" />
            <div
              class="absolute top-4 left-4 bg-gradient-to-r from-sky-500 to-sky-600 text-white text-xs font-semibold flex items-center gap-2 px-3 py-1.5 rounded-full shadow-lg">
              <UserRound class="w-4 h-4" />
              <span>Profil</span>
            </div>
          </div>
          <div class="p-5 text-center">
            <h3 class="text-lg font-bold text-gray-800 leading-tight">{{ data.nama }}</h3>
            <div class="mt-3 space-y-1">
              <p v-if="data.jabatan.nama" class="text-sky-600 font-semibold text-sm">{{ data.jabatan.nama }}</p>
              <p v-if="data.jabatan.unit_organisasi.nama" class="text-gray-600 text-sm">{{
                data.jabatan.unit_organisasi.nama }}</p>
              <p v-if="data.jabatan.unit_organisasi.bagian.nama" class="text-gray-500 text-xs">{{
                data.jabatan.unit_organisasi.bagian.nama }}</p>
            </div>
          </div>
        </div>

        <!-- Kanan: Tugas dan Biografi -->
        <div class="col-span-2 space-y-6">
          <!-- Tugas -->
          <div v-if="data.jabatan?.tugas.length > 0"
            class="rounded-2xl bg-gradient-to-br from-sky-50 via-blue-50 to-blue-100 border border-blue-200 shadow-sm p-6">
            <div class="flex items-center gap-2 mb-3">
              <div class="bg-sky-500/10 p-2 rounded-full">
                <Check class="size-5 text-sky-600" />
              </div>
              <h4 class="text-lg font-bold text-blue-900">Tugas</h4>
            </div>
            <ul class="space-y-2 mt-2">
              <li v-for="(item, index) in data.jabatan.tugas" :key="index" class="grid grid-cols-12 gap-3">
                <Check class="lg:translate-x-4 col-span-1 size-4 text-blue-500 mt-0.5" />
                <p class="lg:-translate-x-3 col-span-11 text-sm text-blue-900">{{ item }}</p>
              </li>
            </ul>
          </div>

          <!-- Biografi -->
          <div class="bg-white rounded-2xl shadow-sm border border-sky-100 p-6">
            <div class="flex items-center gap-2 mb-3">
              <div class="bg-sky-500/10 p-2 rounded-full">
                <UserRound class="w-5 h-5 text-sky-600" />
              </div>
              <h4 class="text-lg font-bold text-gray-900">Biografi</h4>
            </div>
            <div class="prose-sm lg:prose lg:max-w-none text-gray-700" v-html="convertOembed(data.biografi ?? '-')" />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
