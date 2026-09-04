<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import {
  Clock,
  ExternalLink,
  Facebook,
  Instagram,
  Mail,
  MapPin,
  Phone,
  Twitter,
  Youtube,
} from 'lucide-vue-next';
import { computed } from 'vue';

const page = usePage()
const title = page.props.title as string
const pengaturan = (page.props.pengaturan ?? []) as any[]

const nilai = (nama: string) => pengaturan.find((item: any) => item.nama_pengaturan == nama)?.value ?? null

const alamat = nilai('alamat')
const noHp = nilai('no_hp')
const emailDinas = nilai('email_dinas')
const jamOperasional = nilai('jam_operasional')

const petaUrl = computed(() =>
  alamat ? `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(alamat)}` : null,
)

// Akun yang belum diisi admin disimpan sebagai '#'. Menampilkannya berarti
// menjanjikan kanal yang tidak ada, jadi yang '#' atau kosong tidak dirender.
const sosial = computed(() =>
  [
    { nama: 'Facebook', ikon: Facebook, url: nilai('fb') },
    { nama: 'Instagram', ikon: Instagram, url: nilai('ig') },
    { nama: 'YouTube', ikon: Youtube, url: nilai('yt') },
    { nama: 'Twitter', ikon: Twitter, url: nilai('tt') },
  ].filter((item) => item.url && item.url !== '#'),
)
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-hubungi-kami.jpg">
      <h1 class="text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">{{ title }}</h1>
      <span class="mx-auto mt-4 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>

      <Breadcrumb class="mt-5">
        <BreadcrumbList class="justify-center text-brand-100">
          <BreadcrumbItem>
            <BreadcrumbLink :href="route('beranda')" class="text-sm hover:text-white hover:underline lg:text-base">
              Beranda
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator class="text-brand-200/70" />
          <BreadcrumbItem>
            <BreadcrumbPage class="text-sm text-white lg:text-base">{{ title }}</BreadcrumbPage>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </BgOverlay>

    <section class="relative isolate overflow-hidden bg-surface-2 py-12 lg:py-16">
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>
      <div aria-hidden="true" class="absolute -right-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl"></div>
      <div aria-hidden="true" class="absolute -bottom-32 -left-24 -z-10 size-80 rounded-full bg-gold-400/20 blur-3xl">
      </div>

      <div class="container grid gap-6 lg:grid-cols-12 lg:gap-8">
        <!-- Informasi kontak datang dari tabel pengaturan, bukan dari record
             Halaman. Dulu seluruh blok ini ada di balik `v-if="data"`, jadi
             halaman kosong melompong bila admin belum membuat halamannya. -->
        <div class="min-w-0 rounded-card bg-white p-6 ring-1 ring-line lg:col-span-7 lg:p-8">
          <h2 class="text-lg font-bold text-ink lg:text-xl">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</h2>
          <p class="mt-1 text-sm text-ink-soft">Pemerintah Kota Kendari</p>
          <span class="mt-5 block h-1 w-12 rounded-full bg-gold-500" aria-hidden="true"></span>

          <ul class="mt-6 flex flex-col divide-y divide-line">
            <li v-if="alamat" class="flex items-start gap-4 py-4 first:pt-0">
              <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                <MapPin class="size-5" aria-hidden="true" />
              </span>
              <div class="min-w-0">
                <p class="text-sm font-semibold text-ink">Alamat kantor</p>
                <p class="mt-1 text-sm leading-relaxed text-ink-soft">{{ alamat }}</p>
                <a v-if="petaUrl" :href="petaUrl" target="_blank" rel="noopener noreferrer"
                  class="group mt-2 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 transition hover:text-brand-800">
                  Buka di Google Maps
                  <ExternalLink class="size-3.5" aria-hidden="true" />
                  <span class="sr-only">(membuka situs lain di tab baru)</span>
                </a>
              </div>
            </li>

            <li v-if="noHp" class="flex items-start gap-4 py-4">
              <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                <Phone class="size-5" aria-hidden="true" />
              </span>
              <div class="min-w-0">
                <p class="text-sm font-semibold text-ink">Telepon</p>
                <a :href="`tel:${noHp}`"
                  class="mt-1 inline-block text-sm font-semibold text-brand-700 transition hover:text-brand-800">
                  {{ noHp }}
                </a>
              </div>
            </li>

            <li v-if="emailDinas" class="flex items-start gap-4 py-4">
              <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                <Mail class="size-5" aria-hidden="true" />
              </span>
              <div class="min-w-0">
                <p class="text-sm font-semibold text-ink">Surel</p>
                <a :href="`mailto:${emailDinas}`"
                  class="mt-1 inline-block break-all text-sm font-semibold text-brand-700 transition hover:text-brand-800">
                  {{ emailDinas }}
                </a>
              </div>
            </li>

            <li v-if="jamOperasional" class="flex items-start gap-4 py-4 last:pb-0">
              <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                <Clock class="size-5" aria-hidden="true" />
              </span>
              <div class="min-w-0">
                <p class="text-sm font-semibold text-ink">Jam pelayanan</p>
                <p class="mt-1 text-sm text-ink-soft">{{ jamOperasional }}</p>
              </div>
            </li>
          </ul>
        </div>

        <!-- Ajakan menyampaikan saran, di bidang gelap supaya jadi satu titik
             aksi yang jelas, bukan paragraf yang tenggelam. -->
        <div
          class="relative isolate min-w-0 overflow-hidden rounded-card bg-brand-900 bg-cover bg-center p-6 text-white lg:col-span-5 lg:p-8"
          style="background-image: url('/img/bg-hubungi-kami.jpg')">
          <div class="absolute inset-0 -z-10 bg-brand-900/90" aria-hidden="true"></div>
          <div aria-hidden="true" class="absolute -right-12 -top-12 -z-10 size-48 rounded-full bg-gold-400/20 blur-3xl">
          </div>

          <h2 class="text-lg font-bold lg:text-xl">Saran, kritik, atau pertanyaan</h2>
          <p class="mt-2 text-sm leading-relaxed text-brand-100">
            Sampaikan melalui surel resmi kami. Setiap pesan yang masuk ditindaklanjuti pada jam
            pelayanan.
          </p>

          <a v-if="emailDinas" :href="`mailto:${emailDinas}`"
            class="mt-6 inline-flex items-center gap-2 rounded-control bg-white px-5 py-3 text-sm font-semibold text-brand-800 transition hover:bg-brand-50 active:translate-y-px">
            <Mail class="size-4" aria-hidden="true" />
            Kirim surel
          </a>

          <div v-if="sosial.length" class="mt-8 border-t border-white/15 pt-6">
            <p class="text-sm font-semibold">Ikuti kanal resmi kami</p>
            <ul class="mt-3 flex flex-wrap gap-2">
              <li v-for="item in sosial" :key="item.nama">
                <a :href="item.url" target="_blank" rel="noopener noreferrer"
                  class="grid size-11 place-items-center rounded-full bg-white/10 text-white transition hover:bg-white/20 motion-reduce:transition-none">
                  <component :is="item.ikon" class="size-5" aria-hidden="true" />
                  <span class="sr-only">{{ item.nama }} BKPSDM Kota Kendari (membuka situs lain di tab baru)</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section>
  </AppLayout>
</template>
