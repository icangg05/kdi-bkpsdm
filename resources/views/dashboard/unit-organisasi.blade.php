@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.unit-organisasi.index')], ['Index']]" />
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
							<div class="table-responsive">
								<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama Unit Organisasi</th>
											<th scope="col">Bagian</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($data as $item)
											<tr>
												<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}.</th>
												<td>{{ $item->nama }}</td>
												<td>{{ $item->bagian->nama ?? '-' }}</td>
												<td>
													<a href="{{ route('dashboard.unit-organisasi.index', ['id' => $item->id]) }}"
														class="btn btn-sm btn-secondary badge">Edit</a>
													<form class="d-inline" action="{{ route('dashboard.unit-organisasi.destroy', $item->id) }}"
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

							<div class="d-flex justify-content-center">
								{{ $data->links() }}
							</div>
						</div>
						<div class="col-md-4">
							<h4>Form {{ $title }}</h4>
							<hr>

							@php
								$routeSubmit = isset($dataEdit)
								    ? route('dashboard.unit-organisasi.update', $dataEdit->id)
								    : route('dashboard.unit-organisasi.store');
							@endphp
							<form action="{{ $routeSubmit }}" method="post">
								@csrf
								@if (request()->id)
									@method('patch')
								@endif

								<div class="form-group mb-3">
									<label for="nama" class="form-label">Nama Unit Organisasi</label>
									<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
										value="{{ old('nama', $dataEdit->nama ?? '') }}" required>
									@error('nama')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
								<div class="form-group mb-3">
									<label for="bagian_id" class="form-label">Bagian</label>
									<select name="bagian_id" class="form-select" id="tom-select">
										<option value="">Pilih...</option>
										@foreach (App\Models\Bagian::orderBy('nama')->get() as $item)
											<option @selected($item->id == old('bagian_id', $data->bagian_id ?? '')) value="{{ $item->id }}">{{ $item->nama }}</option>
										@endforeach
									</select>
									@error('bagian_id')
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
										<a href="{{ route('dashboard.bagian.index') }}" class="btn btn-light">Batal</a>
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
