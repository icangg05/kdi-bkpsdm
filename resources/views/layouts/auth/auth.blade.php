<!DOCTYPE html>
<html lang="en">

<head>
	@include('layouts.auth.partials.head')
</head>

<body>
	@php
		$query = App\Models\Halaman::where('kategori', 'logo')->first();
		$logo = $query && $query->gambar ? $query->gambar : null;
	@endphp

	@include('layouts.auth.partials.loader')

	<div class="auth-main">
		<div class="auth-wrapper v3">
			<div class="auth-form">
				<div class="card my-5">
					<div class="card-body">
						<a href="{{ route('beranda') }}" class="d-flex justify-content-center">
							<img src="{{ asset("storage/$logo") }}" alt="Logo" class="img-fluid" width="150" />
						</a>
						<div class="row">
							<div class="d-flex justify-content-center" style="margin-top: -10px">
								<div class="auth-header">
									<h2 class="text-primary mt-5"><b>BKPSDM</b></h2>
									<p style="margin-top: -10px">Kota Kendari</p>
								</div>
							</div>
						</div>
						@yield('content')
						<hr />
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.auth.partials.footer')
</body>

</html>
