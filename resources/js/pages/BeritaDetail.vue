<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue'
import CardKategori from '@/components/CardKategori.vue'
import CardKontak from '@/components/CardKontak.vue'
import CardRecentPost from '@/components/CardRecentPost.vue'
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'
import AppLayout from '@/layouts/AppLayout.vue'
import { convertOembed, getOriginalFilename } from '@/lib/utils'
import { Head, Link } from '@inertiajs/vue3'
import {
  ArrowLeft,
  Calendar,
  Check,
  Copy,
  Eye,
  Facebook,
  MessageCircle,
  Paperclip,
  Tag,
} from 'lucide-vue-next'
import { computed, onMounted, ref } from 'vue'

const props = defineProps<{ data: any; publikasiTerbaru: any }>()

// Dibaca setelah mount, bukan saat setup: entri SSR (resources/js/ssr.ts)
// merender komponen ini di Node, dan di sana `window` tidak ada.
const alamatHalaman = ref('')
const tersalin = ref(false)
const gagalSalin = ref(false)

onMounted(() => (alamatHalaman.value = window.location.href))

const kategoriSlug = computed(() =>
  String(props.data?.kategori ?? 'berita').toLowerCase().replace(/\s+/g, '-'),
)

const bagikanFacebook = computed(
  () => `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(alamatHalaman.value)}`,
)
const bagikanWhatsapp = computed(
  () => `https://wa.me/?text=${encodeURIComponent(`${props.data.judul} - ${alamatHalaman.value}`)}`,
)

async function salinTautan() {
  gagalSalin.value = false
  try {
    // clipboard API tidak ada di konteks non-HTTPS, jadi kegagalannya
    // dilaporkan inline, bukan lewat alert() browser.
    await navigator.clipboard.writeText(alamatHalaman.value)
    tersalin.value = true
    setTimeout(() => (tersalin.value = false), 2000)
  } catch {
    gagalSalin.value = true
  }
}
</script>

