@extends('layouts.auth.auth')

@section('content')
	@if (session('status'))
		<x-alert :message="session('status')" color="success" />
	@endif

	<form action="{{ route('password.email') }}" method="POST">
		@csrf
		<h5 class="my-4 d-flex justify-content-center">Lupa Password</h5>
		<p class="text-center text-muted">Masukkan email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang
			password Anda.</p>

		<div class="form-floating mb-3">
			<input value="{{ old('email') }}" name="email" type="email" class="form-control" id="floatingEmail"
				placeholder="Alamat email" required autofocus />
			<label for="floatingEmail">Alamat Email</label>
			@error('email')
				<small class="d-block mt-1 text-danger">{{ $message }}</small>
			@enderror
		</div>

		<div class="d-grid mt-3">
			<button type="submit" class="btn btn-primary">Kirim Link Reset</button>
		</div>

		<div class="d-grid mt-2">
			<a href="{{ route('login') }}" class="btn btn-outline-light text-dark">← Kembali ke Login</a>
		</div>
	</form>
@endsection
