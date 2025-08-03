@extends('layouts.app.dashboard')

@section('content')
	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.user.index')], ['Index']]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			<div class="mb-3">
				<a href="{{ route('dashboard.user.create') }}" class="btn btn-primary">Tambah Data</a>
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
						<form action="{{ route('dashboard.user.index') }}" method="GET" class="mb-4 col-md-4 d-flex gap-2">
							<input type="text" name="q" id="q" placeholder="Pencarian..."
								class="form-control"
								value="{{ request()->q }}">
							<button type="submit" class="btn btn-secondary">Cari</button>
						</form>

						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-sm" style="border: 1px solid #b3b2b2">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nama Lengkap</th>
										<th scope="col">Role</th>
										<th scope="col">Username</th>
										<th scope="col">Email</th>
										<th scope="col">Status</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($users as $item)
										<tr>
											<th scope="row">{{ $loop->iteration + $users->firstItem() - 1 }}.</th>
											<td>{{ $item->name }}</td>
											<td>
												<span class="badge text-bg-dark">{{ str_replace('-', ' ', str()->title($item->role)) }}</span>
											</td>
											<td>{{ $item->username }}</td>
											<td>{{ $item->email }}</td>
											<td>
												@if ($item->email_verified_at)
													<span class="badge text-bg-success">Verified</span>
												@else
													<span class="badge text-bg-warning">Pending</span>
												@endif
											</td>
											<td class="text-nowrap">
												<a href="{{ route('dashboard.user.edit', $item->id) }}"
													class="btn btn-sm btn-secondary badge">Edit</a>
												<form class="d-inline" action="{{ route('dashboard.user.destroy', $item->id) }}"
													method="post">
													@method('delete')
													@csrf
													<button @disabled(auth()->user()->id == $item->id) onclick="return confirm('Hapus data ini?')" type="submit"
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
						</div>

						<div class="d-flex justify-content-center">
							{{ $users->links() }}
						</div>
					</div>
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
