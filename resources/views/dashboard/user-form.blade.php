@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.user.update', $data->id) : route('dashboard.user.store');
	@endphp

	<!-- [ breadcrumb ] start -->
	<x-breadcrumb
		:title="$title"
		:list="[
		    [
		        auth()->user()->can('admin') ? $title : 'Profil',
		        auth()->user()->can('admin') ? route('dashboard.user.index') : '#',
		    ],
		    ['Form'],
		]" />
	<!-- [ breadcrumb ] end -->


	<!-- [ Main Content ] start -->
	<div class="row">
		<!-- [ sample-page ] start -->
		<div class="col-sm-12">
			@can('admin')
				<div class="mb-3">
					<a href="{{ route('dashboard.user.index') }}" class="btn btn-secondary">Kembali</a>
				</div>
			@endcan

			@if (session('success'))
				<x-alert :message="session('success')" color="success" />
			@endif

			<div class="card">
				<div class="card-header">
					<h5>Data {{ $title }}</h5>
				</div>
				<div class="card-body">
					<form action="{{ $routeSubmit }}" method="POST" enctype="multipart/form-data">
						@csrf
						@if (isset($data))
							@method('patch')
						@endif

						<div class="row">
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label for="name" class="form-label">Nama Lengkap</label>
									<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
										value="{{ old('name', $data->name ?? '') }}" required>
									@error('name')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
										value="{{ old('email', $data->email ?? '') }}" required>
									@error('email')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label for="username" class="form-label">Username</label>
									<input type="text" name="username" id="username"
										class="form-control @error('username') is-invalid @enderror"
										value="{{ old('username', $data->username ?? '') }}" required>
									@error('username')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									@can('pengelola-konten')
										<input type="hidden" name="role" value="{{ $data->role }}">
									@endcan
									<label for="role" class="form-label">Role</label>
									<select name="role" class="form-select" id="tom-select" required @disabled(auth()->user()->role == 'pengelola-konten')>
										<option value="">Pilih...</option>
										@php
											$roles = [
											    ['label' => 'Admin', 'value' => 'admin'],
											    ['label' => 'Pengelola Konten', 'value' => 'pengelola-konten'],
											];
										@endphp
										@foreach ($roles as $item)
											<option
												@selected($item['value'] == old('role', $data->role ?? ''))
												value="{{ $item['value'] }}">
												{{ $item['label'] }}
											</option>
										@endforeach
									</select>
									@error('role')
										<small class="text-danger">{{ $message }}</small>
									@enderror

									@push('footer')
										<script>
											new TomSelect("#tom-select", {
												create: true,
												sortField: {
													field: "text",
													direction: "asc"
												}
											});
										</script>
									@endpush
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label for="password" class="form-label">Password</label>
									<input type="password" name="password" id="password"
										class="form-control @error('password') is-invalid @enderror" @required(!isset($data))>
									@error('password')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-group mb-3">
									<label for="password_confirmation" class="form-label">Konfirmasi Password</label>
									<input type="password" name="password_confirmation" id="password_confirmation"
										class="form-control @error('password_confirmation') is-invalid @enderror"
										@required(!isset($data))>
									@error('password_confirmation')
										<small class="text-danger">{{ $message }}</small>
									@enderror
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="d-grid">
									<button type="submit" class="btn btn-primary">Simpan</button>
									<button type="reset" class="btn btn-light">Reset</button>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
			<!-- [ sample-page ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
@endsection
