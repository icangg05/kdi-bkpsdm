@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.pejabat.update', $data->id) : route('dashboard.pejabat.store');
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.pejabat.index')], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.pejabat.index') }}" class="btn btn-secondary">Kembali</a>
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
									<label for="nama" class="form-label">Nama Lengkap</label>
									<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
										value="{{ old('nama', $data->nama ?? '') }}" required>
									@error('nama')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
								<div class="form-group mb-3">
									<label for="jabatan_id" class="form-label">Jabatan</label>
									<select name="jabatan_id" class="form-select" id="tom-select" required>
										<option value="">Pilih...</option>
										@foreach (App\Models\Jabatan::with(['unit_organisasi.bagian'])->orderBy('nama')->get() as $item)
											<option @selected($item->id == old('jabatan_id', $data->jabatan_id ?? '')) value="{{ $item->id }}">
												{{ $item->nama . ' | ' . $item->unit_organisasi->nama . ' | ' . $item->unit_organisasi->bagian->nama }}
											</option>
										@endforeach
									</select>
									@error('jabatan_id')
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

								<div class="mb-3">
									<label for="biografi" class="form-label">Biografi <span style="color: red">*</span></label>
									<x-ckeditor5 name="biografi" :value="$data->biografi ?? ''" />
									@error('biografi')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-5 mb-3">
								<div class="form-group mb-3">
									<label for="foto" class="form-label">Upload Foto</label>
									<input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
										accept="image/*">
									<small>Maksimal {{ config('app.size_img') / 1024 }} MB.</small>
									@error('foto')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>

								@if (isset($data) && $data->foto)
									<div class="mt-2">
										<img src="{{ asset("storage/$data->foto") }}" alt="{{ $data->foto }}" class="border img-thumbnail"
											width="250">
									</div>
								@endif
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
