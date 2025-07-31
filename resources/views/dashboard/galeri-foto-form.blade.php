@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.galeri.foto.update', $data->id) : route('dashboard.galeri.foto.store');
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[['Galeri Foto', route('dashboard.galeri.foto.index')], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.galeri.foto.index') }}" class="btn btn-secondary">Kembali</a>
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
									<label for="tanggal" class="form-label">Tanggal</label>
									<input value="{{ old('tanggal', $data->tanggal ?? date('Y-m-d')) }}" type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
										value="{{ old('tanggal', $data->tanggal ?? '') }}" required>
									@error('tanggal')
										<small class="text-danger">{{ $message }}</small>
									@enderror
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
									<label for="gambar" class="form-label">Upload Foto</label>
									<input accept="image/*" type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror"
										value="{{ old('gambar', $data->gambar ?? date('Y-m-d')) }}" required>
									@error('gambar')
										<small class="text-danger">{{ $message }}</small>
									@enderror

                  @if (isset($data) && $data->gambar)
                    <div class="mt-2">
                      <img src="{{ asset("storage/$data->gambar") }}" alt="{{ $data->gambar }}" class="border img-thumbnail"
                        width="250">
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
