@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.regulasi.update', $data->id) : route('dashboard.regulasi.store');
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[['Regulasi', route('dashboard.regulasi.index')], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.regulasi.index') }}" class="btn btn-secondary">Kembali</a>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body">
					<form action="{{ $routeSubmit }}" method="POST" enctype="multipart/form-data">
						@csrf
						@if (isset($data))
							@method('patch')
						@endif

						<div class="row">
							<div class="col-md-7 mb-3">
								<div class="form-group mb-3">
									<label for="judul" class="form-label">Judul</label>
									<input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
										value="{{ old('judul', $data->judul ?? '') }}" required>
									@error('judul')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
								<div class="form-group mb-3">
									<label for="kategori_regulasi_id" class="form-label">Unit Organisasi</label>
									<select name="kategori_regulasi_id" class="form-select" id="tom-select">
										<option value="">Pilih...</option>
										@foreach (App\Models\KategoriRegulasi::orderBy('nama')->get()->pluck('id', 'nama') as $label => $value)
											<option @selected($value == old('kategori_regulasi_id', $data->kategori_regulasi_id ?? '')) value="{{ $value }}">{{ $label }}</option>
										@endforeach
									</select>
									@error('kategori_regulasi_id')
										<small class="text-danger">{{ $message }}</small>
									@enderror

									@push('footer')
										<script>
											new TomSelect("#tom-select", {
												create: true,
												sortField: {
													field: "text",
													direction: "asc"
												}
											});
										</script>
									@endpush
								</div>
								<div class="form-group mb-3">
									<label for="deskripsi" class="form-label">Deskripsi</label>
									<textarea rows="4" name="deskripsi" id="deskripsi"
                  class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
									@error('deskripsi')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-5 mb-3">
								<div class="form-group mb-3">
									<label for="lampiran" class="form-label">Upload Lampiran</label>
									<input type="file" name="lampiran" id="lampiran"
										class="form-control @error('lampiran') is-invalid @enderror"
										value="{{ old('lampiran', $data->lampiran ?? date('Y-m-d')) }}" @required(!isset($data))>
									<small>Maksimal {{ config('app.size_file') / 1024 }} MB.</small>
									@error('lampiran')
										<small class="text-danger">{{ $message }}</small>
									@enderror

									@if (isset($data) && $data->lampiran)
										<div class="mt-2">
											<a href="{{ asset("storage/$data->lampiran") }}" class="btn btn-secondary"
												onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;">
												{{ get_original_filename($data->lampiran) }}
											</a>
										</div>
									@endif
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-7">
								<div class="d-grid">
									<button type="submit" class="btn btn-primary">Simpan</button>
									<button type="reset" class="btn btn-light">Reset</button>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
