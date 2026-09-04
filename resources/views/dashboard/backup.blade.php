@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.backup.index')], ['Index']]" />

	<div class="row">
		<div class="col-sm-12">
			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif
			@if (session('error'))
				<x-alert :message="session('error')" color="danger" />
			@endif

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5>Data {{ $title }}</h5>
					<form action="{{ route('dashboard.backup.store') }}" method="post">
						@csrf
						<button type="submit" class="btn btn-primary btn-sm" @disabled($penuh)
							@if ($penuh) title="Sudah 6 file backup. Hapus salah satu untuk membuat backup baru." @endif
							onclick="this.disabled=true;this.innerText='Memproses...';this.form.submit()">
							Buat Backup Sekarang
						</button>
					</form>
				</div>
				<div class="card-body">
					@if ($penuh)
						<p class="text-danger small">Batas maksimal 6 file backup tercapai. Hapus salah satu file lama untuk membuat backup baru.</p>
					@endif

					<div class="table-responsive">
						<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama File</th>
									<th scope="col">Ukuran</th>
									<th scope="col">Tanggal</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($data as $item)
									<tr>
										<th scope="row">{{ $loop->iteration }}.</th>
										<td>{{ $item['nama'] }}</td>
										<td>{{ $item['ukuran'] }} KB</td>
										<td>{{ $item['tanggal'] }}</td>
										<td class="text-nowrap">
											<a href="{{ route('dashboard.backup.download', $item['nama']) }}"
												class="btn btn-sm btn-secondary badge">Unduh</a>
											<form class="d-inline" action="{{ route('dashboard.backup.destroy', $item['nama']) }}" method="post">
												@method('delete')
												@csrf
												<button onclick="return confirm('Hapus file backup ini?')" type="submit"
													class="btn btn-sm btn-danger badge">Hapus</button>
											</form>
										</td>
									</tr>
								@empty
									<tr class="text-center">
										<td colspan="5">Belum ada file backup.</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
