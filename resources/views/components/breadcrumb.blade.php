<div class="page-header bk-rise">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col">
				<div class="page-header-title">
					{{-- Judul halaman adalah <h1>: sebelumnya <h5>, sehingga tidak ada
					     satu pun heading tingkat satu di seluruh dashboard. --}}
					<h1 class="h5 m-b-10">{{ $title }}</h1>
				</div>
			</div>
			<div class="col-auto">
				<nav aria-label="Remah navigasi">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
						@foreach ($list as $i => $item)
							@if ($i != count($list) - 1)
								<li class="breadcrumb-item"><a href="{{ $item[1] }}">{{ $item[0] }}</a></li>
							@else
								<li class="breadcrumb-item" aria-current="page">{{ $item[0] }}</li>
							@endif
						@endforeach
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
