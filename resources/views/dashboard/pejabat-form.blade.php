@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.pejabat.update', $data->id) : route('dashboard.pejabat.store');
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[['Profil Pejabat', route('dashboard.pejabat.index')], [isset($data) ? 'Ubah' : 'Tambah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="mb-3">
		<a href="{{ route('dashboard.pejabat.index') }}" class="btn btn-outline-secondary">
			<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar
		</a>
	</div>

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ isset($data) ? 'Ubah' : 'Tambah' }} pejabat</h2>
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
							<label for="nama" class="form-label">Nama lengkap</label>
							<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
								value="{{ old('nama', $data->nama ?? '') }}" placeholder="Nama lengkap beserta gelar"
								@error('nama') aria-invalid="true" aria-describedby="nama-error" @enderror required>
							@error('nama')
								<small class="bk-field-error" id="nama-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="tom-select" class="form-label">Jabatan</label>
							<select name="jabatan_id" class="form-select" id="tom-select" required>
								<option value="">Pilih jabatan…</option>
								@foreach (App\Models\Jabatan::with(['unit_organisasi.bagian'])->orderBy('nama')->get() as $jabatan)
									<option @selected($jabatan->id == old('jabatan_id', $data->jabatan_id ?? '')) value="{{ $jabatan->id }}">
										{{ $jabatan->nama }} · {{ $jabatan->unit_organisasi->nama ?? '—' }} ·
										{{ $jabatan->unit_organisasi->bagian->nama ?? '—' }}
									</option>
								@endforeach
							</select>
							@error('jabatan_id')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="biografi" class="form-label">Biografi</label>
							<x-ckeditor5 name="biografi" :value="$data->biografi ?? ''" />
							@error('biografi')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>
					</div>

					<div class="col-lg-5">
						<div class="form-group mb-3">
							<label for="foto" class="form-label">Foto pejabat</label>
							<input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
								accept="image/*">
							<small class="bk-hint">Gambar maksimal {{ config('app.size_img') / 1024 }} MB.</small>
							@error('foto')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror

							@if (isset($data) && $data->foto)
								<div class="bk-preview">
									<img src="{{ asset("storage/$data->foto") }}" alt="Foto {{ $data->nama }}" loading="lazy">
								</div>
							@endif
						</div>
					</div>
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ route('dashboard.pejabat.index') }}" class="btn btn-outline-secondary">Batal</a>
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
