<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import StatistikPegawai from '@/components/section/StatistikPegawai.vue';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const props = usePage().props
const title = props.title as string
const statistik_asn = (props.statistik_asn ?? []) as any[]
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-publikasi.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">{{ title }}</h1>
      <span class="mx-auto mt-4 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>

      <Breadcrumb class="mt-5">
        <BreadcrumbList class="justify-center text-brand-100">
          <BreadcrumbItem>
            <BreadcrumbLink :href="route('beranda')" class="text-sm hover:text-white hover:underline lg:text-base">
              Beranda
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator class="text-brand-200/70" />
          <BreadcrumbItem>
            <BreadcrumbPage class="text-sm text-white lg:text-base">{{ title }}</BreadcrumbPage>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </BgOverlay>

    <!-- Tanpa pembungkus ber-padding: seksinya sudah membawa ritme py-16 lg:py-24
         sendiri, dan pt-[4.5rem] di sini yang bikin ruang kosong menganga. -->
    <StatistikPegawai :statistik_asn="statistik_asn" :tautan-lengkap="false" />
  </AppLayout>
</template>
