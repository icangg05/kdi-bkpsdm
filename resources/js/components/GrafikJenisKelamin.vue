<script setup lang="ts">
import KartuGrafik from '@/components/KartuGrafik.vue'
import { opsiDasar } from '@/lib/chart'

const props = defineProps(['data', 'tipe'])

const ringkasan = [
  props.tipe == 'pns' ? 'pns_l' : 'pppk_l',
  props.tipe == 'pns' ? 'pns_p' : 'pppk_p',
]
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
    formatter: (val: number) => `${val.toFixed(0)}%`,
    style: { fontSize: '13px', fontWeight: 600, colors: ['#ffffff', '#16202e'] },
    dropShadow: { enabled: false },
  },
  stroke: { show: true, width: 2, colors: ['#ffffff'] },
  plotOptions: { pie: { donut: { size: '55%' } } },
  // Dua nilai saja: dua nada biru yang kontras, bukan biru lawan emas, agar
  // aksen emas tetap jadi penanda kecil dan tidak mendominasi satu seksi penuh.
  colors: ['#26407a', '#9db2da'],
}
</script>

<template>
  <KartuGrafik judul="Jenis Kelamin" :ringkasan="ringkasan">
    <apexchart type="donut" height="350" :options="options" :series="series" />
  </KartuGrafik>
</template>
