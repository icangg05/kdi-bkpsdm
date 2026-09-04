@extends('layouts.app.dashboard')

@section('content')
	@php
		$routeSubmit = isset($data) ? route('dashboard.user.update', $data->id) : route('dashboard.user.store');
		$adalahAdmin = auth()->user()->can('admin');
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[
		    [$adalahAdmin ? 'User' : 'Profil', $adalahAdmin ? route('dashboard.user.index') : '#'],
		    [isset($data) ? 'Ubah' : 'Tambah'],
		]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	@can('admin')
		<div class="mb-3">
			<a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-secondary">
				<i class="ti ti-arrow-left" aria-hidden="true"></i> Kembali ke daftar
			</a>
		</div>
	@endcan

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ isset($data) ? 'Ubah data akun' : 'Tambah user' }}</h2>
		</div>
		<div class="card-body">
			<form action="{{ $routeSubmit }}" method="POST">
				@csrf
				@if (isset($data))
					@method('patch')
				@endif

				<fieldset class="bk-fieldset">
					<legend><i class="ti ti-user" aria-hidden="true"></i>Identitas</legend>

					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name" class="form-label">Nama lengkap</label>
								<input type="text" name="name" id="name" autocomplete="name"
									class="form-control @error('name') is-invalid @enderror"
									value="{{ old('name', $data->name ?? '') }}" placeholder="Nama lengkap pengguna" required>
								@error('name')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" id="email" autocomplete="email"
									class="form-control @error('email') is-invalid @enderror"
									value="{{ old('email', $data->email ?? '') }}" placeholder="nama@email.com" required>
								@error('email')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="username" class="form-label">Username</label>
								<input type="text" name="username" id="username" autocomplete="username" autocapitalize="none"
									spellcheck="false" class="form-control @error('username') is-invalid @enderror"
									value="{{ old('username', $data->username ?? '') }}" placeholder="Contoh: admin.bkpsdm" required>
								@error('username')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
					</div>
				</fieldset>

				@php
					$akunSendiri = isset($data) && auth()->user()->id === $data->id;
				@endphp

				@if ($adalahAdmin && !$akunSendiri)
					<fieldset class="bk-fieldset">
						<legend><i class="ti ti-shield-lock" aria-hidden="true"></i>Hak akses</legend>

						<div class="row g-3">
							<div class="col-md-6">
								<div class="form-group">
									<label for="role" class="form-label">Peran</label>
									<select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
										@foreach (\App\Models\User::ROLES as $nilai => $label)
											<option value="{{ $nilai }}" @selected(old('role', $data->role ?? 'operator') === $nilai)>
												{{ $label }}
											</option>
										@endforeach
									</select>
									@error('role')
										<small class="bk-field-error">{{ $message }}</small>
									@enderror
									<small class="bk-hint">
										Administrator bisa mengelola akun lain dan mengunduh backup basis data.
										Operator hanya mengelola isi situs.
									</small>
								</div>
							</div>
						</div>
					</fieldset>
				@elseif (isset($data))
					<p class="bk-hint mb-3">
						Peran akun ini: <strong>{{ \App\Models\User::ROLES[$data->role] ?? $data->role }}</strong>.
						Hanya administrator lain yang bisa mengubahnya.
					</p>
				@endif

				<fieldset class="bk-fieldset">
					<legend><i class="ti ti-lock" aria-hidden="true"></i>Password</legend>

					@if (isset($data))
						<p class="bk-hint mb-3">Kosongkan kedua kolom ini kalau password tidak diubah.</p>
					@endif

					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" id="password" autocomplete="new-password"
									class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter"
									@required(!isset($data))>
								@error('password')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="password_confirmation" class="form-label">Konfirmasi password</label>
								<input type="password" name="password_confirmation" id="password_confirmation"
									autocomplete="new-password"
									class="form-control @error('password_confirmation') is-invalid @enderror"
									placeholder="Ulangi password" @required(!isset($data))>
								@error('password_confirmation')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
					</div>
				</fieldset>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
					@can('admin')
						<a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-secondary">Batal</a>
					@endcan
				</div>
			</form>
		</div>
	</div>
@endsection
