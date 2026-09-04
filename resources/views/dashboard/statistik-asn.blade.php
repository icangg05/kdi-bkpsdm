@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.statistik-asn.index')], ['Ubah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ $title }}</h2>
		</div>
		<div class="card-body">
			<p class="text-muted">
				Angka di halaman ini langsung tampil di grafik statistik situs publik.
			</p>

			<form action="{{ route('dashboard.statistik-asn.update') }}" method="POST">
				@csrf
				@method('patch')

				<fieldset class="bk-fieldset">
					<legend><i class="ti ti-calendar-stats" aria-hidden="true"></i>Tanggal data</legend>

					<div class="row g-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="{{ $tanggalUpdate['slug'] }}" class="form-label">{{ $tanggalUpdate['label'] }}</label>
								<input required type="date" name="{{ $tanggalUpdate['slug'] }}" id="{{ $tanggalUpdate['slug'] }}"
									class="form-control @error($tanggalUpdate['slug']) is-invalid @enderror"
									value="{{ old($tanggalUpdate['slug'], Carbon\Carbon::parse($tanggalUpdate['value'])->format('Y-m-d')) }}">
								@error($tanggalUpdate['slug'])
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
					</div>
				</fieldset>

				{{-- Emoji sebagai penanda seksi diganti ikon: dua seksi berbeda
				     sebelumnya memakai emoji yang sama persis. --}}
				@foreach ([['Data PNS', 'ti ti-user-check', $pns], ['Data PPPK', 'ti ti-user-plus', $pppk], ['Jenis Jabatan', 'ti ti-hierarchy-2', $jenis_jabatan]] as [$judul, $ikon, $kelompok])
					<fieldset class="bk-fieldset">
						<legend><i class="{{ $ikon }}" aria-hidden="true"></i>{{ $judul }}</legend>

						<div class="row g-3">
							@foreach ($kelompok as $item)
								<div class="col-6 col-md-4 col-xl-2">
									<div class="form-group">
										<label for="{{ $item['slug'] }}" class="form-label">{{ $item['label'] }}</label>
										<input required type="number" min="0" inputmode="numeric" name="{{ $item['slug'] }}"
											id="{{ $item['slug'] }}" value="{{ old($item['slug'], $item['value']) }}" placeholder="0"
											class="form-control @error($item['slug']) is-invalid @enderror">
										@error($item['slug'])
											<small class="bk-field-error">{{ $message }}</small>
										@enderror
									</div>
								</div>
							@endforeach
						</div>
					</fieldset>
				@endforeach

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection
