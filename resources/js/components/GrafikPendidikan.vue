<script setup lang="ts">
import KartuGrafik from '@/components/KartuGrafik.vue'
import { opsiDasar, WARNA_GRAFIK, WARNA_LABEL } from '@/lib/chart'

const props = defineProps(['data', 'tipe'])

const slugs =
  props.tipe == 'pns'
    ? ['pns_sd', 'pns_smp', 'pns_sma_smk', 'pns_d1', 'pns_d2', 'pns_d3', 'pns_s1_d4', 'pns_s2', 'pns_s3']
    : ['pppk_sltp', 'pppk_sma_smk', 'pppk_d3', 'pppk_s1_d4', 'pppk_s2']

const ringkasan = slugs
  .map((slug) => props.data.find((item: any) => item.slug == slug))
  .filter(Boolean)
  .map((item: any) => ({ label: item.label, value: parseInt(item.value) }))

const series = ringkasan.map((item) => item.value)

const options = {
  ...opsiDasar,
  chart: { ...opsiDasar.chart, type: 'donut' },
  labels: ringkasan.map((item) => item.label),
  dataLabels: {
    enabled: true,
    // Potongan kecil ditulis sebagai angka, bukan persen, agar tidak jadi 0.4%.
    formatter: (val: number, opts: any) => {
      const nilai = opts.w.globals.series[opts.seriesIndex]
      return nilai < 10 ? `${nilai}` : `${val.toFixed(0)}%`
    },
    style: { fontSize: '12px', fontWeight: 600, colors: WARNA_LABEL },
    dropShadow: { enabled: false },
  },
  stroke: { show: true, width: 2, colors: ['#ffffff'] },
  plotOptions: { pie: { donut: { size: '55%' } } },
  colors: WARNA_GRAFIK,
}
</script>

<template>
  <KartuGrafik judul="Tingkat Pendidikan" :ringkasan="ringkasan">
    <apexchart type="donut" height="350" :options="options" :series="series" />
  </KartuGrafik>
</template>
