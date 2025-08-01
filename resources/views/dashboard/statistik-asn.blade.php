@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.statistik-asn.index')], ['Form']]" />
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
					<form action="{{ route('dashboard.statistik-asn.update') }}" method="POST">
						@csrf
						@method('patch')

						<div class="row">
							<!-- Form Tanggal Update -->
							<div class="col-md-4 form-group">
								<label for="{{ $tanggalUpdate['slug'] }}" class="form-label">{{ $tanggalUpdate['label'] }}</label>
								<input required type="date" name="{{ $tanggalUpdate['slug'] }}" id="{{ $tanggalUpdate['slug'] }}"
									class="form-control @error($tanggalUpdate['slug']) is-invalid @enderror"
									value="{{ old($tanggalUpdate['slug'], Carbon\Carbon::parse($tanggalUpdate['value'])->format('Y-m-d')) }}">
								@error($tanggalUpdate['slug'])
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>

							<hr class="mt-3 mb-4">

							<!-- Section PNS -->
							<h5 class="mb-3 font-semibold">👮‍♂️ Data PNS</h5>
							<div class="row">
								@foreach ($pns as $item)
									<div class="col-md-2">
										<div class="form-group mb-3">
											<label for="{{ $item['slug'] }}" class="form-label">{{ $item['label'] }}</label>
											<input required type="number" min="0" name="{{ $item['slug'] }}" id="{{ $item['slug'] }}"
												value="{{ old($item['slug'], $item['value']) }}"
												class="form-control @error($item['slug']) is-invalid @enderror">
											@error($item['slug'])
												<small class="text-danger">{{ $message }}</small>
											@enderror
										</div>
									</div>
								@endforeach
							</div>

							<hr class="mt-3 mb-4">

							<!-- Section PPPK -->
							<h5 class="mb-3 font-semibold">🧑‍🏫 Data PPPK</h5>
							<div class="row">
								@foreach ($pppk as $item)
									<div class="col-md-2">
										<div class="form-group mb-3">
											<label for="{{ $item['slug'] }}" class="form-label">{{ $item['label'] }}</label>
											<input required type="number" min="0" name="{{ $item['slug'] }}" id="{{ $item['slug'] }}"
												value="{{ old($item['slug'], $item['value']) }}"
												class="form-control @error($item['slug']) is-invalid @enderror">
											@error($item['slug'])
												<small class="text-danger">{{ $message }}</small>
											@enderror
										</div>
									</div>
								@endforeach
							</div>
						</div>

						<hr class="mt-2 mb-4">

						<div class="d-grid mt-4">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>

			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
