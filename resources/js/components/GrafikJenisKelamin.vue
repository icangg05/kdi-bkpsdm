<script setup lang="ts">
const props = defineProps(['data', 'tipe'])

const slugLakiLaki = props.tipe == 'pns' ? 'pns_l' : 'pppk_l';
const slugPerempuan = props.tipe == 'pns' ? 'pns_p' : 'pppk_p';

const lakiLaki = props.data.find((item: any) => item.slug == slugLakiLaki)
const perempuan = props.data.find((item: any) => item.slug == slugPerempuan)


// 🎯 Pie Chart - Pendidikan ASN (was bar)
const jenisKelaminSeris = [
  lakiLaki.value, perempuan.value,
].map(item => parseInt(item))
const jenisKelaminOptions = {
  chart: { type: 'pie', height: 350 },
  labels: [
    lakiLaki.label, perempuan.label
  ],
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
    width: 1
  },
  tooltip: {
    y: {
      formatter: (val: any) => `${val} orang`
    }
  },
  colors: ['#3b82f6', '#ec4899'],
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
    <h3 class="text-xl font-semibold mb-4 text-center text-emerald-700">Data Jenis Kelamin</h3>
    <apexchart type="pie" height="350" :options="jenisKelaminOptions" :series="jenisKelaminSeris" />
  </div>
</template>
