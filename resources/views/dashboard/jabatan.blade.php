@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.jabatan.index')], ['Daftar']]" />

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
					<form action="{{ route('dashboard.jabatan.index') }}" method="GET" class="bk-toolbar">
						<div class="bk-search">
							<label for="q" class="visually-hidden">Cari jabatan</label>
							<i class="ti ti-search" aria-hidden="true"></i>
							<input type="search" name="q" id="q" class="form-control" placeholder="Cari nama jabatan…"
								value="{{ request()->q }}">
						</div>
						<button type="submit" class="btn btn-secondary">Cari</button>
						@if (request()->q)
							<a href="{{ route('dashboard.jabatan.index') }}" class="btn btn-outline-secondary">Reset</a>
						@endif
					</form>

					<div class="bk-table-wrap">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nama jabatan</th>
										<th scope="col">Unit organisasi</th>
										<th scope="col">Bagian</th>
										<th scope="col"><span class="visually-hidden">Aksi</span></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($data as $item)
										<tr @class(['table-active' => request()->id == $item->id])>
											<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}</th>
											<td>{{ $item->nama }}</td>
											<td>{{ $item->unit_organisasi->nama ?? '—' }}</td>
											<td>{{ $item->unit_organisasi->bagian->nama ?? '—' }}</td>
											<td>
												<div class="bk-actions">
													<a href="{{ route('dashboard.jabatan.tugas.index', $item->id) }}" class="bk-act bk-act--tugas"
														title="Daftar tugas">
														<i class="ti ti-list-check" aria-hidden="true"></i>
														<span class="visually-hidden">Daftar tugas {{ $item->nama }}</span>
													</a>
													<a href="{{ route('dashboard.jabatan.index', ['id' => $item->id]) }}" class="bk-act"
														title="Ubah">
														<i class="ti ti-pencil" aria-hidden="true"></i>
														<span class="visually-hidden">Ubah {{ $item->nama }}</span>
													</a>
													<form action="{{ route('dashboard.jabatan.destroy', $item->id) }}" method="post">
														@method('delete')
														@csrf
														<button onclick="return confirm('Hapus jabatan {{ addslashes($item->nama) }}? Pejabat yang memegangnya bisa ikut kehilangan jabatan.')"
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
											<td colspan="5">
												<div class="bk-empty">
													<i class="ti ti-briefcase" aria-hidden="true"></i>
													{{ request()->q ? 'Tidak ada hasil untuk pencarian itu.' : 'Belum ada jabatan yang tersimpan.' }}
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
				    ? route('dashboard.jabatan.update', $dataEdit->id)
				    : route('dashboard.jabatan.store');
			@endphp

			<div class="card bk-rise bk-rise-2">
				<div class="card-header">
					<h2 class="h5">{{ request()->id ? 'Ubah jabatan' : 'Tambah jabatan' }}</h2>
				</div>
				<div class="card-body">
					<form action="{{ $routeSubmit }}" method="post">
						@csrf
						@if (request()->id)
							@method('patch')
						@endif

						<div class="form-group mb-3">
							<label for="nama" class="form-label">Nama jabatan</label>
							<input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
								value="{{ old('nama', $dataEdit->nama ?? '') }}" placeholder="Contoh: Kepala Bidang"
								@error('nama') aria-invalid="true" aria-describedby="nama-error" @enderror required>
							@error('nama')
								<small class="bk-field-error" id="nama-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group mb-3">
							<label for="tom-select" class="form-label">Unit organisasi</label>
							<select name="unit_organisasi_id" class="form-select" id="tom-select">
								<option value="">Pilih unit organisasi…</option>
								@foreach (App\Models\UnitOrganisasi::orderBy('nama')->get() as $unit)
									<option @selected($unit->id == old('unit_organisasi_id', $dataEdit->unit_organisasi_id ?? '')) value="{{ $unit->id }}">
										{{ $unit->nama }}
									</option>
								@endforeach
							</select>
							@error('unit_organisasi_id')
								<small class="bk-field-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="bk-form-actions">
							<button type="submit" class="btn btn-primary">
								{{ request()->id ? 'Simpan perubahan' : 'Tambah' }}
							</button>
							@if (request()->id)
								<a href="{{ route('dashboard.jabatan.index') }}" class="btn btn-outline-secondary">Batal</a>
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
