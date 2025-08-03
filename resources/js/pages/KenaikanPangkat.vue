<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue'
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import { Check, ChevronRight } from 'lucide-vue-next';
import { convertOembed, getOriginalFilename } from '@/lib/utils';

const page = usePage()
const title = page.props.title as string
const layanan = page.props.layanan as string
const data = page.props.data as any

const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda'),
  },
  {
    label: 'Layanan',
    link: route('layanan'),
  },
  {
    label: title,
    link: '#',
  },
]



// Categories data
const categories = ref([
  {
    id: 1,
    title: 'Kenaikan Pangkat',
    layanan: 'kenaikan-pangkat',
  },
  {
    id: 2,
    title: 'Mutasi Pegawai',
    layanan: 'mutasi-pegawai',
  },
  {
    id: 3,
    title: 'Tugas Belajar',
    layanan: 'tugas-belajar',
  },
  {
    id: 4,
    title: 'Konsultasi Kinerja',
    layanan: 'konsultasi-kinerja'
  },
])

// Methods
const selectCategory = (layanan: string) => {
  router.visit(route('layanan.detail', layanan), {
    preserveScroll: true
  })
}
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-layanan.jpg">
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

    <!-- Main konten -->
    <section class="bg-gray-50 -mb-20">
      <div class="lg:container pt-[4rem] pb-[5rem]">
        <div class="grid grid-cols-3 gap-12 lg:gap-10">
          <!-- Sidebar -->
          <div class="col-span-3 lg:col-span-1 bg-white shadow-1 select-none h-fit">
            <!-- Categories List -->
            <div class="px-4 py-7 lg:p-6">
              <nav class="space-y-2">
                <div v-for="category in categories" :key="category.id" @click="selectCategory(category.layanan)" :class="[
                  'flex items-center justify-between p-4 rounded-lg cursor-pointer transition-all duration-200 hover:bg-gray-50',
                  category.layanan === layanan ? 'bg-sky-500 text-white border hover:bg-sky-600' : 'bg-white border border-gray-200'
                ]">
                  <span class="font-medium text-sm">{{ category.title }}</span>

                  <div :class="[
                    'w-8 h-8 rounded-full flex items-center justify-center',
                    category.layanan === layanan ? 'bg-white' : 'bg-sky-500'
                  ]">
                    <component :is="category.layanan === layanan ? Check : ChevronRight" class="w-4 h-4"
                      :class="category.layanan === layanan ? 'text-sky-600' : 'text-white'" />
                  </div>
                </div>
              </nav>
            </div>
          </div>

          <!-- Main Content -->
          <div class="col-span-3 lg:col-span-2 h-fit">
            <!-- Content Area -->
            <div class="bg-white rounded-xl shadow-1 px-4 py-7 lg:p-8">
              <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-4">{{ title }}</h2>

              <!-- Additional Content -->
              <div v-if="data" class="mt-8 custom-prose" v-html="convertOembed(data.isi)" />
              <div v-else class="mt-8 custom-prose">
                <p class="text-gray-600 text-center">Belum ada data.</p>
              </div>

              <div v-if="data && data.lampiran" class="mt-6 flex flex-wrap gap-2">
                <a :href="`/storage/${data.lampiran}`" target="_blank"
                  onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;"
                  class="inline-block bg-sky-700 text-white text-sm px-6 py-2 rounded-md shadow hover:bg-sky-800">
                  {{ getOriginalFilename(data.lampiran) }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </AppLayout>
</template>
