<script setup lang="ts">
import GrafikAsn from '@/components/GrafikAsn.vue'
import GrafikJenisJabatan from '@/components/GrafikJenisJabatan.vue'
import GrafikJenisKelamin from '@/components/GrafikJenisKelamin.vue'
import GrafikPendidikan from '@/components/GrafikPendidikan.vue'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import { formatTanggalIndo } from '@/lib/utils'
import { Link } from '@inertiajs/vue3'
import { ArrowRight } from 'lucide-vue-next'
import { computed } from 'vue'

// `tautanLengkap` dimatikan di halaman Statistik Pegawai sendiri: di sana
// tombol "Statistik lengkap" menunjuk balik ke halaman yang sedang dibuka.
const props = withDefaults(
  defineProps<{ statistik_asn: any[]; tautanLengkap?: boolean }>(),
  { tautanLengkap: true },
)

const tanggalUpdate = computed(() => {
  const nilai = props.statistik_asn.find((item) => item.slug == 'tanggal_update')?.value
  return nilai ? formatTanggalIndo(nilai) : null
})
</script>

<template>
  <section class="relative isolate overflow-hidden bg-surface-2 py-16 lg:py-24">
    <!-- Hiasan latar: raster garis (menggemakan garis bantu grafik) yang memudar
         ke bawah, plus dua noda warna merek dan emas. Murni dekoratif. -->
    <div aria-hidden="true"
      class="absolute inset-0 -z-10 opacity-60 [background-image:linear-gradient(to_right,var(--color-line)_1px,transparent_1px),linear-gradient(to_bottom,var(--color-line)_1px,transparent_1px)] [background-size:56px_56px] [mask-image:linear-gradient(to_bottom,black,transparent_65%)]">
    </div>
    <div aria-hidden="true" class="absolute -right-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl"></div>
    <div aria-hidden="true" class="absolute -bottom-28 -left-24 -z-10 size-80 rounded-full bg-gold-400/20 blur-3xl"></div>

    <div class="container">
      <div class="flex flex-wrap items-end justify-between gap-6">
        <div>
          <h2 class="text-2xl font-bold text-ink lg:text-3xl">Statistik ASN</h2>
          <span class="mt-3 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>
          <p class="mt-3 max-w-xl text-sm text-ink-soft lg:text-base">
            Komposisi pegawai Kota Kendari menurut jenis kepegawaian, pendidikan terakhir, jenis
            kelamin, dan jenis jabatan.
            <span v-if="tanggalUpdate" class="block">
              Data per <span class="font-semibold text-ink">{{ tanggalUpdate }}</span>.
            </span>
          </p>
        </div>

        <Link v-if="tautanLengkap" :href="route('statistik-pegawai')"
          class="group inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800">
        Statistik lengkap
        <ArrowRight class="size-4 transition-transform group-hover:translate-x-0.5" aria-hidden="true" />
        </Link>
      </div>

      <div class="mt-8 grid gap-5 lg:grid-cols-12">
        <div class="min-w-0 lg:col-span-5">
          <GrafikAsn :data="statistik_asn" />
        </div>

        <div class="min-w-0 lg:col-span-7">
          <Tabs default-value="pns" class="w-full gap-4">
            <TabsList class="grid w-full grid-cols-2 bg-white ring-1 ring-line">
              <TabsTrigger value="pns">PNS</TabsTrigger>
              <TabsTrigger value="pppk">PPPK</TabsTrigger>
            </TabsList>

            <TabsContent v-for="tipe in ['pns', 'pppk']" :key="tipe" :value="tipe">
              <div class="grid min-w-0 gap-5 sm:grid-cols-2">
                <GrafikPendidikan :data="statistik_asn" :tipe="tipe" />
                <GrafikJenisKelamin :data="statistik_asn" :tipe="tipe" />
              </div>
            </TabsContent>
          </Tabs>
        </div>

        <div class="min-w-0 lg:col-span-12">
          <GrafikJenisJabatan :data="statistik_asn" />
        </div>
      </div>
    </div>
  </section>
</template>
