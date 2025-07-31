@extends('layouts.app.dashboard')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					@include('dashboard.partials.card-jumlah-pns')
				</div>
				<div class="col-md-6">
					@include('dashboard.partials.card-jumlah-pppk')
				</div>
				<div class="col-md-6">
					@include('dashboard.partials.card-jumlah-regulasi')
				</div>
				<div class="col-md-6">
					@include('dashboard.partials.card-jumlah-pejabat')
				</div>
			</div>
		</div>
		<div class="col-md-4">
			@include('dashboard.partials.card-publikasi-terbaru')
		</div>
	</div>
@endsection
