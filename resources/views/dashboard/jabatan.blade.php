@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.jabatan.index')], ['Index']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
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
							<form action="{{ route('dashboard.jabatan.index') }}" method="GET"
								class="mb-4 col-md-6 d-flex gap-2">
								<input type="text" name="q" id="q" placeholder="Pencarian..."
									class="form-control"
									value="{{ request()->q }}">
								<button type="submit" class="btn btn-secondary">Cari</button>
							</form>

							<div class="table-responsive">
								<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama Jabatan</th>
											<th scope="col">Unit Organisasi</th>
											<th scope="col">Bagian</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($data as $item)
											<tr>
												<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}.</th>
												<td>{{ $item->nama }}</td>
												<td>{{ $item->unit_organisasi->nama ?? '-' }}</td>
												<td>{{ $item->unit_organisasi->bagian->nama ?? '-' }}</td>
												<td>
													<a href="{{ route('dashboard.jabatan.index', ['id' => $item->id]) }}"
														class="btn btn-sm btn-secondary badge mb-1">
														<i class="ti ti-edit"></i>
													</a>
													<form class="d-inline" action="{{ route('dashboard.jabatan.destroy', $item->id) }}"
														method="post">
														@method('delete')
														@csrf
														<button onclick="return confirm('Hapus data ini?')" type="submit"
															class="btn btn-sm btn-danger badge mb-1">
															<i class="ti ti-trash"></i>
														</button>
													</form>
													{{-- <div style="width: 3px; height: 20px; background: #dbdbdb"></div> --}}
													<a href="{{ route('dashboard.jabatan.tugas.index', $item->id) }}"
														class="btn btn-sm btn-info badge">Daftar Tugas</a>
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

							<div class="d-flex justify-content-center">
								{{ $data->links() }}
							</div>
						</div>
						<div class="col-md-4">
							<h4>Form {{ $title }}</h4>
							<hr>

							@php
								$routeSubmit = isset($dataEdit)
								    ? route('dashboard.jabatan.update', $dataEdit->id)
								    : route('dashboard.jabatan.store');
							@endphp
							<form action="{{ $routeSubmit }}" method="post">
								@csrf
								@if (request()->id)
									@method('patch')
								@endif

								<div class="form-group mb-3">
									<label for="nama" class="form-label">Nama Jabatan</label>
									<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
										value="{{ old('nama', $dataEdit->nama ?? '') }}" required>
									@error('nama')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
								<div class="form-group mb-3">
									<label for="unit_organisasi_id" class="form-label">Unit Organisasi</label>
									<select name="unit_organisasi_id" class="form-select" id="tom-select">
										<option value="">Pilih...</option>
										@foreach (App\Models\UnitOrganisasi::orderBy('nama')->get()->pluck('id', 'nama') as $label => $value)
											<option @selected($value == old('unit_organisasi_id', $dataEdit->unit_organisasi_id ?? '')) value="{{ $value }}">{{ $label }}</option>
										@endforeach
									</select>
									@error('unit_organisasi_id')
										<small class="text-danger">{{ $message }}</small>
									@enderror

									@push('footer')
										<script>
											new TomSelect("#tom-select", {
												create: true,
												sortField: {
													field: "text",
													direction: "asc"
												}
											});
										</script>
									@endpush
								</div>

								<div class="d-grid mt-3">
									<button type="submit" class="btn btn-primary">
										{{ request()->id ? 'Update' : 'Tambah' }}
									</button>
									@if (request()->id)
										<a href="{{ route('dashboard.jabatan.index') }}" class="btn btn-light">Batal</a>
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
