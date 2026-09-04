@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data)
		    ? route('dashboard.galeri.foto.update', $data->id)
		    : route('dashboard.galeri.foto.store');
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[['Galeri Foto', route('dashboard.galeri.foto.index')], [isset($data) ? 'Ubah' : 'Tambah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="mb-3">
		<a href="{{ route('dashboard.galeri.foto.index') }}" class="btn btn-outline-secondary">
			<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar
		</a>
	</div>

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ isset($data) ? 'Ubah' : 'Tambah' }} foto</h2>
		</div>
		<div class="card-body">
			<form action="{{ $routeSubmit }}" method="POST" enctype="multipart/form-data">
				@csrf
				@if (isset($data))
					@method('patch')
				@endif

				<div class="row g-3">
					<div class="col-lg-7">
						<div class="form-group mb-3">
							<label for="judul" class="form-label">Judul</label>
							<input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
								value="{{ old('judul', $data->judul ?? '') }}" placeholder="Judul foto"
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
								placeholder="Keterangan singkat foto…" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
							@error('deskripsi')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="col-lg-5">
						<div class="form-group mb-3">
							<label for="gambar" class="form-label">Berkas foto</label>
							<input accept="image/*" type="file" name="gambar" id="gambar"
								class="form-control @error('gambar') is-invalid @enderror" @required(!isset($data))>
							<small class="bk-hint">Gambar maksimal {{ config('app.size_img') / 1024 }} MB.</small>
							@error('gambar')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror

							@if (isset($data) && $data->gambar)
								<div class="bk-preview">
									<img src="{{ asset("storage/$data->gambar") }}" alt="{{ $data->judul }}" loading="lazy">
								</div>
							@endif
						</div>
					</div>
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ route('dashboard.galeri.foto.index') }}" class="btn btn-outline-secondary">Batal</a>
				</div>
			</form>
		</div>
	</div>
@endsection
