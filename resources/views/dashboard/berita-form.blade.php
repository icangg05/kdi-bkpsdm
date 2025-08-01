@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data)
		    ? route('dashboard.publikasi.update', [$publikasi, $data->id])
		    : route('dashboard.publikasi.store', $publikasi);
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.publikasi.index', $publikasi)], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.publikasi.index', $publikasi) }}" class="btn btn-secondary">Kembali</a>
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
								<div class="form-group">
									<label for="judul" class="form-label">Judul</label>
									<input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
										value="{{ old('judul', $data->judul ?? '') }}" required>
									@error('judul')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-5 mb-3">
								<div class="form-group">
									<label for="tanggal" class="form-label">Tanggal</label>
									<input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
										value="{{ old('tanggal', $data->tanggal ?? date('Y-m-d')) }}" required>
									@error('tanggal')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-7 mb-3">
								<label for="isi" class="form-label">Isi <span style="color: red">*</span></label>
								<x-ckeditor5 name="isi" :value="$data->isi ?? ''" />
								@error('isi')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>

							<div class="col-md-5 mb-3">
								<div class="form-group">
									<label for="sampul" class="form-label">Sampul</label>
									<input type="file" name="sampul" id="sampul" class="form-control @error('sampul') is-invalid @enderror"
										accept="image/*">
									<small>Maksimal {{ config('app.size_img') / 1024 }} MB.</small>
									@error('sampul')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>

								@if (isset($data) && $data->sampul)
									<div class="mt-2">
										<img src="{{ asset("storage/$data->sampul") }}" alt="Preview Sampul" class="border img-thumbnail"
											width="250">
									</div>
								@endif
							</div>
						</div>

						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
					</form>
				</div>

			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
