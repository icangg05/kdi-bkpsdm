@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.video.update', $data->id) : route('dashboard.video.store');
		$idVideo = isset($data) ? youtube_id($data->link) : null;
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[['Galeri Video', route('dashboard.video.index')], [isset($data) ? 'Ubah' : 'Tambah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="mb-3">
		<a href="{{ route('dashboard.video.index') }}" class="btn btn-outline-secondary">
			<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar
		</a>
	</div>

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ isset($data) ? 'Ubah' : 'Tambah' }} video</h2>
		</div>
		<div class="card-body">
			<form action="{{ $routeSubmit }}" method="POST">
				@csrf
				@if (isset($data))
					@method('patch')
				@endif

				<div class="row g-3">
					<div class="col-lg-7">
						<div class="form-group mb-3">
							<label for="judul" class="form-label">Judul</label>
							<input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
								value="{{ old('judul', $data->judul ?? '') }}" placeholder="Judul video"
								@error('judul') aria-invalid="true" aria-describedby="judul-error" @enderror required>
							@error('judul')
								<small class="bk-field-error" id="judul-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="tanggal" class="form-label">Tanggal</label>
							<input type="date" name="tanggal" id="tanggal"
								class="form-control @error('tanggal') is-invalid @enderror"
								value="{{ old('tanggal', $data->tanggal ?? date('Y-m-d')) }}" required>
							@error('tanggal')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="deskripsi" class="form-label">Deskripsi</label>
							<textarea rows="5" name="deskripsi" id="deskripsi"
								class="form-control @error('deskripsi') is-invalid @enderror"
								placeholder="Keterangan singkat video…" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
							@error('deskripsi')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="col-lg-5">
						<div class="form-group mb-3">
							{{-- type="link" bukan tipe input yang ada; peramban memperlakukannya
							     sebagai teks biasa tanpa validasi apa pun. --}}
							<label for="link" class="form-label">Tautan video YouTube</label>
							<input type="url" name="link" id="link" inputmode="url"
								placeholder="https://www.youtube.com/watch?v=…"
								class="form-control @error('link') is-invalid @enderror"
								value="{{ old('link', $data->link ?? '') }}" required>
							@error('link')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						@if ($idVideo)
							<div class="bk-preview">
								<div class="video-wrapper">
									<iframe
										src="https://www.youtube-nocookie.com/embed/{{ $idVideo }}"
										title="Pratinjau: {{ $data->judul }}"
										loading="lazy"
										allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
										allowfullscreen>
									</iframe>
								</div>
							</div>
						@elseif (isset($data) && $data->link)
							<x-alert color="warning" message="Tautan tersimpan tidak dikenali sebagai video YouTube." />
						@endif
					</div>
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ route('dashboard.video.index') }}" class="btn btn-outline-secondary">Batal</a>
				</div>
			</form>
		</div>
	</div>
@endsection
