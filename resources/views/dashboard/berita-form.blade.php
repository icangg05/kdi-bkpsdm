@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data)
		    ? route('dashboard.publikasi.update', [$publikasi, $data->id])
		    : route('dashboard.publikasi.store', $publikasi);

		$namaBagian = str()->title(str_replace('-', ' ', $publikasi));
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[[$namaBagian, route('dashboard.publikasi.index', $publikasi)], [isset($data) ? 'Ubah' : 'Tambah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="mb-3">
		<a href="{{ route('dashboard.publikasi.index', $publikasi) }}" class="btn btn-outline-secondary">
			<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar
		</a>
	</div>

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ isset($data) ? 'Ubah' : 'Tambah' }} {{ $namaBagian }}</h2>
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
								value="{{ old('judul', $data->judul ?? '') }}" placeholder="Judul berita"
								@error('judul') aria-invalid="true" aria-describedby="judul-error" @enderror required>
							@error('judul')
								<small class="bk-field-error" id="judul-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="isi" class="form-label">Isi</label>
							<x-ckeditor5 name="isi" :value="$data->isi ?? ''" />
							@error('isi')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="col-lg-5">
						<div class="form-group mb-3">
							<label for="tanggal" class="form-label">Tanggal terbit</label>
							<input type="date" name="tanggal" id="tanggal"
								class="form-control @error('tanggal') is-invalid @enderror"
								value="{{ old('tanggal', $data->tanggal ?? date('Y-m-d')) }}" required>
							@error('tanggal')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="sampul" class="form-label">Sampul</label>
							<input type="file" name="sampul" id="sampul" class="form-control @error('sampul') is-invalid @enderror"
								accept="image/*">
							<small class="bk-hint">Gambar maksimal {{ config('app.size_img') / 1024 }} MB.</small>
							@error('sampul')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror

							@if (isset($data) && $data->sampul)
								<div class="bk-preview">
									<img src="{{ asset("storage/$data->sampul") }}" alt="Sampul {{ $data->judul }}" loading="lazy">
								</div>
							@endif
						</div>

						<div class="form-group mb-3">
							<label for="lampiran" class="form-label">Lampiran</label>
							<input type="file" name="lampiran" id="lampiran"
								class="form-control @error('lampiran') is-invalid @enderror">
							<small class="bk-hint">Berkas maksimal {{ config('app.size_file') / 1024 }} MB.</small>
							@error('lampiran')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror

							@if (isset($data) && $data->lampiran)
								<div class="bk-file">
									<a href="{{ asset("storage/$data->lampiran") }}" class="btn btn-secondary btn-sm" target="_blank"
										rel="noopener noreferrer">
										<i class="ti ti-paperclip" aria-hidden="true"></i>
										{{ get_original_filename($data->lampiran) }}
									</a>
									<a onclick="return confirm('Hapus lampiran ini?')"
										href="{{ route('dashboard.publikasi.delete-lampiran', $data->id) }}"
										class="btn btn-outline-danger btn-sm">Hapus lampiran</a>
								</div>
							@endif
						</div>
					</div>
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ route('dashboard.publikasi.index', $publikasi) }}" class="btn btn-outline-secondary">Batal</a>
				</div>
			</form>
		</div>
	</div>
@endsection
