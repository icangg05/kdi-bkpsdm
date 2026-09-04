<div class="card bg-secondary-dark dashnum-card text-white overflow-hidden">
	<span class="round small"></span>
	<span class="round big"></span>
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="avtar avtar-lg">
					<i class="text-white ti ti-credit-card"></i>
				</div>
			</div>
		</div>
		<span class="text-white d-block f-34 f-w-500 my-2">
			{{ number_format($statistikASN->where('slug', 'pns')->first()->value, 0, ',', '.') }}
			<i class="ti ti-arrow-up-right-circle opacity-50"></i>
		</span>
		<p class="mb-0 opacity-50">Jumlah PNS</p>
	</div>
</div>
