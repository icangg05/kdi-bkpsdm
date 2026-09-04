@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.video.index')], ['Daftar']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
			<h2 class="h5">Data {{ $title }}</h2>
			<a href="{{ route('dashboard.video.create') }}" class="btn btn-primary">
				<i class="ti ti-plus" aria-hidden="true"></i> Tambah video
			</a>
		</div>

		<div class="card-body">
			<form action="{{ route('dashboard.video.index') }}" method="GET" class="bk-toolbar">
				<div class="bk-search">
					<label for="q" class="visually-hidden">Cari video</label>
					<i class="ti ti-search" aria-hidden="true"></i>
					<input type="search" name="q" id="q" class="form-control" placeholder="Cari judul video…"
						value="{{ request()->q }}">
				</div>
				<button type="submit" class="btn btn-secondary">Cari</button>
				@if (request()->q)
					<a href="{{ route('dashboard.video.index') }}" class="btn btn-outline-secondary">Reset</a>
				@endif
			</form>

			<div class="bk-table-wrap">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Pratinjau</th>
								<th scope="col">Judul</th>
								<th scope="col">Deskripsi</th>
								<th scope="col">Tanggal</th>
								<th scope="col"><span class="visually-hidden">Aksi</span></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data as $item)
								@php $idVideo = youtube_id($item->link); @endphp
								<tr>
									<th scope="row">{{ $loop->iteration + $data->firstItem() - 1 }}</th>
									<td>
										{{-- Gambar sampul, bukan <iframe> per baris: satu halaman daftar
										     sebelumnya memuat belasan pemutar YouTube sekaligus. --}}
										@if ($idVideo)
											<a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
												<img class="bk-thumb" src="https://i.ytimg.com/vi/{{ $idVideo }}/mqdefault.jpg"
													alt="Sampul video {{ $item->judul }}" loading="lazy" width="132" height="84">
												<span class="visually-hidden">Putar di YouTube (tab baru)</span>
											</a>
										@else
											<span class="text-muted">Tautan tidak dikenali</span>
										@endif
									</td>
									<td>{{ $item->judul }}</td>
									<td>{{ str()->words($item->deskripsi, 16) }}</td>
									<td class="text-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j M Y') }}</td>
									<td>
										<div class="bk-actions">
											<a href="{{ route('dashboard.video.edit', $item->id) }}" class="bk-act" title="Ubah">
												<i class="ti ti-pencil" aria-hidden="true"></i>
												<span class="visually-hidden">Ubah {{ $item->judul }}</span>
											</a>
											<form action="{{ route('dashboard.video.destroy', $item->id) }}" method="post">
												@method('delete')
												@csrf
												<button onclick="return confirm('Hapus video {{ addslashes($item->judul) }}? Tindakan ini tidak bisa dibatalkan.')"
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
											<i class="ti ti-player-stop" aria-hidden="true"></i>
											{{ request()->q ? 'Tidak ada hasil untuk pencarian itu.' : 'Belum ada video di galeri.' }}
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
