@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.unit-organisasi.index')], ['Daftar']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="row g-3">
		<div class="col-lg-8">
			<div class="card bk-rise bk-rise-1">
				<div class="card-header">
					<h2 class="h5">Data {{ $title }}</h2>
				</div>
				<div class="card-body">
					<form action="{{ route('dashboard.unit-organisasi.index') }}" method="GET" class="bk-toolbar">
						<div class="bk-search">
							<label for="q" class="visually-hidden">Cari unit organisasi</label>
							<i class="ti ti-search" aria-hidden="true"></i>
							<input type="search" name="q" id="q" class="form-control" placeholder="Cari nama unit…"
								value="{{ request()->q }}">
						</div>
						<button type="submit" class="btn btn-secondary">Cari</button>
						@if (request()->q)
							<a href="{{ route('dashboard.unit-organisasi.index') }}" class="btn btn-outline-secondary">Reset</a>
						@endif
					</form>

					<div class="bk-table-wrap">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nama unit organisasi</th>
										<th scope="col">Bagian</th>
										<th scope="col"><span class="visually-hidden">Aksi</span></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($data as $item)
										<tr @class(['table-active' => request()->id == $item->id])>
											<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}</th>
											<td>{{ $item->nama }}</td>
											<td>{{ $item->bagian->nama ?? '—' }}</td>
											<td>
												<div class="bk-actions">
													<a href="{{ route('dashboard.unit-organisasi.index', ['id' => $item->id]) }}" class="bk-act"
														title="Ubah">
														<i class="ti ti-pencil" aria-hidden="true"></i>
														<span class="visually-hidden">Ubah {{ $item->nama }}</span>
													</a>
													<form action="{{ route('dashboard.unit-organisasi.destroy', $item->id) }}" method="post">
														@method('delete')
														@csrf
														<button onclick="return confirm('Hapus unit {{ addslashes($item->nama) }}? Jabatan di bawahnya bisa ikut kehilangan induk.')"
															type="submit" class="bk-act bk-act--danger" title="Hapus">
															<i class="ti ti-trash" aria-hidden="true"></i>
															<span class="visually-hidden">Hapus {{ $item->nama }}</span>
														</button>
													</form>
												</div>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="4">
												<div class="bk-empty">
													<i class="ti ti-building" aria-hidden="true"></i>
													{{ request()->q ? 'Tidak ada hasil untuk pencarian itu.' : 'Belum ada unit organisasi yang tersimpan.' }}
												</div>
											</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>

					<div class="d-flex justify-content-center mt-3">{{ $data->links() }}</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			@php
				$routeSubmit = isset($dataEdit)
				    ? route('dashboard.unit-organisasi.update', $dataEdit->id)
				    : route('dashboard.unit-organisasi.store');
			@endphp

			<div class="card bk-rise bk-rise-2">
				<div class="card-header">
					<h2 class="h5">{{ request()->id ? 'Ubah unit organisasi' : 'Tambah unit organisasi' }}</h2>
				</div>
				<div class="card-body">
					<form action="{{ $routeSubmit }}" method="post">
						@csrf
						@if (request()->id)
							@method('patch')
						@endif

						<div class="form-group mb-3">
							<label for="nama" class="form-label">Nama unit organisasi</label>
							<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
								value="{{ old('nama', $dataEdit->nama ?? '') }}" placeholder="Contoh: Sub Bagian Umum"
								@error('nama') aria-invalid="true" aria-describedby="nama-error" @enderror required>
							@error('nama')
								<small class="bk-field-error" id="nama-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="tom-select" class="form-label">Bagian</label>
							<select name="bagian_id" class="form-select" id="tom-select">
								<option value="">Pilih bagian…</option>
								@foreach (App\Models\Bagian::orderBy('nama')->get() as $item)
									<option @selected($item->id == old('bagian_id', $dataEdit->bagian_id ?? '')) value="{{ $item->id }}">
										{{ $item->nama }}
									</option>
								@endforeach
							</select>
							@error('bagian_id')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="bk-form-actions">
							<button type="submit" class="btn btn-primary">
								{{ request()->id ? 'Simpan perubahan' : 'Tambah' }}
							</button>
							@if (request()->id)
								<a href="{{ route('dashboard.unit-organisasi.index') }}" class="btn btn-outline-secondary">Batal</a>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('footer')
	<script>
		new TomSelect("#tom-select", {
			create: false,
			sortField: { field: "text", direction: "asc" }
		});
	</script>
@endpush
