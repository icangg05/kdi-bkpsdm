<script setup>
import { BarChart3 } from 'lucide-vue-next'
import GrafikAsn from '../GrafikAsn.vue'
import GrafikPendidikan from '../GrafikPendidikan.vue'
import GrafikJenisKelamin from '../GrafikJenisKelamin.vue'
import {
  Tabs,
  TabsContent,
  TabsList,
  TabsTrigger,
} from '@/components/ui/tabs'
import { formatTanggalIndo } from '@/lib/utils'
import GrafikJenisJabatan from '../GrafikJenisJabatan.vue'

const props = defineProps(['statistik_asn'])
// console.log(props.statistik_asn)
</script>

<template>
  <section class="bg-gray-50 pt-16 pb-20 -mt-20 -mb-20 select-none">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-14">
        <h2 class="text-2xl md:text-4xl font-extrabold text-gray-800 mb-2">
          Statistik ASN
        </h2>

        <!-- 🧩 Icon -->
        <div class="flex justify-center mb-4">
          <BarChart3 class="h-10 w-10 text-sky-600" />
        </div>

        <p class="text-base lg:text-lg text-gray-600">
          📊 Data ASN Kota Kendari per <span class="font-semibold text-gray-800">
            {{formatTanggalIndo(statistik_asn.find((item) => item.slug == 'tanggal_update')?.value)}}
          </span> berdasarkan
          <br class="md:hidden">
          <span class="text-sky-600 font-semibold">jenis kepegawaian</span>,
          <span class="text-emerald-600 font-semibold">pendidikan terakhir</span>,
          <span class="text-pink-600 font-semibold">jenis kelamin</span>, dan
          <span class="text-purple-600 font-semibold">jenis jabatan</span>.
        </p>
      </div>

      <div class="lg:px-10 grid grid-cols-1 md:grid-cols-12 gap-y-5 lg:gap-8">
        <!-- Bar Chart - Jenis ASN (was pie) -->
        <div class="col-span-12 lg:col-span-5 h-full">
          <GrafikAsn :data="statistik_asn" />
        </div>

        <div class="col-span-12 lg:col-span-7">
          <Tabs default-value="pns" class="w-full">
            <TabsList class="grid w-full grid-cols-2 gap-2 lg:gap-6">
              <TabsTrigger value="pns">
                PNS
              </TabsTrigger>
              <TabsTrigger value="pppk">
                PPPK
              </TabsTrigger>
            </TabsList>
            <TabsContent value="pns">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- 📘 Kiri: Pendidikan -->
                <GrafikPendidikan :data="statistik_asn" tipe="pns" />

                <!-- 📕 Kanan: Jenis Kelamin -->
                <GrafikJenisKelamin :data="statistik_asn" tipe="pns" />
              </div>
            </TabsContent>

            <TabsContent value="pppk">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- 📘 Kiri: Pendidikan -->
                <GrafikPendidikan :data="statistik_asn" tipe="pppk" />

                <!-- 📕 Kanan: Jenis Kelamin -->
                <GrafikJenisKelamin :data="statistik_asn" tipe="pppk" />
              </div>
            </TabsContent>
          </Tabs>
        </div>

        <div class="lg:px-45 col-span-12">
          <GrafikJenisJabatan :data="statistik_asn" />
        </div>
      </div>
    </div>
  </section>
</template>
