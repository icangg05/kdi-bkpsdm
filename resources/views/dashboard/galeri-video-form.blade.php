@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.video.update', $data->id) : route('dashboard.video.store');
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[['Galeri Video', route('dashboard.video.index')], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row" style="user-select: none">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
      @if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="mb-3">
				<a href="{{ route('dashboard.video.index') }}" class="btn btn-secondary">Kembali</a>
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
									<input value="{{ old('tanggal', $data->tanggal ?? date('Y-m-d')) }}" type="date" name="tanggal"
										id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
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
									<label for="link" class="form-label">Link Video</label>
									<input type="link" name="link" id="link" class="form-control @error('link') is-invalid @enderror"
									value="{{ old('link', $data->link ?? '') }}"	required>
									@error('link')
										<small class="text-danger">{{ $message }}</small>
									@enderror

									@if (isset($data) && $data->link)
										@php
											function getYoutubeId($url)
											{
                        preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $url, $matches);
                        return $matches[1] ?? null;
											}
										@endphp

										<div class="video-wrapper mt-3">
											<iframe
												src="https://www.youtube.com/embed/{{ getYoutubeId($data->link) }}"
												title="YouTube video"
												allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
												allowfullscreen>
											</iframe>
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
