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
import Pagination from '@/components/Pagination.vue';


const page = usePage()
const title = page.props.title as string
const dataProps = page.props.data as any
const data = dataProps.data as any
const paginator = page.props.data as any
// console.log(data)

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
    label: title,
    link: '#'
  },
]
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-profil.jpg">
      <div class="relative">
        <h2 class="z-0 text-3xl lg:text-[36px] font-bold leading-tight tracking-wide">
          {{ title }}
        </h2>
        <span
          class="pointer-events-none text-[3.5rem] lg:text-[7rem] text-white/10 font-bold z-[-1] top-3 lg:top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 absolute">BKPSDM</span>
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

    <!-- Main konten -->
    <div class="container mt-[4rem]">
      <h2 class="text-lg lg:text-3xl font-bold text-center">Pejabat BKPSDM</h2>
      <div class="relative my-4 mx-auto h-[2px] rounded bg-gray-300 w-40">
        <span class="absolute w-[50%] h-[2px] bg-sky-500 top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2"></span>
      </div>
      <p class="max-w-3xl mx-auto text-center text-black/60">
        Berikut adalah daftar pejabat struktural di lingkungan BKPSDM Kota Kendari yang bertanggung jawab dalam
        penyelenggaraan urusan kepegawaian dan pengembangan sumber daya aparatur.
      </p>

      <!-- Card -->
      <div v-if="data.length > 0" class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="(item, index) in data" :key="index"
          class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-transform hover:-translate-y-1 p-5 text-center flex flex-col items-center">
          <!-- Foto profil -->
          <div class="size-32 rounded-full overflow-hidden border-4 border-sky-500 shadow mb-4">
            <img :src="item.foto ? `/storage/${item.foto}` : '/img/default-user.jpg'" alt="Foto Pejabat"
              class="w-full h-full object-cover object-top" />
          </div>

          <!-- Nama -->
          <h3 class="text-base font-semibold text-gray-900">{{ item.nama }}</h3>

          <!-- Jabatan -->
          <p v-if="item.jabatan?.nama" class="text-sm text-gray-700">{{ item.jabatan.nama }}</p>

          <!-- Unit Organisasi -->
          <p v-if="item.jabatan?.unit_organisasi?.nama" class="text-xs text-gray-500 mt-1">
            {{ item.jabatan.unit_organisasi.nama }}
          </p>

          <!-- Bagian -->
          <p v-if="item.jabatan?.unit_organisasi?.bagian?.nama" class="text-xs text-gray-500">
            {{ item.jabatan.unit_organisasi.bagian.nama }}
          </p>

          <!-- Tombol lihat profil -->
          <Link :href="route('profil.pejabat-detail', item.id)"
            class="mt-4 text-sky-600 border border-sky-500 text-xs px-4 py-1 rounded-full hover:bg-sky-100 transition">
          Lihat Profil
          </Link>
        </div>
      </div>
      <div v-else class="mt-12 text-center text-gray-500 text-sm lg:text-base shadow p-6 border border-gray-100">
        Tidak ada data ditemukan.
      </div>

      <div class="mt-11">
        <Pagination :data="paginator" />
      </div>
    </div>
  </AppLayout>
</template>
