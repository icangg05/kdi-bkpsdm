@php
  $layanan = [
    ['title' => 'Pensiun', 'halaman' => 'pensiun', 'icon' => 'ti ti-calendar-event'],
    ['title' => 'Penghargaan', 'halaman' => 'penghargaan', 'icon' => 'ti ti-award'],
    ['title' => 'Cuti ASN', 'halaman' => 'cuti-asn', 'icon' => 'ti ti-file-text'],
    ['title' => 'Cerai', 'halaman' => 'cerai', 'icon' => 'ti ti-user-minus'],
    ['title' => 'Kenaikan Pangkat', 'halaman' => 'kenaikan-pangkat', 'icon' => 'ti ti-trending-up'],
    ['title' => 'Jabatan Fungsional', 'halaman' => 'jabatan-fungsional', 'icon' => 'ti ti-briefcase'],
    ['title' => 'Mutasi Pegawai', 'halaman' => 'mutasi-pegawai', 'icon' => 'ti ti-arrow-ramp-right'],
    ['title' => 'Tugas Belajar', 'halaman' => 'tugas-belajar', 'icon' => 'ti ti-school'],
    ['title' => 'Konsultasi Kinerja', 'halaman' => 'konsultasi-kinerja', 'icon' => 'ti ti-clipboard-list'],
    [
      'title' => 'Disiplin',
      'icon'  => 'ti ti-shield',
      'items' => [
        ['title' => 'Informasi Kewajiban dan Larangan', 'halaman' => 'informasi-kewajiban-dan-larangan'],
        ['title' => 'Konsultasi Disiplin', 'halaman' => 'konsultasi-disiplin'],
      ],
    ],
    ['title' => 'COC Manajemen ASN', 'halaman' => 'coc-manajemen-asn', 'icon' => 'ti ti-vocabulary'],
  ];

  // Halaman statis disimpan di dashboard/halaman/{kategori}, jadi kategorinya
  // ada di segmen ketiga — bukan kedua seperti sebelumnya, yang membuat
  // seluruh menu Layanan tidak pernah menyala.
  $kategoriHalaman = request()->is('dashboard/halaman/*') ? request()->segment(3) : null;

  // Publikasi disimpan di dashboard/publikasi/{jenis}, sumber masalah yang sama.
  $jenisPublikasi = request()->is('dashboard/publikasi/*') ? request()->segment(3) : null;
@endphp

