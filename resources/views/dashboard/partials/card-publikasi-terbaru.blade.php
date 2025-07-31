<div class="card">
	<div class="card-body">
		<div class="row mb-3 align-items-center">
			<div class="col">
				<h4>Publikasi Terbaru</h4>
			</div>
			<div class="col-auto"></div>
		</div>

		<div class="rounded bg-light-secondary overflow-hidden mb-3">
			@php
				$img = $publikasiTerbaru->first()->sampul;
				$imgPath = $img ? asset("storage/$img") : asset('img/default-publikasi.png');
			@endphp
			<img src="{{ $imgPath }}" class="img-fluid" style="width: 100%" alt="img.jpg">
		</div>
		<ul class="list-group list-group-flush">
			@forelse ($publikasiTerbaru as $item)
				<li class="list-group-item px-0">
					<div class="row align-items-start">
						<div class="col">
							<h5 class="mb-0" style="cursor: pointer;"
								onclick="window.open('{{ route('berita.show', $item->slug) }}', '_blank')">
								{{ $item->judul }}
							</h5>
							<small class="text-primary">{{ str_replace('-', ' ', str()->title($item->kategori)) }}</small>
						</div>
					</div>
				</li>
			@empty
				<li class="list-group-item px-0">
					<div class="row align-items-start">
						<div class="col">
							<h5 class="mb-0 text-center" style="opacity: .7">
								Tidak ada publikasi terbaru.
							</h5>
						</div>
					</div>
				</li>
			@endforelse
		</ul>
		<div class="text-center">
			<a href="{{ route('publikasi.index', 'berita') }}" target="_blank" class="b-b-primary text-primary">
				Lihat Lainnya
				<i class="ti ti-chevron-right"></i>
			</a>
		</div>
	</div>
</div>
