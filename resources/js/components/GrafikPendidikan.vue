<script setup lang="ts">
const props = defineProps(['data', 'tipe'])

const pns_sd = props.data.find((item: any) => item.slug == 'pns_sd')
const pns_smp = props.data.find((item: any) => item.slug == 'pns_smp')
const pns_sma_smk = props.data.find((item: any) => item.slug == 'pns_sma_smk')
const pns_d1 = props.data.find((item: any) => item.slug == 'pns_d1')
const pns_d2 = props.data.find((item: any) => item.slug == 'pns_d2')
const pns_d3 = props.data.find((item: any) => item.slug == 'pns_d3')
const pns_s1_d4 = props.data.find((item: any) => item.slug == 'pns_s1_d4')
const pns_s2 = props.data.find((item: any) => item.slug == 'pns_s2')
const pns_s3 = props.data.find((item: any) => item.slug == 'pns_s3')

const pppk_sltp = props.data.find((item: any) => item.slug == 'pppk_sltp')
const pppk_sma_smk = props.data.find((item: any) => item.slug == 'pppk_sma_smk')
const pppk_d3 = props.data.find((item: any) => item.slug == 'pppk_d3')
const pppk_s1_d4 = props.data.find((item: any) => item.slug == 'pppk_s1_d4')
const pppk_s2 = props.data.find((item: any) => item.slug == 'pppk_s2')

const values = props.tipe == 'pns' ?
  [
    pns_sd.value, pns_smp.value, pns_sma_smk.value, pns_d1.value, pns_d2.value, pns_d3.value,
    pns_s1_d4.value, pns_s2.value, pns_s3.value
  ].map(item => parseInt(item)) :
  [pppk_sltp.value, pppk_sma_smk.value, pppk_d3.value, pppk_s1_d4.value, pppk_s2.value].map(item => parseInt(item))

const labels = props.tipe == 'pns' ?
  [
    pns_sd.label, pns_smp.label, pns_sma_smk.label,
    pns_d1.label, pns_d2.label, pns_d3.label,
    pns_s1_d4.label, pns_s2.label, pns_s3.label
  ] :
  [pppk_sltp.label, pppk_sma_smk.label, pppk_d3.label, pppk_s1_d4.label, pppk_s2.label]

// 🎯 Pie Chart - Pendidikan ASN (was bar)
const pendidikanSeries = values
const pendidikanOptions = {
  chart: { type: 'pie', height: 350 },
  labels: labels,
  dataLabels: {
    enabled: true,
    formatter: function (val: any, opts: any) {
      const total = opts.w.globals.seriesTotals.reduce((a: any, b: any) => a + b, 0)
      const value = opts.w.globals.series[opts.seriesIndex]
      return value < 10 ? `${value}` : `${val.toFixed(1)}%`
    },
    style: {
      fontSize: '12px',
      fontWeight: 'bold',
      colors: ['#fff']
    }
  },
  stroke: {
    show: true, // 👈 hilangkan garis antar sektor
    width: 0.5
  },
  tooltip: {
    y: {
      formatter: (val: any) => `${val} orang`
    }
  },
  colors: ['#fbbf24', '#f59e0b', '#ef4444', '#14b8a6', '#0ea5e9', '#6366f1', '#10b981', '#8b5cf6', '#db2777'],
  legend: {
    position: 'bottom',
    labels: {
      colors: '#374151'
    }
  }
}
</script>

<template>
  <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition duration-300 p-6">
    <h3 class="text-xl font-semibold mb-4 text-center text-emerald-700">Tingkat Pendidikan</h3>
    <apexchart type="pie" height="350" :options="pendidikanOptions" :series="pendidikanSeries" />
  </div>
</template>
