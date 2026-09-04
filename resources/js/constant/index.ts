export const menu = [
  {
    label: 'Beranda',
    link: route('beranda'),
  },
  {
    label: 'Profil',
    link: '#',
    items: [
      {
        label: 'Logo BKPSDM',
        link: route('profil', 'logo'),
      },
      {
        label: 'Sejarah BKPSDM',
        link: route('profil', 'sejarah'),
      },
      {
        label: 'Struktur Organisasi',
        link: route('profil', 'struktur-organisasi'),
      },
      {
        label: 'Profil Pejabat',
        link: route('profil', 'pejabat'),
      },
    ]
  },
  {
    label: 'Publikasi',
    link: '#',
    items: [
      {
        label: 'Berita',
        link: route('publikasi.index', 'berita'),
      },
      {
        label: 'Pengumuman',
        link: route('publikasi.index', 'pengumuman'),
      },
      {
        label: 'Statistik Pegawai',
        link: route('statistik-pegawai'),
      },
      {
        label: 'Ucapan Selamat',
        link: route('publikasi.index', 'ucapan-selamat'),
      },
      {
        label: 'Berita Duka',
        link: route('publikasi.index', 'berita-duka')
      }
    ]
  },
  {
    label: 'Layanan',
    link: route('layanan'),
  },
  {
    label: 'Regulasi',
    link: route('regulasi', 'all')
  },
  {
    label: 'Galeri',
    link: '#',
    items: [
      {
        label: 'Foto',
        link: route('galeri-foto'),
      },
      {
        label: 'Video',
        link: route('galeri-video'),
      },
    ]
  },
  {
    label: 'Hubungi Kami',
    link: route('hubungi-kami')
  },
]
