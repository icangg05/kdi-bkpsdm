@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.slider')], ['Ubah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ $title }}</h2>
		</div>
		<div class="card-body">
			<form action="{{ route('dashboard.slider.update') }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('patch')

				<div class="row g-4">
					@foreach ($data as $i => $item)
						<div class="col-md-6 col-xl-4">
							<div class="bk-preview">
								<img src="{{ asset("storage/$item->gambar") }}" alt="Slider {{ $loop->iteration }} saat ini"
									loading="lazy" style="max-width: 100%">
							</div>

							<div class="form-group mt-3">
								<label for="slider_{{ $item->id }}" class="form-label">
									Ganti slider {{ $loop->iteration }}
								</label>
								<input accept="image/*" type="file" name="slider_{{ $item->id }}" id="slider_{{ $item->id }}"
									class="form-control @error('slider_' . $item->id) is-invalid @enderror">
								<small class="bk-hint">Gambar maksimal {{ config('app.size_img') / 1024 }} MB.</small>
								@error('slider_' . $item->id)
									<small class="bk-field-error">{{ $message }}</small>
								@enderror

								@if ($i === 2)
									<small class="bk-hint">
										Slider ketiga hanya dipakai kalau postingan terbaru tidak punya gambar sampul.
										Kalau sampulnya ada, gambar itu yang tampil.
									</small>
								@endif
							</div>

							<input type="hidden" name="slider_ids[]" value="{{ $item->id }}">
						</div>
					@endforeach
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection
