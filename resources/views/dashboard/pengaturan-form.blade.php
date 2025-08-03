@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = route('dashboard.pengaturan.update');
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.pengaturan')], ['Form']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<h5>Data {{ $title }}</h5>
          <a href="{{ route('clear-unused-image') }}" class="btn btn-dark">Delete Unused Image</a>
				</div>
				<div class="card-body">
					<form action="{{ $routeSubmit }}" method="POST">
						@csrf
						@if (isset($data))
							@method('patch')
						@endif

						<div class="row">
              @foreach ($data as $item)
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label for="{{ $item->nama_pengaturan }}" class="form-label">{{ $item->label }}</label>
									<input type="text" name="{{ $item->nama_pengaturan }}" id="{{ $item->nama_pengaturan }}" class="form-control @error($item->nama_pengaturan) is-invalid @enderror"
										value="{{ old($item->nama_pengaturan, $item->value ?? '') }}" required>
									@error($item->nama_pengaturan)
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
              @endforeach
						</div>

						<div class="row">
							<div class="col-md-6">
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
