@extends('layouts.app.dashboard')

@section('content')
	@php
		$nilai = fn(string $slug) => (int) ($statistikASN->firstWhere('slug', $slug)->value ?? 0);

		$tanggalUpdate = $statistikASN->firstWhere('slug', 'tanggal_update')?->value;

		$kartu = [
		    ['label' => 'Jumlah PNS', 'nilai' => $nilai('pns'), 'ikon' => 'ti ti-user-check', 'gaya' => 'bk-stat--dark'],
		    ['label' => 'Jumlah PPPK', 'nilai' => $nilai('pppk'), 'ikon' => 'ti ti-user-plus', 'gaya' => 'bk-stat--accent'],
		    ['label' => 'Total Regulasi', 'nilai' => $totalRegulasi, 'ikon' => 'ti ti-scale', 'gaya' => ''],
		    ['label' => 'Total Pejabat', 'nilai' => $totalPejabat, 'ikon' => 'ti ti-id', 'gaya' => ''],
		];
	@endphp

	<div class="page-header bk-rise">
		<div class="page-block">
			<h1 class="h5 m-b-10">Selamat datang, {{ auth()->user()->name }}</h1>
			<p class="mb-0 text-muted">
				Ringkasan isi situs BKPSDM Kota Kendari per hari ini.
			</p>
		</div>
	</div>

	<div class="row g-3">
		@foreach ($kartu as $i => $item)
			<div class="col-6 col-xl-3">
				<div class="bk-stat {{ $item['gaya'] }} bk-rise bk-rise-{{ $i + 1 }}">
					<span class="bk-stat__icon"><i class="{{ $item['ikon'] }}" aria-hidden="true"></i></span>
					<span class="bk-stat__value">{{ number_format($item['nilai'], 0, ',', '.') }}</span>
					<p class="bk-stat__label">{{ $item['label'] }}</p>
					@if ($loop->index < 2 && $tanggalUpdate)
						<p class="bk-stat__meta">
							Diperbarui {{ \Carbon\Carbon::parse($tanggalUpdate)->translatedFormat('j F Y') }}
						</p>
					@endif
				</div>
			</div>
		@endforeach
	</div>

	<div class="row g-3 mt-0">
		<div class="col-lg-7">
			<div class="card bk-rise bk-rise-3">
				<div class="card-header">
					<h2 class="h5">Jalan pintas</h2>
				</div>
				<div class="card-body">
					<div class="row g-2">
						@foreach ([['Tulis berita', 'ti ti-news', route('dashboard.publikasi.create', 'berita')], ['Tambah pengumuman', 'ti ti-bell-ringing', route('dashboard.publikasi.create', 'pengumuman')], ['Unggah regulasi', 'ti ti-file-text', route('dashboard.regulasi.create')], ['Perbarui statistik ASN', 'ti ti-chart-bar', route('dashboard.statistik-asn.index')], ['Tambah foto galeri', 'ti ti-photo', route('dashboard.galeri.foto.create')], ...(auth()->user()->can('admin') ? [['Backup database', 'ti ti-database', route('dashboard.backup.index')]] : [])] as [$label, $ikon, $tautan])
							<div class="col-sm-6">
								<a href="{{ $tautan }}" class="btn btn-secondary w-100 d-flex align-items-center gap-2 text-start">
									<i class="{{ $ikon }}" aria-hidden="true"></i>
									{{ $label }}
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-5">
			<div class="card bk-rise bk-rise-4">
				<div class="card-header">
					<h2 class="h5">Publikasi terbaru</h2>
				</div>
				<div class="card-body">
					@php $sorotan = $publikasiTerbaru->first(); @endphp

					@if ($sorotan)
						<img
							src="{{ $sorotan->sampul ? asset("storage/$sorotan->sampul") : asset('img/default-publikasi.png') }}"
							alt="Sampul {{ $sorotan->judul }}"
							class="bk-feed__cover mb-3"
							loading="lazy" />

						<ul class="list-unstyled mb-3">
							@foreach ($publikasiTerbaru as $item)
								<li class="bk-feed__item">
									<a href="{{ route('berita.show', $item->slug) }}" class="bk-feed__link" target="_blank"
										rel="noopener noreferrer">
										{{ $item->judul }}
										<span class="visually-hidden">(membuka situs publik di tab baru)</span>
									</a>
									<span class="bk-feed__kategori">
										{{ str_replace('-', ' ', str()->title($item->kategori)) }}
									</span>
								</li>
							@endforeach
						</ul>

						<a href="{{ route('dashboard.publikasi.index', 'berita') }}" class="btn btn-secondary w-100">
							Kelola publikasi
						</a>
					@else
						<div class="bk-empty">
							<i class="ti ti-news" aria-hidden="true"></i>
							<p class="mb-3">Belum ada publikasi yang terbit.</p>
							<a href="{{ route('dashboard.publikasi.create', 'berita') }}" class="btn btn-primary">
								Tulis berita pertama
							</a>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
