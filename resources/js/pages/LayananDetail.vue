<script setup lang="ts">
import BgOverlay from '@/components/BgOverlay.vue'
import ModalMedia from '@/components/ModalMedia.vue'
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import AppLayout from '@/layouts/AppLayout.vue'
import { cariLayanan, DAFTAR_LAYANAN } from '@/lib/layanan'
import { convertOembed, getOriginalFilename, refactorFormat } from '@/lib/utils'
import { Head, Link, usePage } from '@inertiajs/vue3'
import { useIntersectionObserver } from '@vueuse/core'
import { ArrowRight, FileText, Inbox, Maximize2 } from 'lucide-vue-next'
import { computed, ref } from 'vue'

const page = usePage()
const title = page.props.title as string
const slug = page.props.layanan as string
const data = page.props.data as any

const layananIni = computed(() => cariLayanan(slug))

// Halaman disiplin dikirim sebagai koleksi dua baris; sisanya satu objek.
// Keduanya dinormalkan jadi satu bentuk supaya template tidak bercabang dua
// kali, dan barisnya di-map (bukan diakses lewat indeks) karena admin bisa
// saja baru mengisi salah satunya.
const LABEL_DISIPLIN = ['Informasi Kewajiban dan Larangan', 'Konsultasi Disiplin']

const bagian = computed(() => {
  const baris: any[] = Array.isArray(data) ? data : data ? [data] : []

  return baris.map((baris, i) => ({
    nilai: String(baris?.id ?? i),
    label: Array.isArray(data) ? (LABEL_DISIPLIN[i] ?? `Bagian ${i + 1}`) : title,
    isi: String(baris?.isi ?? '').trim(),
    lampiran: (baris?.lampiran ?? null) as string | null,
  }))
})

// `isi` yang kosong tetap datang sebagai objek dari database, jadi penjaganya
// harus isinya, bukan keberadaan objeknya. Tanpa ini /layanan/cerai merender
// kartu tanpa satu baris teks pun dan keadaan kosong tidak pernah muncul.
const adaKonten = computed(() => bagian.value.some((b) => b.isi || b.lampiran))
const pakaiTab = computed(() => bagian.value.length > 1)
// Petunjuk perbesar gambar hanya muncul kalau isinya memang punya gambar.
const adaGambar = computed(() => bagian.value.some((b) => /<img[\s>]/i.test(b.isi)))

// CKEditor menulis <img> tanpa atribut pemuatan, dan pada beberapa layanan
// seluruh prosedur berupa infografis besar. Gambar dibuat bisa difokus dan
// diperbesar supaya masih terbaca di layar sempit.
function siapkanIsi(html: string) {
  return convertOembed(refactorFormat(html)).replace(
    /<img /g,
    '<img loading="lazy" decoding="async" tabindex="0" role="button" ',
  )
}

const gambarAktif = ref<string | null>(null)

function bukaGambar(e: Event) {
  const target = e.target as HTMLElement | null
  if (!target || target.tagName !== 'IMG') return
  e.preventDefault()
  const img = target as HTMLImageElement
  gambarAktif.value = img.currentSrc || img.src
}

function ekstensi(path: string) {
  const bagian = path.split('.').pop()
  return bagian && bagian.length <= 5 ? bagian.toUpperCase() : 'BERKAS'
}

// Stagger daftar layanan dipicu saat masuk viewport. Di desktop rail ini ada
// di atas lipatan, di mobile ia jauh di bawah isi, jadi mount bukan pemicu
// yang tepat.
const rail = ref<HTMLElement | null>(null)
const railTerlihat = ref(false)

const { stop } = useIntersectionObserver(
  rail,
  ([entry]) => {
    if (!entry?.isIntersecting) return
    railTerlihat.value = true
    stop()
  },
  { rootMargin: '-5% 0px' },
)
</script>

