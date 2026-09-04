@extends('layouts.auth.auth')

@section('content')
	@if (session('lockout_seconds'))
		<div id="lockout-alert" class="mt-4">
			<x-alert color="danger"
				:message="'Terlalu banyak percobaan login. Coba lagi dalam ' . session('lockout_seconds') . ' detik.'" />
		</div>
	@endif

	<form action="{{ url('login') }}" method="post">
		@csrf
		<h5 class="my-4 d-flex justify-content-center">Login dengan credentials yang valid</h5>
		<div class="form-floating mb-3">
			<input value="{{ old('email') }}" name="email" type="text" class="form-control" id="floatingInput"
				placeholder="Email address / Username" required autofocus />
			<label for="floatingInput">Alamat email / Username</label>
			@error('email')
				<small class="d-block mt-1 text-danger">{{ $message }}</small>
			@enderror
		</div>
		<div class="form-floating mb-3">
			<input name="password" type="password" class="form-control" id="floatingInput1" placeholder="Password" required />
			<label for="floatingInput1">Password</label>
			@error('password')
				<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>
		<div class="d-flex mt-1 justify-content-between">
			<div class="form-check">
				<input name="remember" class="form-check-input input-primary" type="checkbox" id="remember" />
				<label class="form-check-label text-muted" for="remember">Ingat saya</label>
			</div>
			{{-- <a href="{{ route('password.request') }}" class="text-primary">Lupa Password?</a> --}}
		</div>
		<div class="d-grid mt-4">
			<button type="submit" id="btn-login" class="btn btn-primary">Login</button>
		</div>
	</form>

	@if (session('lockout_seconds'))
		<script>
			(function () {
				var sisa = {{ (int) session('lockout_seconds') }};
				var kotak = document.querySelector('#lockout-alert .alert');
				var tombol = document.getElementById('btn-login');

				tombol.disabled = true;

				var timer = setInterval(function () {
					sisa--;

					if (sisa > 0) {
						kotak.textContent = 'Terlalu banyak percobaan login. Coba lagi dalam ' + sisa + ' detik.';
						return;
					}

					clearInterval(timer);
					document.getElementById('lockout-alert').remove();
					tombol.disabled = false;
				}, 1000);
			})();
		</script>
	@endif
@endsection
