<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col">
				<div class="page-header-title">
					<h5 class="m-b-10">{{ $title }}</h5>
				</div>
			</div>
			<div class="col-auto">
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
			</div>
		</div>
	</div>
</div>
