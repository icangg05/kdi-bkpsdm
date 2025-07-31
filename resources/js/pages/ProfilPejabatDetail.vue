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
      <div class="grid items-start grid-cols-3 gap-8 bg-white rounded-xl shadow p-2.5 lg:p-6">
        <!-- Kiri: Gambar dan info dasar -->
        <div class="col-span-3 lg:col-span-1 rounded-xl overflow-hidden shadow-md">
          <div class="relative">
            <img :src="data.foto ? `/storage/${data.foto}` : '/img/default-user.jpg'" alt="Michael Rodriguez"
              class="w-full h-80 object-cover" />
            <div
              class="absolute top-4 left-4 bg-sky-500 text-white text-xs font-semibold flex items-end gap-1 px-3 py-1 rounded-full shadow">
              <UserRound class="w-4 h-4" />
              <span>Profil</span>
            </div>
          </div>
          <div class="p-4 text-center">
            <h3 class="text-lg font-bold text-gray-800 leading-tight">{{ data.nama }}</h3>
            <div class="my-2 bg-gray-100 h-1" />
            <div class="mt-2">
              <p v-if="data.jabatan.nama" class="mt-0.5 text-sky-600 font-semibold text-sm leading-tight">{{
                data.jabatan.nama }}</p>
              <p v-if="data.jabatan.unit_organisasi.nama" class="mt-0.5 text-sky-600 font-semibold text-sm leading-tight">
                {{ data.jabatan.unit_organisasi.nama }}</p>
              <p v-if="data.jabatan.unit_organisasi.bagian.nama"
                class="mt-0.5 text-sky-600 font-semibold text-sm leading-tight">{{
                  data.jabatan.unit_organisasi.bagian.nama }}</p>
            </div>
          </div>
        </div>

        <!-- Kanan: Kutipan dan biografi -->
        <div class="col-span-3 lg:col-span-2 flex flex-col justify-center gap-6">
          <!-- Tugas -->
          <div v-if="data.jabatan?.tugas.length > 0" class="rounded-lg border border-blue-300 bg-blue-50 text-blue-900 p-5">
            <h4 class="text-lg font-bold mb-2">Tugas</h4>
            <div class="h-1 w-20 bg-blue-500 mb-3 rounded-full"></div>
            <div v-for="(item, i) in data.jabatan.tugas" class="flex flex-col gap-2" :index="i">
              <div class="flex items-center gap-3" v-for="(i) in 1" :key="i">
                <Check class="size-5 text-blue-600" />
                <p class="text-sm">{{ item }}</p>
              </div>
            </div>
          </div>

          <!-- Biografi -->
          <div>
            <h4 class="text-xl font-bold text-gray-900 border-b border-sky-500 inline-block pb-1 mb-3">Biografi</h4>
            <div class="prose-sm lg:prose lg:max-w-none" v-html="convertOembed(data.biografi ?? '-')" />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
