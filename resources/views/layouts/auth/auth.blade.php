<!DOCTYPE html>
<html lang="id" data-pc-theme="light" data-pc-preset="preset-1">

<head>
	@include('layouts.auth.partials.head')
</head>

<body>
	<div class="bk-auth">
		<aside class="bk-auth__panel">
			<div class="bk-auth__panel-inner">
				<img src="{{ asset('img/logo-kendari.png') }}" alt="Lambang Kota Kendari" class="bk-auth__lambang" />

				<h1>Pengelolaan informasi kepegawaian Kota Kendari</h1>
				<div class="bk-auth__rule"></div>
				<p>
					Berita, pengumuman, regulasi, profil pejabat, dan statistik ASN yang tampil di
					bkpsdm.kendarikota.go.id dikelola dari ruang ini.
				</p>

				<p class="bk-auth__foot">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</p>
			</div>
		</aside>

		<main class="bk-auth__form">
			<div class="bk-auth__card bk-rise">
				<a href="{{ route('beranda') }}" class="bk-auth__mark">
					<img src="{{ asset('img/logo-bkpsdm.png') }}" alt="" aria-hidden="true" />
					<div>
						<strong>BKPSDM</strong>
						<span>Kota Kendari</span>
					</div>
				</a>

				@yield('content')

				<p class="bk-auth__legal">
					Akun dibuat oleh administrator. Belum punya akses? Hubungi pengelola situs di
					Sekretariat BKPSDM Kota Kendari.
				</p>
			</div>
		</main>
	</div>

	@include('layouts.auth.partials.footer')
</body>

</html>
