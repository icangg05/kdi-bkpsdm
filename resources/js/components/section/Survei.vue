<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'
import { ArrowRight } from 'lucide-vue-next'
import { computed } from 'vue'

const page = usePage()
const linkSurvei = computed(() => {
  const pengaturan = page.props.pengaturan as any[]
  return pengaturan?.find((item) => item.nama_pengaturan == 'link_survei')?.value || null
})
</script>

<template>
  <!-- Tanpa tautan tersimpan, ajakan ini tidak ditampilkan sama sekali,
       daripada merender tombol yang mengarah ke "#". -->
  <section v-if="linkSurvei" class="bg-surface py-16 lg:py-24">
    <div class="container">
      <!-- Pita membulat yang inset dari tepi halaman, seperti referensi. -->
      <div class="relative isolate overflow-hidden rounded-card bg-brand-900 px-6 py-14 lg:px-14 lg:py-20">
        <img src="/img/bg-hubungi-kami.jpg" alt="" aria-hidden="true" loading="lazy" decoding="async"
          class="absolute inset-0 -z-10 size-full object-cover object-right" />
        <!-- Scrim berarah: sisi kiri dikunci gelap untuk teks, kabut teal
             dibiarkan hidup di kanan tempat tombol berada. Persis susunan
             terang-gelap pada referensi. -->
        <div
          class="absolute inset-0 -z-10 bg-gradient-to-r from-brand-900 via-brand-900/90 to-brand-900/45"></div>

        <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:justify-between lg:gap-16">
          <div class="max-w-2xl">
            <h2 class="text-3xl font-bold leading-tight tracking-tight text-white md:text-4xl lg:text-5xl">
              Survei Kepuasan Masyarakat
            </h2>
            <p class="mt-6 max-w-xl text-base leading-relaxed text-brand-200 lg:text-lg">
              Penilaian Anda dipakai untuk memperbaiki mutu layanan kepegawaian BKPSDM Kota Kendari.
              Formulir dibuka di layanan Google Form.
            </p>
          </div>

          <a :href="linkSurvei" target="_blank" rel="noopener noreferrer"
            class="group inline-flex shrink-0 items-center gap-2.5 self-start rounded-control lg:self-auto bg-white px-7 py-4 font-semibold text-brand-900 transition hover:bg-brand-50 active:translate-y-px">
            Isi Survei
            <ArrowRight class="size-4 transition-transform duration-300 group-hover:translate-x-1"
              aria-hidden="true" />
            <span class="sr-only">(membuka formulir di tab baru)</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>
