@extends('layouts.auth.auth')

@section('content')
	<h2>Masuk ke dashboard</h2>
	<p>Gunakan akun pengelola yang diberikan administrator BKPSDM.</p>

	@if (session('lockout_seconds'))
		<div id="lockout-alert" class="mb-3">
			<div class="alert alert-danger" role="alert" aria-live="assertive">
				Terlalu banyak percobaan masuk. Coba lagi dalam
				<strong id="lockout-count">{{ (int) session('lockout_seconds') }}</strong> detik.
			</div>
		</div>
	@endif

	<form action="{{ url('login') }}" method="post" novalidate>
		@csrf

		<div class="bk-auth__field">
			<label for="identitas" class="form-label">Alamat email atau username</label>
			<input
				id="identitas"
				name="email"
				type="text"
				inputmode="email"
				autocomplete="username"
				autocapitalize="none"
				spellcheck="false"
				class="form-control @error('email') is-invalid @enderror"
				value="{{ old('email') }}"
				@error('email') aria-invalid="true" aria-describedby="identitas-error" @enderror
				required
				autofocus />
			@error('email')
				<small class="bk-field-error" id="identitas-error">{{ $message }}</small>
			@enderror
		</div>

		<div class="bk-auth__field">
			<label for="kata-sandi" class="form-label">Password</label>
			<div class="bk-auth__pw">
				<input
					id="kata-sandi"
					name="password"
					type="password"
					autocomplete="current-password"
					class="form-control @error('password') is-invalid @enderror"
					@error('password') aria-invalid="true" aria-describedby="kata-sandi-error" @enderror
					required />
				<button type="button" class="bk-auth__pw-toggle" data-pw-toggle="kata-sandi"
					aria-controls="kata-sandi" aria-pressed="false">
					<i class="ti ti-eye" aria-hidden="true"></i>
					<span class="visually-hidden">Tampilkan password</span>
				</button>
			</div>
			@error('password')
				<small class="bk-field-error" id="kata-sandi-error">{{ $message }}</small>
			@enderror
		</div>

		<div class="bk-auth__row">
			<span class="bk-check">
				<input name="remember" class="form-check-input" type="checkbox" id="remember" value="1" />
				<label for="remember">Ingat saya di perangkat ini</label>
			</span>
		</div>

		<button type="submit" id="btn-login" class="btn btn-primary bk-auth__submit">Masuk</button>
	</form>

	<script>
		(function () {
			// Tombol lihat/sembunyikan password.
			document.querySelectorAll('[data-pw-toggle]').forEach(function (tombol) {
				tombol.addEventListener('click', function () {
					var input = document.getElementById(tombol.dataset.pwToggle);
					var terlihat = input.type === 'text';

					input.type = terlihat ? 'password' : 'text';
					tombol.setAttribute('aria-pressed', String(!terlihat));
					tombol.querySelector('i').className = terlihat ? 'ti ti-eye' : 'ti ti-eye-off';
					tombol.querySelector('span').textContent = terlihat ? 'Tampilkan password' : 'Sembunyikan password';
				});
			});

			// Hitung mundur saat akun terkunci sementara.
			var kotak = document.getElementById('lockout-alert');
			if (!kotak) return;

			var angka = document.getElementById('lockout-count');
			var tombolMasuk = document.getElementById('btn-login');
			var sisa = parseInt(angka.textContent, 10);

			tombolMasuk.disabled = true;

			var timer = setInterval(function () {
				sisa--;

				if (sisa > 0) {
					angka.textContent = sisa;
					return;
				}

				clearInterval(timer);
				kotak.remove();
				tombolMasuk.disabled = false;
			}, 1000);
		})();
	</script>
@endsection
