@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.kategori-regulasi.index')], ['Index']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			{{-- <div class="mb-3">
				<button class="btn btn-primary">Tambah Data</button>
			</div> --}}

			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body">
					<div class="row gap-3">
						<div class="col-md-7">
							<div class="table-responsive">
								<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama Regulasi</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($data as $item)
											<tr>
												<th scope="row">{{ $loop->iteration }}.</th>
												<td>{{ $item->nama }}</td>
												<td class="text-nowrap">
													<a href="{{ route('dashboard.kategori-regulasi.index', ['id' => $item->id]) }}"
														class="btn btn-sm btn-secondary badge">Edit</a>
													<form class="d-inline" action="{{ route('dashboard.kategori-regulasi.destroy', $item->id) }}"
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
							<h4>Form Kategori Regulasi</h4>
							<hr>

							@php
								$routeSubmit = isset($dataEdit)
                  ? route('dashboard.kategori-regulasi.update', $dataEdit->id)
                  : route('dashboard.kategori-regulasi.store');
							@endphp
							<form action="{{ $routeSubmit }}" method="post">
								@csrf
								@if (request()->id)
									@method('patch')
								@endif

								<div class="form-group">
									<label for="nama" class="form-label">Nama Regulasi</label>
									<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
										value="{{ old('nama', $dataEdit->nama ?? '') }}" required>
									@error('nama')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>

								<div class="d-grid mt-3">
									<button type="submit" class="btn btn-primary">
										{{ request()->id ? 'Update' : 'Tambah' }}
									</button>
									@if (request()->id)
										<a href="{{ route('dashboard.kategori-regulasi.index') }}" class="btn btn-light">Batal</a>
									@endif
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
