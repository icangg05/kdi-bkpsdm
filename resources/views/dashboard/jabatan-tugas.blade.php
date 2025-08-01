@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.jabatan.index')], ['Tugas']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.jabatan.index') }}" class="btn btn-secondary">Kembali</a>
			</div>

			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }} :
            <span class="text-primary">
            {{ $data->nama }} | {{ $data->unit_organisasi->nama ?? '-' }} | {{ $data->unit_organisasi->bagian->nama ?? '' }}
          </span></h5>
				</div>
				<div class="card-body">
					<div class="row gap-3">
						<div class="col-md-7">
							<div class="table-responsive">
								<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Deskripsi Tugas</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($tugas as $i => $item)
											<tr>
												<th scope="row">{{ $loop->iteration }}.</th>
												<td>{{ $item }}</td>
												<td>
													{{-- <a href="{{ route('dashboard.jabatan.index') }}"
														class="btn btn-sm btn-secondary badge">Edit</a> --}}
													<form class="d-inline" action="{{ route('dashboard.jabatan.tugas.destroy', [$data->id, $i]) }}"
														method="post">
														@method('delete')
														@csrf
														<button onclick="return confirm('Hapus data ini?')" type="submit"
															class="btn btn-sm btn-danger badge">Hapus</button>
													</form>
												</td>
											</tr>
										@empty
											<tr class="text-center">
												<td colspan="6">Tidak ada data ditemukan.</td>
											</tr>
										@endforelse
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-4">
							<h4>Form {{ $title }}</h4>
							<hr>

							@php
								$routeSubmit = route('dashboard.jabatan.tugas.store', $data->id);
							@endphp
							<form action="{{ $routeSubmit }}" method="post">
								@csrf

								<div class="form-group">
									<label for="deskripsi_tugas" class="form-label">Deskripsi Tugas</label>
									<textarea rows="4" type="text" name="deskripsi_tugas" id="deskripsi_tugas"
									 class="form-control @error('deskripsi_tugas') is-invalid @enderror" required>{{ old('deskripsi_tugas', $dataEdit->deskripsi_tugas ?? '') }}</textarea>
									@error('deskripsi_tugas')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>

								<div class="d-grid mt-3">
									<button type="submit" class="btn btn-primary">
										Tambah
									</button>
									<button type="reset" class="btn btn-light">Batal</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
