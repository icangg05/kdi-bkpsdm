<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue'
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import StatistikPegawai from '@/components/section/StatistikPegawai.vue';

const page = usePage();
const props = usePage().props
const title = page.props.title as string;
const statistik_asn = props.statistik_asn

const breadcrumbItems = [
  {
    label: 'Beranda',
    link: route('beranda'),
  },
  {
    label: 'Publikasi',
    link: '#',
  },
  {
    label: title,
    link: '#',
  },
]

</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-publikasi.jpg">
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
    <section class="pt-[4.5rem]">
      <StatistikPegawai :statistik_asn="statistik_asn" />
    </section>
  </AppLayout>
</template>
