@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.pejabat.index')], ['Index']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.pejabat.create') }}" class="btn btn-primary">Tambah Data</a>
			</div>

			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 table-responsive">
							<form action="{{ route('dashboard.pejabat.index') }}" method="GET"
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
										<th scope="col">Nama Lengkap</th>
										<th scope="col">Bagian</th>
										<th scope="col">Unit Organisasi</th>
										<th scope="col">Jabatan</th>
										<th scope="col">Foto</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($data as $item)
										<tr>
											<th scope="row">{{ $loop->iteration }}.</th>
											<td>{{ $item->nama }}</td>
											<td>{{ $item->jabatan->unit_organisasi->bagian->nama ?? '-' }}</td>
											<td>{{ $item->jabatan->unit_organisasi->nama ?? '-' }}</td>
											<td>
												@if ($item->jabatan->nama)
													<a href="{{ route('dashboard.jabatan.tugas.index', $item->jabatan->id) }}">{{ $item->jabatan->nama }}</a>
												@else
													-
												@endif
											</td>
											<td>
												@if ($item->foto)
													<img class="img-thumbnail" width="150" src="{{ asset("storage/$item->foto") }}"
														alt="{{ $item->foto }}">
												@else
													-
												@endif
											</td>
											<td class="text-nowrap">
												<a href="{{ route('dashboard.pejabat.edit', $item->id) }}"
													class="btn btn-sm btn-secondary badge">Edit</a>
												<form class="d-inline" action="{{ route('dashboard.pejabat.destroy', $item->id) }}"
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
											<td colspan="7">Tidak ada data ditemukan.</td>
										</tr>
									@endforelse
								</tbody>
							</table>

							<div class="d-flex justify-content-center">
								{{ $data->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
