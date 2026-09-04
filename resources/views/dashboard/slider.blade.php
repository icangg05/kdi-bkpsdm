@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.slider')], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			@if (session('success'))
				<x-alert :message="session('success')" color='success' />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('dashboard.slider.update') }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('patch')

						<div class="row">
							<div class="col-md-10 mb-3">
								@foreach ($data as $i => $item)
									<div class="form-group mb-3">
										<label for="slider_{{ $item->id }}" class="form-label">Upload Slider {{ $loop->iteration }}</label>
										<input accept="image/*" type="file" name="slider_{{ $item->id }}" id="slider_{{ $item->id }}"
											class="form-control @error('slider_' . $item->id) is-invalid @enderror">
										@error('slider_' . $item->id)
											<small class="text-danger">{{ $message }}</small>
										@enderror
										<small>Maksimal {{ config('app.size_img') / 1024 }} MB.</small>
										@if ($i == 2)
											<small class="d-block text-primary">
												Catatan: Jika postingan memiliki gambar sampul, maka gambar slider ketiga akan diambil dari sampul tersebut.
												Slider ini hanya digunakan jika sampul postingan kosong.
											</small>
										@endif
									</div>
									<input type="hidden" name="slider_ids[]" value="{{ $item->id }}">
								@endforeach
								<div class="d-grid mt-4">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</div>
							<div class="col-md-2">
								@foreach ($data as $i => $item)
									<div class="mb-2">
										<label>Slider {{ $loop->iteration }}</label>
										<img class="img-thumbnail d-block" src="{{ asset("storage/$item->gambar") }}" alt="{{ $item->gambar }}">
									</div>
								@endforeach
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
