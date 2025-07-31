@extends('layouts.auth.auth')

@section('content')
	<div class="auth-wrapper v3">
		<form action="{{ url('login') }}" method="post" class="auth-form">
			@csrf
			<div class="card my-5">
				<div class="card-body">
					<a href="#" class="d-flex justify-content-center">
						<img src="{{ asset('img/logo.png') }}" alt="image" class="img-fluid" width="100" />
					</a>
					<div class="row">
						<div class="d-flex justify-content-center">
							<div class="auth-header">
								<h2 class="text-secondary mt-5"><b>BKPSDM</b></h2>
								<p class="f-16 mt-2">Kota Kendari</p>
							</div>
						</div>
					</div>
					{{-- <div class="d-grid">
						<button type="button" class="btn mt-2 bg-light-primary bg-light text-muted">
							<img src="{{ asset('') }}/assets/images/authentication/google-icon.svg" alt="image" />Sign In With Google
						</button>
					</div>
					<div class="saprator mt-3">
						<span>or</span>
					</div> --}}
					<h5 class="my-4 d-flex justify-content-center">Masukkan email/username dan password untuk login</h5>
					<div class="form-floating mb-3">
						<input value="{{ old('email') }}" name="email" type="text" class="form-control" id="floatingInput"
							placeholder="Email address / Username" required autofocus/>
						<label for="floatingInput">Alamat email / Username</label>
						@error('email')
							<span class="text-danger">{{ $message }}</span>
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
							<input name="remember" class="form-check-input input-primary" type="checkbox" id="customCheckc1" />
							<label class="form-check-label text-muted" for="customCheckc1">Ingat saya</label>
						</div>
						<h5 class="text-secondary">Lupa Password?</h5>
					</div>
					<div class="d-grid mt-4">
						<button type="submit" type="button" class="btn btn-secondary">Login</button>
					</div>
					<hr />
					{{-- <h5 class="d-flex justify-content-center">Don't have an account?</h5> --}}
				</div>
			</div>
		</form>
	</div>
@endsection
