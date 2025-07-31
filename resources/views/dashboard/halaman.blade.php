@extends('layouts.app.dashboard')

@section('content')
	{{-- @php
		$pages = [
		    'sejarah-bkpsdm',
		    'cuti-asn',
		    'cerai',
		    'kenaikan-pangkat',
		    'jabatan-fungsional',
		    'mutasi-pegawai',
		    'tugas-belajar',
		    'konsultasi-kinerja',
		    'coc-manajemen-asn',
		];
	@endphp --}}

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.halaman', $halaman)], ['Form']]" />
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
					<form action="{{ route('dashboard.halaman.update', $halaman) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('patch')

						<div class="row">
							<div class="col-md-7 mb-3">
								@if (request()->segment(3) === 'struktur-organisasi')
									<div>
										@if (isset($data) && $data->gambar)
											<img class="img-fluid" src="{{ asset("storage/$data->gambar") }}" alt="{{ $data->gambar }}">
										@else
											<x-alert message="Struktur organisasi belum diunggah." color="warning" />
										@endif
									</div>
								@else
									<div>
										<label for="isi" class="form-label">Isi <span style="color: red">*</span></label>
										<x-ckeditor5 name="isi" :value="$data->isi ?? ''" />
										@error('isi')
											<small class="text-danger">{{ $message }}</small>
										@enderror
									</div>
								@endif
							</div>
							<div class="col-md-5 mb-3">
								@if (request()->segment(3) === 'logo' || request()->segment(3) === 'struktur-organisasi')
									<div class="form-group mb-3">
										<label for="gambar" class="form-label">Upload {{ $title }}</label>
										<input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror"
											accept="image/*">
										@error('gambar')
											<small class="text-danger">{{ $message }}</small>
										@enderror

										@if (isset($data) && $data->gambar && request()->segment(3) !== 'struktur-organisasi')
											<div class="mt-2">
												<img src="{{ asset("storage/$data->gambar") }}" alt="Preview Sampul" class="border img-thumbnail"
													width="250">
											</div>
										@endif
									</div>
								@endif

								@if (request()->segment(3) !== 'struktur-organisasi')
									<div class="form-group mb-3">
										<label for="lampiran" class="form-label">Lampiran</label>
										<input type="file" name="lampiran" id="lampiran"
											class="form-control @error('lampiran') is-invalid @enderror">
										@error('lampiran')
											<small class="text-danger">{{ $message }}</small>
										@enderror

										@if (isset($data) && $data->lampiran)
											<div class="mt-2">
												<a href="{{ asset("storage/$data->lampiran") }}" class="btn btn-secondary">Lihat</a>
											</div>
										@endif
									</div>
								@endif
							</div>
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
