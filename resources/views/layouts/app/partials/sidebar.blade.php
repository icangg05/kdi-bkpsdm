@php
	$layanan = [
    [
      'title'   => 'Pensiun',
      'halaman' => 'pensiun',
      'icon'    => 'ti ti-calendar-event',
    ],
    [
      'title'   => 'Penghargaan',
      'halaman' => 'penghargaan',
      'icon'    => 'ti ti-award',
    ],
    [
      'title'   => 'Cuti ASN',
      'halaman' => 'cuti-asn',
      'icon'    => 'ti ti-file',
    ],
    [
      'title'   => 'Cerai',
      'halaman' => 'cerai',
      'icon'    => 'ti ti-parachute',
    ],
    [
      'title'   => 'Kenaikan Pangkat',
      'halaman' => 'kenaikan-pangkat',
      'icon'    => 'ti ti-trending-up',
    ],
    [
      'title'   => 'Jabatan Fungsional',
      'halaman' => 'jabatan-fungsional',
      'icon'    => 'ti ti-layout-bottombar',
    ],
    [
      'title'   => 'Mutasi Pegawai',
      'halaman' => 'mutasi-pegawai',
      'icon'    => 'ti ti-arrow-ramp-right',
    ],
    [
      'title'   => 'Tugas Belajar',
      'halaman' => 'tugas-belajar',
      'icon'    => 'ti ti-school',
    ],
    [
      'title'   => 'Konsultasi Kinerja',
      'halaman' => 'konsultasi-kinerja',
      'icon'    => 'ti ti-clipboard-list',
    ],
    [
      'title'   => 'Disiplin',
      'halaman' => 'konsultasi-kinerja',
      'icon'    => 'ti ti-shield',
      'items'   => [
        [
          'title'   => 'Informasi Kewajiban dan Larangan',
          'halaman' => 'informasi-kewajiban-dan-larangan',
        ],
        [
          'title'   => 'Konsultasi Disiplin',
          'halaman' => 'konsultasi-disiplin',
        ],
      ],
    ],
    [
      'title'   => 'COC Manajemen ASN',
      'halaman' => 'coc-manajemen-asn',
      'icon'    => 'ti ti-vocabulary',
    ],
	];
@endphp

