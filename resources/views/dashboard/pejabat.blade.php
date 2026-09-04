@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.pejabat.index')], ['Daftar']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
			<h2 class="h5">Data {{ $title }}</h2>
			<a href="{{ route('dashboard.pejabat.create') }}" class="btn btn-primary">
				<i class="ti ti-plus" aria-hidden="true"></i> Tambah pejabat
			</a>
		</div>

		<div class="card-body">
			<form action="{{ route('dashboard.pejabat.index') }}" method="GET" class="bk-toolbar">
				<div class="bk-search">
					<label for="q" class="visually-hidden">Cari pejabat</label>
					<i class="ti ti-search" aria-hidden="true"></i>
					<input type="search" name="q" id="q" class="form-control" placeholder="Cari nama pejabat…"
						value="{{ request()->q }}">
				</div>
				<button type="submit" class="btn btn-secondary">Cari</button>
				@if (request()->q)
					<a href="{{ route('dashboard.pejabat.index') }}" class="btn btn-outline-secondary">Reset</a>
				@endif
			</form>

			<div class="bk-table-wrap">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Foto</th>
								<th scope="col">Nama lengkap</th>
								<th scope="col">Bagian</th>
								<th scope="col">Unit organisasi</th>
								<th scope="col">Jabatan</th>
								<th scope="col"><span class="visually-hidden">Aksi</span></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data as $item)
								<tr>
									<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}</th>
									<td>
										@if ($item->foto)
											<img class="bk-thumb" src="{{ asset("storage/$item->foto") }}"
												alt="Foto {{ $item->nama }}" loading="lazy" width="132" height="84">
										@else
											<span class="text-muted">—</span>
										@endif
									</td>
									<td>{{ $item->nama }}</td>
									<td>{{ $item->jabatan->unit_organisasi->bagian->nama ?? '—' }}</td>
									<td>{{ $item->jabatan->unit_organisasi->nama ?? '—' }}</td>
									<td>
										@if ($item->jabatan?->nama)
											<a href="{{ route('dashboard.jabatan.tugas.index', $item->jabatan->id) }}">
												{{ $item->jabatan->nama }}
											</a>
										@else
											—
										@endif
									</td>
									<td>
										<div class="bk-actions">
											<a href="{{ route('dashboard.pejabat.edit', $item->id) }}" class="bk-act" title="Ubah">
												<i class="ti ti-pencil" aria-hidden="true"></i>
												<span class="visually-hidden">Ubah {{ $item->nama }}</span>
											</a>
											<form action="{{ route('dashboard.pejabat.destroy', $item->id) }}" method="post">
												@method('delete')
												@csrf
												<button onclick="return confirm('Hapus data {{ addslashes($item->nama) }}? Tindakan ini tidak bisa dibatalkan.')"
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
									<td colspan="7">
										<div class="bk-empty">
											<i class="ti ti-user-off" aria-hidden="true"></i>
											{{ request()->q ? 'Tidak ada hasil untuk pencarian itu.' : 'Belum ada data pejabat yang tersimpan.' }}
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
@endsection
