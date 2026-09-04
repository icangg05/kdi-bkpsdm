@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb
		:title="$title"
		:list="[['Jabatan', route('dashboard.jabatan.index')], [$data->nama]]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="mb-3">
		<a href="{{ route('dashboard.jabatan.index') }}" class="btn btn-outline-secondary">
			<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar jabatan
		</a>
	</div>

	<div class="row g-3">
		<div class="col-lg-8">
			<div class="card bk-rise bk-rise-1">
				<div class="card-header">
					<h2 class="h5">{{ $data->nama }}</h2>
				</div>
				<div class="card-body">
					<p class="text-muted">
						{{ $data->unit_organisasi->nama ?? '—' }} ·
						{{ $data->unit_organisasi->bagian->nama ?? '—' }}
					</p>

					<div class="bk-table-wrap">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Deskripsi tugas</th>
										<th scope="col"><span class="visually-hidden">Aksi</span></th>
									</tr>
								</thead>
								<tbody>
									@forelse ($tugas as $i => $item)
										<tr @class(['table-active' => request()->no == $i + 1])>
											<th scope="row">{{ $loop->iteration }}</th>
											<td>{{ $item }}</td>
											<td>
												<div class="bk-actions">
													<a href="{{ route('dashboard.jabatan.tugas.index', [$data->id, 'no' => $i + 1]) }}"
														class="bk-act" title="Ubah">
														<i class="ti ti-pencil" aria-hidden="true"></i>
														<span class="visually-hidden">Ubah tugas nomor {{ $i + 1 }}</span>
													</a>
													<form action="{{ route('dashboard.jabatan.tugas.destroy', [$data->id, $i]) }}" method="post">
														@method('delete')
														@csrf
														<button onclick="return confirm('Hapus tugas nomor {{ $i + 1 }}?')" type="submit"
															class="bk-act bk-act--danger" title="Hapus">
															<i class="ti ti-trash" aria-hidden="true"></i>
															<span class="visually-hidden">Hapus tugas nomor {{ $i + 1 }}</span>
														</button>
													</form>
												</div>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="3">
												<div class="bk-empty">
													<i class="ti ti-list-check" aria-hidden="true"></i>
													Belum ada tugas untuk jabatan ini.
												</div>
											</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			@php
				$routeSubmit = request()->has('no')
				    ? route('dashboard.jabatan.tugas.update', [$data->id, request()->no])
				    : route('dashboard.jabatan.tugas.store', $data->id);
			@endphp

			<div class="card bk-rise bk-rise-2">
				<div class="card-header">
					<h2 class="h5">{{ request()->has('no') ? 'Ubah tugas' : 'Tambah tugas' }}</h2>
				</div>
				<div class="card-body">
					<form action="{{ $routeSubmit }}" method="post">
						@csrf
						@if (request()->has('no'))
							@method('patch')
						@endif

						<div class="form-group">
							<label for="deskripsi_tugas" class="form-label">Deskripsi tugas</label>
							<textarea rows="5" name="deskripsi_tugas" id="deskripsi_tugas"
								class="form-control @error('deskripsi_tugas') is-invalid @enderror"
								@error('deskripsi_tugas') aria-invalid="true" aria-describedby="tugas-error" @enderror
								placeholder="Tuliskan satu tugas jabatan…" required>{{ old('deskripsi_tugas', $dataEdit ?? '') }}</textarea>
							@error('deskripsi_tugas')
								<small class="bk-field-error" id="tugas-error">{{ $message }}</small>
							@enderror
						</div>

						<div class="bk-form-actions">
							<button type="submit" class="btn btn-primary">
								{{ request()->has('no') ? 'Simpan perubahan' : 'Tambah' }}
							</button>
							@if (request()->has('no'))
								<a href="{{ route('dashboard.jabatan.tugas.index', $data->id) }}"
									class="btn btn-outline-secondary">Batal</a>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
