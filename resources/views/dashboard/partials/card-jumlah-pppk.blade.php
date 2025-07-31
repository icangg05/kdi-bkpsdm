<div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
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
		<div class="tab-content" id="chart-tab-tabContent">
			<div class="tab-pane show active" id="chart-tab-home" role="tabpanel" aria-labelledby="chart-tab-home-tab"
				tabindex="0">
				<div class="row">
					<div class="col-6">
						<span class="text-white d-block f-34 f-w-500 my-2">
							{{ number_format($statistikASN->where('slug', 'pppk')->first()->value, 0, ',', '.') }}
							<i class="ti ti-arrow-up-right-circle opacity-50"></i>
						</span>
						<p class="mb-0 opacity-50">Jumlah PPPK</p>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="chart-tab-profile" role="tabpanel" aria-labelledby="chart-tab-profile-tab"
				tabindex="0">
				<div class="row">
					<div class="col-6">
						<span class="text-white d-block f-34 f-w-500 my-2">
							$291
							<i class="ti ti-arrow-down-right-circle opacity-50"></i>
						</span>
						<p class="mb-0 opacity-50">C/W Last Year</p>
					</div>
					<div class="col-6">
						<div id="tab-chart-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
