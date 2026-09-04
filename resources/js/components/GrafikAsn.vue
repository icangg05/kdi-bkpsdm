<script setup lang="ts">
const props = defineProps(['data'])

const pns = props.data.find((item: any) => item.slug == 'pns')
const pppk = props.data.find((item: any) => item.slug == 'pppk')


// 🎯 Bar Chart - Jenis Kepegawaian ASN (was pie)
const jenisAsnSeries = [{
  name: 'Jumlah',
  data: [pns.value, pppk.value].map(item => parseInt(item))
}]
const jenisAsnOptions = {
  chart: { type: 'bar', height: 350, toolbar: { show: false } },
  xaxis: {
    categories: [pns.label, pppk.label],
    labels: { style: { colors: '#1f2937', fontWeight: 500 } }
  },
  plotOptions: {
    bar: {
      borderRadius: 6,
      columnWidth: '50%'
    }
  },
  dataLabels: {
    enabled: true,
    style: {
      colors: ['#ffffff'], // 👈 Ubah ke putih
      fontWeight: 600
    }
  },
  yaxis: {
    min: 0, // 👈 penting: set minimal agar semua nilai tampil
    labels: {
      style: { colors: '#4b5563' }
    }
  },
  colors: ['#0284c7', '#f97316'],
  legend: { show: false }
}
</script>

<template>
  <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition duration-300 p-6">
    <h3 class="text-xl font-semibold mb-4 text-center text-sky-700">Jenis Kepegawaian ASN</h3>
    <apexchart type="bar" height="350" :options="jenisAsnOptions" :series="jenisAsnSeries" />
  </div>
</template>
