<script setup lang="ts">
withDefaults(
  defineProps<{
    judul: string
    // Dipakai untuk padanan teks: ApexCharts merender SVG yang tidak terbaca
    // pembaca layar, jadi angkanya diulang sebagai daftar tersembunyi.
    ringkasan: { label: string; value: number }[]
    // Bila true, angkanya juga ditulis terbuka di bawah judul. Label bawaan
    // ApexCharts di grafik batang dipaksa berwarna terang oleh librarynya
    // sendiri dan kontrasnya jatuh, jadi angkanya ditulis di luar kanvas.
    angka?: boolean
  }>(),
  { angka: false },
)

const ribuan = (n: number) => new Intl.NumberFormat('id-ID').format(n)
</script>

<template>
  <figure
    class="flex h-full min-w-0 flex-col overflow-hidden rounded-card bg-white p-5 shadow-sm ring-1 ring-line transition hover:shadow-md motion-reduce:transition-none lg:p-6">
    <figcaption class="flex items-center gap-2.5 text-base font-semibold text-ink">
      <span class="h-4 w-1 rounded-full bg-gold-500" aria-hidden="true"></span>
      {{ judul }}
    </figcaption>

    <dl v-if="angka" class="mt-4 flex flex-wrap gap-x-8 gap-y-3">
      <div v-for="item in ringkasan" :key="item.label">
        <dt class="text-xs uppercase tracking-wide text-ink-soft">{{ item.label }}</dt>
        <dd class="text-xl font-bold text-brand-800">{{ ribuan(item.value) }}</dd>
      </div>
    </dl>

    <div class="mt-4 flex-1">
      <slot />
    </div>

    <ul class="sr-only">
      <li v-for="item in ringkasan" :key="item.label">{{ item.label }}: {{ item.value }} orang</li>
    </ul>
  </figure>
</template>