<template>

  <Head :title="data.judul" />

  <AppLayout>
    <BgOverlay src="/img/bg-publikasi.jpg">
      <h1 class="mx-auto max-w-4xl text-balance text-2xl font-bold leading-[1.2] text-white sm:text-3xl lg:text-[2.6rem]">
        {{ data.judul }}
      </h1>
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
            <BreadcrumbLink :href="route('publikasi.index', kategoriSlug)"
              class="text-sm hover:text-white hover:underline lg:text-base">
              {{ data.kategori }}
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator class="text-brand-200/70" />
          <BreadcrumbItem>
            <BreadcrumbPage class="line-clamp-1 max-w-[16rem] text-sm text-white lg:text-base">
              {{ data.judul }}
            </BreadcrumbPage>
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

      <div class="container grid gap-8 lg:grid-cols-12 lg:gap-10">
        <article
          class="animate-in fade-in slide-in-from-bottom-3 fill-mode-both min-w-0 overflow-hidden rounded-card bg-white ring-1 ring-line duration-500 motion-reduce:animate-none lg:col-span-8">
          <img :src="data.sampul ? `/storage/${data.sampul}` : '/img/default-publikasi.png'" :alt="data.judul"
            fetchpriority="high" decoding="async" class="aspect-[16/9] w-full bg-brand-50 object-cover" />

          <div class="p-5 lg:p-8">
            <!-- Baris keterangan terbitan: kategori, tanggal, jumlah dibaca. -->
            <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-ink-soft">
              <Link :href="route('publikasi.index', kategoriSlug)"
                class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-800 transition hover:bg-brand-100">
              <Tag class="size-3.5" aria-hidden="true" />
              {{ data.kategori }}
              </Link>
              <span class="inline-flex items-center gap-1.5">
                <Calendar class="size-4" aria-hidden="true" />
                {{ data.tanggal }}
              </span>
              <span class="inline-flex items-center gap-1.5">
                <Eye class="size-4" aria-hidden="true" />
                Dibaca {{ data.total_view ?? 0 }} kali
              </span>
            </div>

            <span class="mt-6 block h-1 w-12 rounded-full bg-gold-500" aria-hidden="true"></span>

            <!-- custom-prose menangani gambar CKEditor, oembed YouTube, dan
                 warna tautan; sebelumnya kelas prose ditulis manual di sini. -->
            <div class="custom-prose mt-6" v-html="convertOembed(data.isi ?? '')" />

            <a v-if="data.lampiran" :href="`/storage/${data.lampiran}`" target="_blank" rel="noopener noreferrer"
              class="group mt-8 flex items-start gap-3 rounded-card bg-surface-2 p-4 ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 active:translate-y-0 motion-reduce:transition-none">
              <span class="grid size-11 shrink-0 place-items-center rounded-control bg-white text-brand-700 ring-1 ring-line">
                <Paperclip class="size-5" aria-hidden="true" />
              </span>
              <span class="min-w-0">
                <span class="block text-sm font-semibold text-ink group-hover:text-brand-700">Unduh lampiran</span>
                <span class="mt-1 block break-words text-xs text-ink-soft">
                  {{ getOriginalFilename(data.lampiran) }}
                </span>
                <span class="sr-only">(membuka berkas di tab baru)</span>
              </span>
            </a>

            <!-- Bagikan -->
            <div class="mt-10 border-t border-line pt-6">
              <div class="flex flex-wrap items-center gap-3">
                <span class="text-sm font-semibold text-ink">Bagikan</span>

                <a :href="bagikanFacebook" target="_blank" rel="noopener noreferrer"
                  class="inline-flex items-center gap-2 rounded-control px-3 py-2 text-sm font-medium text-ink-soft ring-1 ring-line transition hover:text-brand-700 hover:ring-brand-300 motion-reduce:transition-none">
                  <Facebook class="size-4" aria-hidden="true" />
                  Facebook
                  <span class="sr-only">(membuka situs lain di tab baru)</span>
                </a>

                <a :href="bagikanWhatsapp" target="_blank" rel="noopener noreferrer"
                  class="inline-flex items-center gap-2 rounded-control px-3 py-2 text-sm font-medium text-ink-soft ring-1 ring-line transition hover:text-brand-700 hover:ring-brand-300 motion-reduce:transition-none">
                  <MessageCircle class="size-4" aria-hidden="true" />
                  WhatsApp
                  <span class="sr-only">(membuka situs lain di tab baru)</span>
                </a>

                <button type="button" @click="salinTautan"
                  class="inline-flex items-center gap-2 rounded-control px-3 py-2 text-sm font-medium text-ink-soft ring-1 ring-line transition hover:text-brand-700 hover:ring-brand-300 motion-reduce:transition-none">
                  <component :is="tersalin ? Check : Copy" class="size-4"
                    :class="tersalin ? 'text-brand-700' : ''" aria-hidden="true" />
                  {{ tersalin ? 'Tautan tersalin' : 'Salin tautan' }}
                </button>
              </div>

              <p v-if="gagalSalin" class="mt-3 text-sm text-ink-soft" role="status">
                Peramban menolak akses papan klip. Salin alamat halaman dari bilah alamat.
              </p>
              <p class="sr-only" aria-live="polite">{{ tersalin ? 'Tautan tersalin' : '' }}</p>
            </div>

            <div class="mt-8">
              <Link :href="route('publikasi.index', kategoriSlug)"
                class="group inline-flex items-center gap-2 text-sm font-semibold text-brand-700 transition hover:text-brand-800">
              <ArrowLeft class="size-4 transition-transform group-hover:-translate-x-0.5 motion-reduce:transition-none"
                aria-hidden="true" />
              Kembali ke {{ data.kategori }}
              </Link>
            </div>
          </div>
        </article>

        <aside class="min-w-0 lg:col-span-4">
          <div class="flex flex-col gap-5 lg:sticky lg:top-24">
            <CardRecentPost v-if="publikasiTerbaru.length" :data="publikasiTerbaru" />
            <CardKategori />
            <CardKontak />
          </div>
        </aside>
      </div>
    </section>
  </AppLayout>
</template>