<template>

  <Head :title="title" />

  <AppLayout>
    <BgOverlay src="/img/bg-layanan.jpg">
      <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gold-400">Layanan Kepegawaian</p>
      <h1 class="mt-3 text-2xl font-bold leading-[1.15] text-white sm:text-3xl lg:text-[2.6rem]">{{ title }}</h1>
      <p v-if="layananIni" class="mx-auto mt-3 max-w-xl text-sm text-brand-200 lg:text-base">
        {{ layananIni.desc }}
      </p>
      <span class="mx-auto mt-5 block h-1 w-16 rounded-full bg-gold-500" aria-hidden="true"></span>

      <Breadcrumb class="mt-5">
        <BreadcrumbList class="justify-center text-brand-100">
          <BreadcrumbItem>
            <BreadcrumbLink as-child class="text-sm hover:text-white hover:underline lg:text-base">
              <Link :href="route('beranda')">Beranda</Link>
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator class="text-brand-200/70" />
          <BreadcrumbItem>
            <BreadcrumbLink as-child class="text-sm hover:text-white hover:underline lg:text-base">
              <Link :href="route('layanan')">Layanan</Link>
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
      <!-- Motif titik dan dua sapuan warna, sama seperti seksi daftar regulasi,
           supaya halaman detail terbaca sebagai bagian dari sistem yang sama. -->
      <div aria-hidden="true"
        class="absolute inset-0 -z-10 opacity-[0.35] [background-image:radial-gradient(var(--color-brand-200)_1px,transparent_1px)] [background-size:22px_22px]">
      </div>
      <div aria-hidden="true" class="absolute -right-24 -top-24 -z-10 size-72 rounded-full bg-brand-200/40 blur-3xl">
      </div>
      <div aria-hidden="true" class="absolute -bottom-32 -left-24 -z-10 size-80 rounded-full bg-gold-400/15 blur-3xl">
      </div>

      <div class="container grid gap-8 lg:grid-cols-12 lg:gap-10">
        <!-- Rail layanan. Di desktop ia kolom kiri yang menempel; di mobile ia
             turun ke bawah isi (order-2) supaya pengunjung yang sudah memilih
             satu layanan tidak harus melewati sebelas tautan dulu. -->
        <aside ref="rail" class="order-2 min-w-0 lg:order-1 lg:col-span-4">
          <div class="lg:sticky lg:top-24">
            <h2 class="text-base font-semibold text-ink lg:text-lg">Semua Layanan</h2>
            <span class="mt-2 block h-0.5 w-10 rounded-full bg-gold-500" aria-hidden="true"></span>

            <nav aria-label="Daftar layanan kepegawaian" class="mt-4 flex flex-col gap-2">
              <Link v-for="(item, i) in DAFTAR_LAYANAN" :key="item.slug" :href="route('layanan.detail', item.slug)"
                :aria-current="item.slug === slug ? 'page' : undefined" :style="{ transitionDelay: `${i * 35}ms` }"
                :class="[
                  'group flex items-center gap-3 rounded-card p-3 ring-1 transition duration-500 ease-out motion-reduce:transition-none',
                  railTerlihat ? 'translate-y-0 opacity-100' : 'translate-y-3 opacity-0 motion-reduce:translate-y-0 motion-reduce:opacity-100',
                  item.slug === slug
                    ? 'bg-brand-700 text-white ring-brand-700'
                    : 'bg-surface text-ink ring-line hover:-translate-y-0.5 hover:ring-brand-300',
                ]">
              <span :class="[
                'grid size-9 shrink-0 place-items-center rounded-control transition',
                item.slug === slug ? 'bg-white/15 text-white' : 'bg-brand-50 text-brand-700 group-hover:bg-brand-100',
              ]">
                <component :is="item.icon" class="size-4" aria-hidden="true" />
              </span>
              <span class="min-w-0 flex-1 text-sm font-medium">{{ item.label }}</span>
              <ArrowRight :class="[
                'size-4 shrink-0 transition-transform',
                item.slug === slug ? 'text-white' : 'text-ink-soft group-hover:translate-x-0.5 group-hover:text-brand-700',
              ]" aria-hidden="true" />
              </Link>
            </nav>
          </div>
        </aside>

        <!-- Isi layanan -->
        <div class="order-1 min-w-0 lg:order-2 lg:col-span-8">
          <article class="rounded-card bg-surface p-5 ring-1 ring-line lg:p-8">
            <h2 class="text-2xl font-bold text-ink lg:text-3xl">{{ title }}</h2>
            <span class="mt-3 block h-1 w-12 rounded-full bg-gold-500" aria-hidden="true"></span>

            <!-- Keadaan kosong: isi bisa saja belum ditulis admin sementara
                 lampirannya sudah ada, atau dua-duanya belum ada. -->
            <div v-if="!adaKonten"
              class="mt-8 rounded-card border border-dashed border-line bg-surface-2 px-5 py-10 text-center">
              <span class="mx-auto grid size-12 place-items-center rounded-full bg-brand-50 text-brand-700">
                <Inbox class="size-5" aria-hidden="true" />
              </span>
              <p class="mt-4 text-base font-semibold text-ink">Informasi layanan ini belum dipublikasikan</p>
              <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-ink-soft">
                Prosedur dan persyaratan {{ title.toLowerCase() }} sedang disiapkan. Untuk keperluan mendesak,
                hubungi kami pada jam kerja.
              </p>
              <Link :href="route('hubungi-kami')"
                class="mt-6 inline-flex items-center gap-2 rounded-control bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 active:translate-y-px">
              Hubungi Kami
              <ArrowRight class="size-4" aria-hidden="true" />
              </Link>
            </div>

            <template v-else>
              <!-- Layanan berisi lebih dari satu bagian (disiplin) memakai tab.
                   Di bawah sm tab ditumpuk satu kolom; TabsList bawaan memakai
                   tinggi tetap yang memotong label pada susunan vertikal. -->
              <Tabs v-if="pakaiTab" :default-value="bagian[0].nilai" class="mt-8 w-full">
                <TabsList class="grid h-auto w-full grid-cols-1 gap-1 rounded-control p-1 sm:grid-cols-2">
                  <TabsTrigger v-for="b in bagian" :key="b.nilai" :value="b.nilai"
                    class="h-auto whitespace-normal rounded-control px-3 py-2.5 text-center leading-snug">
                    {{ b.label }}
                  </TabsTrigger>
                </TabsList>

                <TabsContent v-for="b in bagian" :key="b.nilai" :value="b.nilai" class="mt-6">
                  <div v-if="b.isi" class="custom-prose isi-layanan" @click="bukaGambar"
                    @keydown.enter.self="bukaGambar" v-html="siapkanIsi(b.isi)"></div>
                  <p v-else class="text-sm text-ink-soft">Bagian ini belum diisi.</p>

                  <a v-if="b.lampiran" :href="`/storage/${b.lampiran}`" target="_blank" rel="noopener noreferrer"
                    class="group mt-6 flex items-center gap-4 rounded-card bg-surface-2 p-4 ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 active:translate-y-0">
                    <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                      <FileText class="size-5" aria-hidden="true" />
                    </span>
                    <span class="min-w-0 flex-1">
                      <span class="block text-sm font-semibold text-ink">Unduh berkas lampiran</span>
                      <span class="mt-0.5 block truncate text-xs text-ink-soft">{{ getOriginalFilename(b.lampiran)
                        }}</span>
                    </span>
                    <span
                      class="shrink-0 rounded-full bg-brand-700 px-3 py-1 text-xs font-semibold tracking-wide text-white">
                      {{ ekstensi(b.lampiran) }}
                    </span>
                    <span class="sr-only">(membuka di tab baru)</span>
                  </a>
                </TabsContent>
              </Tabs>

              <template v-else>
                <div v-if="bagian[0].isi" class="custom-prose isi-layanan mt-8" @click="bukaGambar"
                  @keydown.enter.self="bukaGambar" v-html="siapkanIsi(bagian[0].isi)"></div>

                <p v-else class="mt-8 text-sm leading-relaxed text-ink-soft">
                  Uraian layanan ini belum ditulis. Berkas resminya tersedia di bawah.
                </p>

                <a v-if="bagian[0].lampiran" :href="`/storage/${bagian[0].lampiran}`" target="_blank"
                  rel="noopener noreferrer"
                  class="group mt-6 flex items-center gap-4 rounded-card bg-surface-2 p-4 ring-1 ring-line transition hover:-translate-y-0.5 hover:ring-brand-300 active:translate-y-0">
                  <span class="grid size-11 shrink-0 place-items-center rounded-control bg-brand-50 text-brand-700">
                    <FileText class="size-5" aria-hidden="true" />
                  </span>
                  <span class="min-w-0 flex-1">
                    <span class="block text-sm font-semibold text-ink">Unduh berkas lampiran</span>
                    <span class="mt-0.5 block truncate text-xs text-ink-soft">{{ getOriginalFilename(bagian[0].lampiran)
                      }}</span>
                  </span>
                  <span
                    class="shrink-0 rounded-full bg-brand-700 px-3 py-1 text-xs font-semibold tracking-wide text-white">
                    {{ ekstensi(bagian[0].lampiran) }}
                  </span>
                  <span class="sr-only">(membuka di tab baru)</span>
                </a>
              </template>

              <p v-if="adaGambar" class="mt-8 flex items-center gap-2 border-t border-line pt-5 text-xs text-ink-soft">
                <Maximize2 class="size-3.5 shrink-0" aria-hidden="true" />
                Klik gambar untuk memperbesar.
              </p>
            </template>
          </article>
        </div>
      </div>
    </section>

    <ModalMedia :open="gambarAktif !== null" :judul="title" @update:open="gambarAktif = null">
      <img v-if="gambarAktif" :src="gambarAktif" :alt="`Infografis layanan ${title}`"
        class="max-h-[75dvh] w-full bg-surface-2 object-contain" />
    </ModalMedia>
  </AppLayout>
</template>

<style scoped>
/* Gambar prosedur sering jadi satu-satunya isi halaman, jadi ia harus terbaca
   sebagai sesuatu yang bisa dibuka, bukan sekadar hiasan. */
.isi-layanan :deep(img) {
  cursor: zoom-in;
  transition: opacity 0.2s ease;
}

.isi-layanan :deep(img:hover) {
  opacity: 0.92;
}
</style>
