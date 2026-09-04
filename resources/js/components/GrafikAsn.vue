<script setup lang="ts">
import KartuGrafik from '@/components/KartuGrafik.vue'
import { opsiDasar, TINTA, TINTA_LEMBUT, WARNA_GRAFIK } from '@/lib/chart'

const props = defineProps(['data'])

const pns = props.data.find((item: any) => item.slug == 'pns')
const pppk = props.data.find((item: any) => item.slug == 'pppk')

const ringkasan = [
  { label: pns.label, value: parseInt(pns.value) },
  { label: pppk.label, value: parseInt(pppk.value) },
]

const series = [{ name: 'Jumlah', data: ringkasan.map((item) => item.value) }]

const options = {
  ...opsiDasar,
  chart: { ...opsiDasar.chart, type: 'bar' },
  xaxis: {
    categories: ringkasan.map((item) => item.label),
    labels: { style: { colors: TINTA, fontWeight: 500 } },
  },
  yaxis: { min: 0, labels: { style: { colors: TINTA_LEMBUT } } },
  plotOptions: {
    bar: { borderRadius: 6, columnWidth: '45%' },
  },
  // Label bawaan dimatikan: warnanya dipaksa oleh ApexCharts dan kontrasnya
  // gagal. Angkanya ditulis di kartu (prop `angka`) supaya tetap terbaca.
  dataLabels: { enabled: false },
  grid: { borderColor: '#dde3ed' },
  colors: [WARNA_GRAFIK[2]],
  legend: { show: false },
}
</script>

<template>
  <KartuGrafik judul="Jenis Kepegawaian ASN" :ringkasan="ringkasan" angka>
    <apexchart type="bar" height="300" :options="options" :series="series" />
  </KartuGrafik>
</template>
