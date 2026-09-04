@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.regulasi.index')], ['Daftar']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
			<h2 class="h5">Data {{ $title }}</h2>
			<a href="{{ route('dashboard.regulasi.create') }}" class="btn btn-primary">
				<i class="ti ti-plus" aria-hidden="true"></i> Tambah regulasi
			</a>
		</div>

		<div class="card-body">
			<form action="{{ route('dashboard.regulasi.index') }}" method="GET" class="bk-toolbar">
				<div class="bk-search">
					<label for="q" class="visually-hidden">Cari regulasi</label>
					<i class="ti ti-search" aria-hidden="true"></i>
					<input type="search" name="q" id="q" class="form-control" placeholder="Cari judul regulasi…"
						value="{{ request()->q }}">
				</div>
				<button type="submit" class="btn btn-secondary">Cari</button>
				@if (request()->q)
					<a href="{{ route('dashboard.regulasi.index') }}" class="btn btn-outline-secondary">Reset</a>
				@endif
			</form>

			<div class="bk-table-wrap">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Judul</th>
								<th scope="col">Deskripsi</th>
								<th scope="col">Kategori</th>
								<th scope="col">Berkas</th>
								<th scope="col"><span class="visually-hidden">Aksi</span></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data as $item)
								<tr>
									<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}</th>
									<td>{{ $item->judul }}</td>
									<td>{{ str()->words($item->deskripsi, 18) }}</td>
									<td class="text-nowrap">{{ $item->kategori_regulasi?->nama ?? '—' }}</td>
									<td>
										@if ($item->lampiran)
											<a href="{{ asset("storage/$item->lampiran") }}" class="bk-act" title="Buka berkas"
												target="_blank" rel="noopener noreferrer">
												<i class="ti ti-file-download" aria-hidden="true"></i>
												<span class="visually-hidden">Buka berkas {{ $item->judul }} (tab baru)</span>
											</a>
										@else
											—
										@endif
									</td>
									<td>
										<div class="bk-actions">
											<a href="{{ route('dashboard.regulasi.edit', $item->id) }}" class="bk-act" title="Ubah">
												<i class="ti ti-pencil" aria-hidden="true"></i>
												<span class="visually-hidden">Ubah {{ $item->judul }}</span>
											</a>
											<form action="{{ route('dashboard.regulasi.destroy', $item->id) }}" method="post">
												@method('delete')
												@csrf
												<button onclick="return confirm('Hapus {{ addslashes($item->judul) }}? Tindakan ini tidak bisa dibatalkan.')"
													type="submit" class="bk-act bk-act--danger" title="Hapus">
													<i class="ti ti-trash" aria-hidden="true"></i>
													<span class="visually-hidden">Hapus {{ $item->judul }}</span>
												</button>
											</form>
										</div>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="6">
										<div class="bk-empty">
											<i class="ti ti-file-off" aria-hidden="true"></i>
											{{ request()->q ? 'Tidak ada hasil untuk pencarian itu.' : 'Belum ada regulasi yang tersimpan.' }}
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
