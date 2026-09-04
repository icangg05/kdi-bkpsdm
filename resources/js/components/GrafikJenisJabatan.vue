<script setup lang="ts">
import KartuGrafik from '@/components/KartuGrafik.vue'
import { opsiDasar, TINTA, TINTA_LEMBUT, WARNA_GRAFIK } from '@/lib/chart'

const props = defineProps(['data'])

const ringkasan = ['struktural', 'fungsional', 'pelaksana']
  .map((nama) => props.data.find((item: any) => item.slug == `jenis_jabatan_${nama}`))
  .filter(Boolean)
  .map((item: any) => ({ label: item.label, value: parseInt(item.value) }))

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
    bar: { borderRadius: 6, columnWidth: '40%' },
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
  <KartuGrafik judul="Jenis Jabatan ASN" :ringkasan="ringkasan" angka>
    <apexchart type="bar" height="280" :options="options" :series="series" />
  </KartuGrafik>
</template>
