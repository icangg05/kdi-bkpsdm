@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.video.index')], ['Index']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.video.create') }}" class="btn btn-primary">Tambah Data</a>
			</div>

			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body table-responsive">
					<form action="{{ route('dashboard.video.index') }}" method="GET"
						class="mb-4 col-md-4 d-flex gap-2">
						<input type="text" name="q" id="q" placeholder="Pencarian..."
							class="form-control"
							value="{{ request()->q }}">
						<button type="submit" class="btn btn-secondary">Cari</button>
					</form>

					<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Judul</th>
								<th scope="col">Deskripsi</th>
								<th scope="col" class="text-center">Link Video</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php
								function getYoutubeId($url)
								{
								    preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $url, $matches);
								    return $matches[1] ?? null;
								}
							@endphp

							@forelse ($data as $item)
								<tr>
									<th scope="row">{{ $loop->iteration }}.</th>
									<td>{{ $item->judul }}</td>
									<td>{{ $item->deskripsi }}</td>
									<td class="text-center">
										<iframe width="200" height="113"
											src="https://www.youtube.com/embed/{{ getYoutubeId($item->link) }}"
											title="YouTube video"
											frameborder="0"
											allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
											allowfullscreen>
										</iframe>
									</td>
									<td class="text-nowrap">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F Y') }}</td>
									<td class="text-nowrap">
										<a href="{{ route('dashboard.video.edit', $item->id) }}"
											class="btn btn-sm btn-secondary badge">Edit</a>
										<form class="d-inline" action="{{ route('dashboard.video.destroy', $item->id) }}"
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

					<div class="d-flex justify-content-center">
						{{ $data->links() }}
					</div>
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
