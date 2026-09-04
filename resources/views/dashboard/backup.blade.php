@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.backup.index')], ['Daftar']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif
	@if (session('error'))
		<x-alert :message="session('error')" color="danger" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
			<h2 class="h5">Data {{ $title }}</h2>
			<form action="{{ route('dashboard.backup.store') }}" method="post" data-sekali-kirim>
				@csrf
				<button type="submit" class="btn btn-primary" @disabled($penuh)
					@if ($penuh) title="Sudah ada 6 berkas backup. Hapus salah satu dulu." @endif>
					<i class="ti ti-database-export" aria-hidden="true"></i> Buat backup sekarang
				</button>
			</form>
		</div>

		<div class="card-body">
			@if ($penuh)
				<x-alert color="warning"
					message="Batas maksimal 6 berkas backup tercapai. Hapus salah satu berkas lama untuk membuat backup baru." />
			@endif

			<div class="bk-table-wrap">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama berkas</th>
								<th scope="col">Ukuran</th>
								<th scope="col">Tanggal</th>
								<th scope="col"><span class="visually-hidden">Aksi</span></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data as $item)
								<tr>
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $item['nama'] }}</td>
									<td class="text-nowrap">{{ $item['ukuran'] }} KB</td>
									<td class="text-nowrap">{{ $item['tanggal'] }}</td>
									<td>
										<div class="bk-actions">
											<a href="{{ route('dashboard.backup.download', $item['nama']) }}" class="bk-act" title="Unduh">
												<i class="ti ti-download" aria-hidden="true"></i>
												<span class="visually-hidden">Unduh {{ $item['nama'] }}</span>
											</a>
											<form action="{{ route('dashboard.backup.destroy', $item['nama']) }}" method="post">
												@method('delete')
												@csrf
												<button onclick="return confirm('Hapus berkas backup {{ $item['nama'] }}? Tindakan ini tidak bisa dibatalkan.')"
													type="submit" class="bk-act bk-act--danger" title="Hapus">
													<i class="ti ti-trash" aria-hidden="true"></i>
													<span class="visually-hidden">Hapus {{ $item['nama'] }}</span>
												</button>
											</form>
										</div>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="5">
										<div class="bk-empty">
											<i class="ti ti-database-off" aria-hidden="true"></i>
											Belum ada berkas backup.
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
@endsection

@push('footer')
	<script>
		// Cegah kirim ganda tanpa men-disable tombol sebelum form terkirim:
		// tombol yang di-disable lebih dulu tidak ikut terkirim sebagai field.
		document.querySelectorAll('form[data-sekali-kirim]').forEach(function (form) {
			form.addEventListener('submit', function () {
				var tombol = form.querySelector('button[type="submit"]');
				if (!tombol) return;

				tombol.textContent = 'Memproses…';
				setTimeout(function () { tombol.disabled = true; }, 0);
			});
		});
	</script>
@endpush
