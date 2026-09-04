// Satu palet untuk seluruh grafik statistik ASN, diturunkan dari palet
// "Balaikota" di resources/css/app.css. Sebelumnya tiap grafik memakai deret
// warnanya sendiri (sky, orange, emerald, pink, purple, indigo, teal).
//
// Sengaja satu rona (biru) dari gelap ke terang, bukan pelangi: kategori
// pendidikan dan jabatan itu berurutan, dan emas tetap disimpan sebagai
// penanda kecil di halaman, bukan warna yang mengisi separuh diagram.
export const WARNA_GRAFIK = [
  '#14213d',
  '#1b2c52',
  '#26407a',
  '#33529a',
  '#4a6bb8',
  '#6f8cc6',
  '#9db2da',
  '#c4d2ea',
  '#e2eaf6',
]

export const TINTA = '#16202e'
export const TINTA_LEMBUT = '#4a5768'

// Label putih tidak terbaca di atas empat langkah paling terang, jadi warnanya
// ikut per potongan, bukan satu warna untuk semua.
export const WARNA_LABEL = WARNA_GRAFIK.map((_, i) => (i < 5 ? '#ffffff' : TINTA))

export const opsiDasar = {
  chart: {
    fontFamily: 'IBM Plex Sans, ui-sans-serif, system-ui, sans-serif',
    foreColor: TINTA_LEMBUT,
    toolbar: { show: false },
    animations: { enabled: true, speed: 400 },
  },
  legend: {
    position: 'bottom' as const,
    fontSize: '13px',
    labels: { colors: TINTA_LEMBUT },
    markers: { radius: 3 },
  },
  tooltip: {
    y: { formatter: (val: number) => `${val} orang` },
  },
}
