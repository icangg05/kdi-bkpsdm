@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.regulasi.index')], ['Index']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.regulasi.create') }}" class="btn btn-primary">Tambah Data</a>
			</div>

			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Judul</th>
								<th scope="col">Deskripsi</th>
								<th scope="col">Kategori Regulasi</th>
								<th scope="col">Lampiran</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data as $item)
								<tr>
									<th scope="row">{{ $loop->iteration }}.</th>
									<td>{{ $item->judul }}</td>
									<td>{{ $item->deskripsi }}</td>
									<td>{{ $item->kategori_regulasi->nama }}</td>
									<td>
										<a href="{{ asset("storage/$item->lampiran") }}"
											class="btn btn-primary badge"
											onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;">
											Lampiran
										</a>
									</td>
									<td class="text-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y') }}</td>
									<td class="text-nowrap">
										<a href="{{ route('dashboard.regulasi.edit', $item->id) }}"
											class="btn btn-sm btn-secondary badge">Edit</a>
										<form class="d-inline" action="{{ route('dashboard.regulasi.destroy', $item->id) }}"
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
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