<nav class="pc-sidebar" style="user-select: none">
	<div class="navbar-wrapper">
		<div class="m-header">
			<a href="{{ route('dashboard.home') }}" class="b-brand text-primary d-flex justify-items-center gap-2">
				<!-- ========   Change your logo from here   ============ -->
				<img src="{{ asset('img/logo-kendari.png') }}" alt="logo" width="50" />
				<div class="mt-2" style="font-weight: bold; font-size: 1.2rem; line-height: 17px">
					BKPSDM <br> <span class="text-dark" style="font-size: 0.8rem">KOTA KENDARI</span>
				</div>
			</a>
		</div>
		<div class="navbar-content pb-5">
			<ul class="pc-navbar">
				<li class="pc-item pc-caption">
					<label>Dashboard</label>
					<i class="ti ti-dashboard"></i>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard')])>
					<a href="{{ route('dashboard.home') }}" class="pc-link"><span class="pc-micon"><i
								class="ti ti-home"></i></span><span class="pc-mtext">Dashboard</span></a>
				</li>

				{{-- MENU PROFIL --}}
				<li class="pc-item pc-caption">
					<label>Profil</label>
					<i class="ti ti-news"></i>
				</li>
				<li class="pc-item">
					<a class="pc-link" href="{{ route('dashboard.halaman', 'logo') }}">
						<span class="pc-micon"><i class="ti ti-layout-rows"></i></span>
						<span class="pc-mtext">Logo BKPSDM</span>
					</a>
				</li>
				<li class="pc-item">
					<a href="{{ route('dashboard.halaman', 'sejarah') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-access-point"></i></span>
						<span class="pc-mtext">Sejarah BKPSDM</span>
					</a>
				</li>
				<li class="pc-item">
					<a href="{{ route('dashboard.halaman', 'struktur-organisasi') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-building-bank"></i></span>
						<span class="pc-mtext">Struktur Organisasi</span>
					</a>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard/pejabat*')])>
					<a href="{{ route('dashboard.pejabat.index') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-layout-2"></i></span>
						<span class="pc-mtext">Profil Pejabat</span>
					</a>
				</li>

				{{-- MENU PUBLIKASI --}}
				<li class="pc-item pc-caption">
					<label>Publikasi</label>
					<i class="ti ti-apps"></i>
				</li>
				<li @class(['pc-item', 'active' => request()->segment(2) === 'berita'])>
					<a href="{{ route('dashboard.publikasi.index', 'berita') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-typography"></i></span>
						<span class="pc-mtext">Berita</span>
					</a>
				</li>
				<li @class([
					'pc-item',
					'active' => request()->segment(2) === 'pengumuman',
				])>
					<a href="{{ route('dashboard.publikasi.index', 'pengumuman') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-bell-ringing"></i></span>
						<span class="pc-mtext">Pengumuman</span>
					</a>
				</li>
				<li @class([
					'pc-item',
					'active' => request()->segment(2) === 'ucapan-selamat',
				])>
					<a href="{{ route('dashboard.publikasi.index', 'ucapan-selamat') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-plant-2"></i></span>
						<span class="pc-mtext">Ucapan Selamat</span>
					</a>
				</li>
				<li @class([
					'pc-item',
					'active' => request()->segment(2) === 'berita-duka',
				])>
					<a href="{{ route('dashboard.publikasi.index', 'berita-duka') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-ad-2"></i></span>
						<span class="pc-mtext">Berita Duka</span>
					</a>
				</li>
				<li @class([
					'pc-item',
					'active' => request()->segment(2) === 'berita-duka',
				])>
					<a href="{{ route('dashboard.statistik-asn.index') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-chart-bar"></i></span>
						<span class="pc-mtext">Statistik ASN</span>
					</a>
				</li>

				{{-- MENU LAYANAN --}}
				<li class="pc-item pc-caption">
					<label>Layanan</label>
					<i class="ti ti-news"></i>
				</li>
				@foreach ($layanan as $item)
          @if (!isset($item['items']))
            <li @class([
              'pc-item',
              'active' => request()->segment(2) === $item['halaman'],
            ])>
              <a class="pc-link" href="{{ route('dashboard.halaman', $item['halaman']) }}">
                <span class="pc-micon"><i class="{{ $item['icon'] }}"></i></span>
                <span class="pc-mtext">{{ $item['title'] }}</span>
              </a>
            </li>
          @else
            <li @class([
              'pc-item pc-hasmenu',
            ])>
              <a href="#" class="pc-link"><span class="pc-micon"><i class="{{ $item['icon'] }}"></i></span><span
                  class="pc-mtext">{{ $item['title'] }}</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                @foreach ($item['items'] as $menu)
                  <li class="pc-item"><a class="pc-link" href="{{ route('dashboard.halaman', $menu['halaman']) }}">{{ $menu['title'] }}</a></li>
                @endforeach
              </ul>
            </li>
          @endif
				@endforeach

				{{-- MENU REGULASI --}}
				<li class="pc-item pc-caption">
					<label>Regulasi</label>
					<i class="ti ti-news"></i>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard/regulasi*')])>
					<a class="pc-link" href="{{ route('dashboard.regulasi.index') }}">
						<span class="pc-micon"><i class="ti ti-file-text"></i></span>
						<span class="pc-mtext">Regulasi</span>
					</a>
				</li>

				{{-- MENU GALERI --}}
				<li class="pc-item pc-caption">
					<label>Galeri</label>
					<i class="ti ti-news"></i>
				</li>
				<li @class([
					'pc-item',
					'active' => request()->is('/dashboard/galeri/foto*'),
				])>
					<a class="pc-link" href="{{ route('dashboard.galeri.foto.index') }}">
						<span class="pc-micon"><i class="ti ti-photo"></i></span>
						<span class="pc-mtext">Foto</span>
					</a>
				</li>
				<li @class(['pc-item', 'active' => request()->is('/dashboard/video*')])>
					<a href="{{ route('dashboard.video.index') }}" class="pc-link">
						<span class="pc-micon"><i class="ti ti-player-play"></i></span>
						<span class="pc-mtext">Video</span>
					</a>
				</li>

				<li class="pc-item pc-caption">
					<label>Hubungi Kami</label>
					<i class="ti ti-news"></i>
				</li>
				<li class="pc-item">
					<a class="pc-link" href="{{ route('dashboard.halaman', 'hubungi-kami') }}">
						<span class="pc-micon"><i class="ti ti-phone"></i></span>
						<span class="pc-mtext">Hubungi Kami</span>
					</a>
				</li>

				@can('admin')
					<li class="pc-item pc-caption">
						<label>Data Lainnya</label>
						<i class="ti ti-brand-chrome"></i>
					</li>
					<li class="pc-item">
						<a href="{{ route('dashboard.user.index') }}" class="pc-link">
							<span class="pc-micon"><i class="ti ti-users"></i></span>
							<span class="pc-mtext">Data User</span>
						</a>
					</li>
					<li class="pc-item">
						<a href="{{ route('dashboard.slider') }}" class="pc-link">
							<span class="pc-micon"><i class="ti ti-table"></i></span>
							<span class="pc-mtext">Slider Beranda</span>
						</a>
					</li>
					<li @class([
						'pc-item pc-hasmenu',
						'active' =>
							request()->is('/dashboard/jabatan*') ||
							request()->is('/dashboard/unit-organisasi*') ||
							request()->is('/dashboard/bagian*'),
					])>
						<a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
								class="pc-mtext">Struktur Jabatan</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="{{ route('dashboard.bagian.index') }}">Bagian</a></li>
							<li class="pc-item"><a class="pc-link" href="{{ route('dashboard.unit-organisasi.index') }}">Unit
									Organisasi</a></li>
							<li class="pc-item"><a class="pc-link" href="{{ route('dashboard.jabatan.index') }}">Jabatan</a></li>
							{{-- <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i
                    data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                        data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li> --}}
							{{-- <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i
                    data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                        data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li> --}}
						</ul>
					</li>
					<li @class([
						'pc-item',
						'active' => request()->is('/dashboard/kategori-regulasi*'),
					])>
						<a href="{{ route('dashboard.kategori-regulasi.index') }}" class="pc-link">
							<span class="pc-micon"><i class="ti ti-files"></i></span>
							<span class="pc-mtext">Kategori Regulasi</span>
						</a>
					</li>
				@endcan
			</ul>
			<div class="w-100 text-center">
				<div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
			</div>
		</div>
	</div>
</nav>
