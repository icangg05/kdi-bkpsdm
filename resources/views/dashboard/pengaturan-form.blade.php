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
							@foreach ($data->where('nama_pengaturan', '!=', 'teks_berjalan') as $item)
								<div class="col-md-6 mb-3">
									<div class="form-group mb-3">
										<label for="{{ $item->nama_pengaturan }}" class="form-label">{{ $item->label }}</label>
										<input type="text" name="{{ $item->nama_pengaturan }}" id="{{ $item->nama_pengaturan }}"
											class="form-control @error($item->nama_pengaturan) is-invalid @enderror"
											value="{{ old($item->nama_pengaturan, $item->value ?? '') }}" required>
										@error($item->nama_pengaturan)
											<small class="text-danger">{{ $message }}</small>
										@enderror
									</div>
								</div>
							@endforeach

							<hr>

							@php
								$dataTeksBerjalan = json_decode($data->where('nama_pengaturan', '=', 'teks_berjalan')->first()->value, true);
								// dd($dataTeksBerjalan['visibility']);
							@endphp
							<div class="col-md-12">
								<h5 class="text-primary">Pengaturan Teks Berjalan</h5>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label for="teks_berjalan_visibility" class="form-label">Visibilitas</label>
											<select name="teks_berjalan_visibility" id="teks_berjalan_visibility"
												class="form-control @error('teks_berjalan_visibility') is-invalid @enderror"
												required>
												<option value="1" @selected(old('teks_berjalan_visibility', $dataTeksBerjalan['visibility']) == '1')>Tampilkan</option>
												<option value="0" @selected(old('teks_berjalan_visibility', $dataTeksBerjalan['visibility']) == '0')>Sembunyikan
												</option>
											</select>
											@error('teks_berjalan_visibility')
												<small class="text-danger">{{ $message }}</small>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label for="teks_berjalan_duration" class="form-label">Kecepatan Teks (ms)</label>
											<input value="{{ old('teks_berjalan_duration', $dataTeksBerjalan['duration'] ?? '') }}" min="0"
												type="number" name="teks_berjalan_duration" id="teks_berjalan_duration"
												class="form-control @error('teks_berjalan_duration') is-invalid @enderror"
												required>
											@error('teks_berjalan_duration')
												<small class="text-danger">{{ $message }}</small>
											@enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="teks_berjalan_items" class="form-label">Isi Teks</label>
											<textarea rows="4" type="text" name="teks_berjalan_items" id="teks_berjalan_items"
                        class="form-control @error('teks_berjalan_items') is-invalid @enderror"
                        required>{{ old('teks_berjalan_duration', $dataTeksBerjalan['items'] ?? '') }}"</textarea>
											<small>Pisahkan dengan simbol "###" untuk memulai kalimat baru.</small>
											@error('teks_berjalan_items')
												<small class="text-danger">{{ $message }}</small>
											@enderror
											<script>
												const el = document.getElementById('teks_berjalan_items');
												if (el) {
													let teks = el.value; // Ambil isi textarea
													teks = teks.replace(/['"]/g, ''); // Hapus semua ' dan "
													el.value = teks; // Masukkan kembali ke textarea
												}
											</script>
										</div>
									</div>
								</div>
								<hr>
							</div>
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
