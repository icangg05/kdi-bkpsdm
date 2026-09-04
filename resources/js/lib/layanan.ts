import {
  Award,
  BadgePlus,
  BookOpen,
  Briefcase,
  CalendarCheck,
  ClipboardList,
  HeartCrack,
  Shield,
  Shuffle,
  TrendingUp,
  type LucideIcon,
} from 'lucide-vue-next'

export type Layanan = {
  label: string
  desc: string
  slug: string
  icon: LucideIcon
}

// Satu sumber kebenaran untuk daftar layanan. Sebelumnya daftar ini ditulis
// dua kali: sebelas butir di InformasiLayanan.vue dan tujuh butir di sidebar
// halaman detail, sehingga empat layanan (cerai, cuti-asn, jabatan-fungsional,
// coc-manajemen-asn) tidak punya jalan navigasi setelah dibuka.
// Urutannya mengikuti frekuensi pertanyaan yang masuk ke loket, bukan abjad.
export const DAFTAR_LAYANAN: Layanan[] = [
  { label: 'Pensiun', desc: 'Prosedur dan syarat pengajuan pensiun ASN', slug: 'pensiun', icon: CalendarCheck },
  { label: 'Kenaikan Pangkat', desc: 'Kenaikan pangkat dan inpassing pensiun', slug: 'kenaikan-pangkat', icon: TrendingUp },
  { label: 'Cuti ASN', desc: 'Alur pengajuan cuti bagi PNS dan PPPK', slug: 'cuti-asn', icon: CalendarCheck },
  { label: 'Mutasi Pegawai', desc: 'Mutasi antar unit kerja atau instansi', slug: 'mutasi-pegawai', icon: Shuffle },
  { label: 'Jabatan Fungsional', desc: 'Informasi dan pembinaan jabatan fungsional', slug: 'jabatan-fungsional', icon: Briefcase },
  { label: 'Tugas Belajar', desc: 'Ketentuan dan proses pengajuan tugas belajar', slug: 'tugas-belajar', icon: BookOpen },
  { label: 'Penghargaan', desc: 'Pengajuan dan informasi penghargaan ASN', slug: 'penghargaan', icon: Award },
  { label: 'Konsultasi Kinerja', desc: 'Evaluasi dan penyusunan SKP ASN', slug: 'konsultasi-kinerja', icon: ClipboardList },
  { label: 'Disiplin', desc: 'Kewajiban, larangan, dan konsultasi disiplin', slug: 'disiplin', icon: Shield },
  { label: 'COC Manajemen ASN', desc: 'Kode etik dan perilaku ASN', slug: 'coc-manajemen-asn', icon: BadgePlus },
  { label: 'Cerai', desc: 'Pengurusan izin perceraian sesuai peraturan', slug: 'cerai', icon: HeartCrack },
]

export function cariLayanan(slug: string): Layanan | undefined {
  return DAFTAR_LAYANAN.find((l) => l.slug === slug)
}
