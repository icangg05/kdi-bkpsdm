@extends('layouts.app.dashboard')

@section('content')
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.user.index')], ['Daftar']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
			<h2 class="h5">Data {{ $title }}</h2>
			<a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">
				<i class="ti ti-plus" aria-hidden="true"></i> Tambah user
			</a>
		</div>

		<div class="card-body">
			<form action="{{ route('dashboard.user.index') }}" method="GET" class="bk-toolbar">
				<div class="bk-search">
					<label for="q" class="visually-hidden">Cari user</label>
					<i class="ti ti-search" aria-hidden="true"></i>
					<input type="search" name="q" id="q" class="form-control" placeholder="Cari nama atau username…"
						value="{{ request()->q }}">
				</div>
				<button type="submit" class="btn btn-secondary">Cari</button>
				@if (request()->q)
					<a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-secondary">Reset</a>
				@endif
			</form>

			<div class="bk-table-wrap">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama lengkap</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								<th scope="col">Peran</th>
								<th scope="col"><span class="visually-hidden">Aksi</span></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($users as $item)
								<tr>
									<th scope="row">{{ $loop->iteration + $users->firstItem() - 1 }}</th>
									<td>
										{{ $item->name }}
										@if (auth()->user()->id == $item->id)
											<span class="bk-feed__kategori">Akun Anda</span>
										@endif
									</td>
									<td>{{ $item->username }}</td>
									<td>{{ $item->email }}</td>
									<td>
										<span class="bk-feed__kategori">
											{{ \App\Models\User::ROLES[$item->role] ?? $item->role }}
										</span>
									</td>
									<td>
										<div class="bk-actions">
											<a href="{{ route('dashboard.user.edit', $item->id) }}" class="bk-act" title="Ubah">
												<i class="ti ti-pencil" aria-hidden="true"></i>
												<span class="visually-hidden">Ubah {{ $item->name }}</span>
											</a>
											<form action="{{ route('dashboard.user.destroy', $item->id) }}" method="post">
												@method('delete')
												@csrf
												<button
													@disabled(auth()->user()->id == $item->id)
													title="{{ auth()->user()->id == $item->id ? 'Akun sendiri tidak bisa dihapus' : 'Hapus' }}"
													onclick="return confirm('Hapus user {{ addslashes($item->name) }}? Tindakan ini tidak bisa dibatalkan.')"
													type="submit" class="bk-act bk-act--danger">
													<i class="ti ti-trash" aria-hidden="true"></i>
													<span class="visually-hidden">Hapus {{ $item->name }}</span>
												</button>
											</form>
										</div>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="5">
										<div class="bk-empty">
											<i class="ti ti-user-off" aria-hidden="true"></i>
											{{ request()->q ? 'Tidak ada hasil untuk pencarian itu.' : 'Belum ada user terdaftar.' }}
										</div>
									</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>

			<div class="d-flex justify-content-center mt-3">{{ $users->links() }}</div>
		</div>
	</div>
@endsection
