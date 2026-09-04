@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.regulasi.update', $data->id) : route('dashboard.regulasi.store');
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[['Regulasi', route('dashboard.regulasi.index')], [isset($data) ? 'Ubah' : 'Tambah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="mb-3">
		<a href="{{ route('dashboard.regulasi.index') }}" class="btn btn-outline-secondary">
			<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar
		</a>
	</div>

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ isset($data) ? 'Ubah' : 'Tambah' }} regulasi</h2>
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
								value="{{ old('judul', $data->judul ?? '') }}" placeholder="Judul regulasi"
								@error('judul') aria-invalid="true" aria-describedby="judul-error" @enderror required>
							@error('judul')
								<small class="bk-field-error" id="judul-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							{{-- Label sebelumnya tertulis "Unit Organisasi" padahal field ini
							     memilih kategori regulasi. --}}
							<label for="tom-select" class="form-label">Kategori regulasi</label>
							<select name="kategori_regulasi_id" class="form-select" id="tom-select">
								<option value="">Pilih kategori…</option>
								@foreach (App\Models\KategoriRegulasi::orderBy('nama')->get() as $kategori)
									<option @selected($kategori->id == old('kategori_regulasi_id', $data->kategori_regulasi_id ?? '')) value="{{ $kategori->id }}">
										{{ $kategori->nama }}
									</option>
								@endforeach
							</select>
							@error('kategori_regulasi_id')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="deskripsi" class="form-label">Deskripsi</label>
							<textarea rows="5" name="deskripsi" id="deskripsi"
								class="form-control @error('deskripsi') is-invalid @enderror"
								placeholder="Ringkasan isi regulasi…" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
							@error('deskripsi')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="col-lg-5">
						<div class="form-group mb-3">
							<label for="lampiran" class="form-label">Berkas regulasi</label>
							<input type="file" name="lampiran" id="lampiran"
								class="form-control @error('lampiran') is-invalid @enderror" @required(!isset($data))>
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
								</div>
								<small class="bk-hint">Unggah berkas baru untuk menggantikan yang ini.</small>
							@endif
						</div>
					</div>
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ route('dashboard.regulasi.index') }}" class="btn btn-outline-secondary">Batal</a>
				</div>
			</form>
		</div>
	</div>
@endsection

@push('footer')
	<script>
		new TomSelect("#tom-select", {
			create: false,
			sortField: { field: "text", direction: "asc" }
		});
	</script>
@endpush