<nav class="pc-sidebar" aria-label="Menu dashboard">
	<div class="navbar-wrapper">
		<div class="m-header">
			<a href="{{ route('dashboard.home') }}" class="b-brand d-flex gap-2">
				<img src="{{ asset('img/logo-kendari.png') }}" alt="" aria-hidden="true" width="46" height="46" />
				<div style="font-weight: 700; line-height: 1.15">
					BKPSDM
					<br>
					<span class="text-dark" style="font-size: 0.6875rem">Kota Kendari</span>
				</div>
			</a>
		</div>

		<div class="navbar-content pb-5">
			<ul class="pc-navbar">
				<li class="pc-item pc-caption">
					<label>Ringkasan</label>
					<i class="ti ti-dashboard" aria-hidden="true"></i>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard')])>
					<a href="{{ route('dashboard.home') }}" class="pc-link"
						@if (request()->is('dashboard')) aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-home" aria-hidden="true"></i></span>
						<span class="pc-mtext">Beranda</span>
					</a>
				</li>

				{{-- PROFIL --}}
				<li class="pc-item pc-caption">
					<label>Profil</label>
					<i class="ti ti-building-bank" aria-hidden="true"></i>
				</li>
				<li @class(['pc-item', 'active' => $kategoriHalaman === 'logo'])>
					<a class="pc-link" href="{{ route('dashboard.halaman', 'logo') }}"
						@if ($kategoriHalaman === 'logo') aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-polaroid" aria-hidden="true"></i></span>
						<span class="pc-mtext">Logo BKPSDM</span>
					</a>
				</li>
				<li @class(['pc-item', 'active' => $kategoriHalaman === 'sejarah'])>
					<a href="{{ route('dashboard.halaman', 'sejarah') }}" class="pc-link"
						@if ($kategoriHalaman === 'sejarah') aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-book" aria-hidden="true"></i></span>
						<span class="pc-mtext">Sejarah BKPSDM</span>
					</a>
				</li>
				<li @class(['pc-item', 'active' => $kategoriHalaman === 'struktur-organisasi'])>
					<a href="{{ route('dashboard.halaman', 'struktur-organisasi') }}" class="pc-link"
						@if ($kategoriHalaman === 'struktur-organisasi') aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-sitemap" aria-hidden="true"></i></span>
						<span class="pc-mtext">Struktur Organisasi</span>
					</a>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard/pejabat*')])>
					<a href="{{ route('dashboard.pejabat.index') }}" class="pc-link"
						@if (request()->is('dashboard/pejabat*')) aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-id" aria-hidden="true"></i></span>
						<span class="pc-mtext">Profil Pejabat</span>
					</a>
				</li>

				{{-- PUBLIKASI --}}
				<li class="pc-item pc-caption">
					<label>Publikasi</label>
					<i class="ti ti-news" aria-hidden="true"></i>
				</li>
				@foreach ([['berita', 'Berita', 'ti ti-news'], ['pengumuman', 'Pengumuman', 'ti ti-bell-ringing'], ['ucapan-selamat', 'Ucapan Selamat', 'ti ti-confetti'], ['berita-duka', 'Berita Duka', 'ti ti-flag']] as [$slug, $label, $ikon])
					<li @class(['pc-item', 'active' => $jenisPublikasi === $slug])>
						<a href="{{ route('dashboard.publikasi.index', $slug) }}" class="pc-link"
							@if ($jenisPublikasi === $slug) aria-current="page" @endif>
							<span class="pc-micon"><i class="{{ $ikon }}" aria-hidden="true"></i></span>
							<span class="pc-mtext">{{ $label }}</span>
						</a>
					</li>
				@endforeach
				<li @class(['pc-item', 'active' => request()->is('dashboard/statistik-asn*')])>
					<a href="{{ route('dashboard.statistik-asn.index') }}" class="pc-link"
						@if (request()->is('dashboard/statistik-asn*')) aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-chart-bar" aria-hidden="true"></i></span>
						<span class="pc-mtext">Statistik ASN</span>
					</a>
				</li>

				{{-- LAYANAN --}}
				<li class="pc-item pc-caption">
					<label>Layanan</label>
					<i class="ti ti-clipboard" aria-hidden="true"></i>
				</li>
				@foreach ($layanan as $item)
					@if (!isset($item['items']))
						@php $aktif = $kategoriHalaman === $item['halaman']; @endphp
						<li @class(['pc-item', 'active' => $aktif])>
							<a class="pc-link" href="{{ route('dashboard.halaman', $item['halaman']) }}"
								@if ($aktif) aria-current="page" @endif>
								<span class="pc-micon"><i class="{{ $item['icon'] }}" aria-hidden="true"></i></span>
								<span class="pc-mtext">{{ $item['title'] }}</span>
							</a>
						</li>
					@else
						@php $aktif = in_array($kategoriHalaman, array_column($item['items'], 'halaman'), true); @endphp
						<li @class(['pc-item', 'pc-hasmenu', 'active pc-trigger' => $aktif])>
							<a href="#!" class="pc-link">
								<span class="pc-micon"><i class="{{ $item['icon'] }}" aria-hidden="true"></i></span>
								<span class="pc-mtext">{{ $item['title'] }}</span>
								<span class="pc-arrow"><i class="ti ti-chevron-right" aria-hidden="true"></i></span>
							</a>
							<ul class="pc-submenu">
								@foreach ($item['items'] as $menu)
									<li @class(['pc-item', 'active' => $kategoriHalaman === $menu['halaman']])>
										<a class="pc-link" href="{{ route('dashboard.halaman', $menu['halaman']) }}"
											@if ($kategoriHalaman === $menu['halaman']) aria-current="page" @endif>
											{{ $menu['title'] }}
										</a>
									</li>
								@endforeach
							</ul>
						</li>
					@endif
				@endforeach

				{{-- REGULASI --}}
				<li class="pc-item pc-caption">
					<label>Regulasi</label>
					<i class="ti ti-scale" aria-hidden="true"></i>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard/regulasi*')])>
					<a class="pc-link" href="{{ route('dashboard.regulasi.index') }}"
						@if (request()->is('dashboard/regulasi*')) aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-license" aria-hidden="true"></i></span>
						<span class="pc-mtext">Regulasi</span>
					</a>
				</li>

				{{-- GALERI --}}
				<li class="pc-item pc-caption">
					<label>Galeri</label>
					<i class="ti ti-photo" aria-hidden="true"></i>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard/galeri/foto*')])>
					<a class="pc-link" href="{{ route('dashboard.galeri.foto.index') }}"
						@if (request()->is('dashboard/galeri/foto*')) aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-photo" aria-hidden="true"></i></span>
						<span class="pc-mtext">Foto</span>
					</a>
				</li>
				<li @class(['pc-item', 'active' => request()->is('dashboard/video*')])>
					<a href="{{ route('dashboard.video.index') }}" class="pc-link"
						@if (request()->is('dashboard/video*')) aria-current="page" @endif>
						<span class="pc-micon"><i class="ti ti-player-play" aria-hidden="true"></i></span>
						<span class="pc-mtext">Video</span>
					</a>
				</li>

				{{-- SISTEM --}}
				@can('admin')
					<li class="pc-item pc-caption">
						<label>Sistem</label>
						<i class="ti ti-database" aria-hidden="true"></i>
					</li>
					<li @class(['pc-item', 'active' => request()->is('dashboard/backup*')])>
						<a href="{{ route('dashboard.backup.index') }}" class="pc-link"
							@if (request()->is('dashboard/backup*')) aria-current="page" @endif>
							<span class="pc-micon"><i class="ti ti-database" aria-hidden="true"></i></span>
							<span class="pc-mtext">Backup Database</span>
						</a>
					</li>
				@endcan

				@can('admin')
					<li class="pc-item pc-caption">
						<label>Data Lainnya</label>
						<i class="ti ti-adjustments" aria-hidden="true"></i>
					</li>
					<li @class(['pc-item', 'active' => request()->is('dashboard/user*')])>
						<a href="{{ route('dashboard.user.index') }}" class="pc-link"
							@if (request()->is('dashboard/user*')) aria-current="page" @endif>
							<span class="pc-micon"><i class="ti ti-users" aria-hidden="true"></i></span>
							<span class="pc-mtext">Data User</span>
						</a>
					</li>
					<li @class(['pc-item', 'active' => request()->is('dashboard/slider*')])>
						<a href="{{ route('dashboard.slider') }}" class="pc-link"
							@if (request()->is('dashboard/slider*')) aria-current="page" @endif>
							<span class="pc-micon"><i class="ti ti-slideshow" aria-hidden="true"></i></span>
							<span class="pc-mtext">Slider Beranda</span>
						</a>
					</li>

					@php
						$strukturAktif =
						    request()->is('dashboard/jabatan*') ||
						    request()->is('dashboard/unit-organisasi*') ||
						    request()->is('dashboard/bagian*');
					@endphp
					<li @class(['pc-item', 'pc-hasmenu', 'active pc-trigger' => $strukturAktif])>
						<a href="#!" class="pc-link">
							<span class="pc-micon"><i class="ti ti-hierarchy-2" aria-hidden="true"></i></span>
							<span class="pc-mtext">Struktur Jabatan</span>
							<span class="pc-arrow"><i class="ti ti-chevron-right" aria-hidden="true"></i></span>
						</a>
						<ul class="pc-submenu">
							<li @class(['pc-item', 'active' => request()->is('dashboard/bagian*')])>
								<a class="pc-link" href="{{ route('dashboard.bagian.index') }}">Bagian</a>
							</li>
							<li @class(['pc-item', 'active' => request()->is('dashboard/unit-organisasi*')])>
								<a class="pc-link" href="{{ route('dashboard.unit-organisasi.index') }}">Unit Organisasi</a>
							</li>
							<li @class(['pc-item', 'active' => request()->is('dashboard/jabatan*')])>
								<a class="pc-link" href="{{ route('dashboard.jabatan.index') }}">Jabatan</a>
							</li>
						</ul>
					</li>

					<li @class(['pc-item', 'active' => request()->is('dashboard/kategori-regulasi*')])>
						<a href="{{ route('dashboard.kategori-regulasi.index') }}" class="pc-link"
							@if (request()->is('dashboard/kategori-regulasi*')) aria-current="page" @endif>
							<span class="pc-micon"><i class="ti ti-files" aria-hidden="true"></i></span>
							<span class="pc-mtext">Kategori Regulasi</span>
						</a>
					</li>
				@endcan
			</ul>
		</div>
	</div>
</nav>

<script>
	// Ingat posisi gulir sidebar antar halaman (SimpleBar dipasang di footer,
	// jadi elemen penggulir baru ada setelah load).
	window.addEventListener('load', function () {
		var el = document.querySelector('.navbar-content .simplebar-content-wrapper')
			|| document.querySelector('.navbar-content');
		if (!el) return;

		el.scrollTop = sessionStorage.getItem('sidebarScroll') || 0;
		el.addEventListener('scroll', function () {
			sessionStorage.setItem('sidebarScroll', el.scrollTop);
		}, { passive: true });
	});
</script>
