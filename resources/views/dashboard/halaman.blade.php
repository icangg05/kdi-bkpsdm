@extends('layouts.app.dashboard')

@section('content')
	@php
		$kategori = request()->segment(3);
		$hanyaGambar = $kategori === 'struktur-organisasi';
		$punyaGambar = in_array($kategori, ['logo', 'struktur-organisasi'], true);
	@endphp

	<x-breadcrumb
		:title="$title"
		:list="[[$title, route('dashboard.halaman', $halaman)], ['Ubah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header">
			<h2 class="h5">{{ $title }}</h2>
		</div>
		<div class="card-body">
			<form action="{{ route('dashboard.halaman.update', $halaman) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('patch')

				<div class="row g-3">
					<div class="col-lg-7">
						@if ($hanyaGambar)
							@if (isset($data) && $data->gambar)
								<div class="bk-preview">
									<img src="{{ asset("storage/$data->gambar") }}" alt="Bagan struktur organisasi BKPSDM Kota Kendari"
										style="max-width: 100%" loading="lazy">
								</div>
							@else
								<x-alert color="warning" message="Bagan struktur organisasi belum diunggah." />
							@endif
						@else
							<div class="form-group">
								<label for="isi" class="form-label">Isi halaman</label>
								<x-ckeditor5 name="isi" :value="$data->isi ?? ''" />
								@error('isi')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						@endif
					</div>

					<div class="col-lg-5">
						@if ($punyaGambar)
							<div class="form-group mb-3">
								<label for="gambar" class="form-label">Unggah {{ strtolower($title) }}</label>
								<input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror"
									accept="image/*">
								<small class="bk-hint">Gambar maksimal {{ config('app.size_img') / 1024 }} MB.</small>
								@error('gambar')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror

								@if (isset($data) && $data->gambar && !$hanyaGambar)
									<div class="bk-preview">
										<img src="{{ asset("storage/$data->gambar") }}" alt="{{ $title }} saat ini" loading="lazy">
									</div>
								@endif
							</div>
						@endif

						@unless ($hanyaGambar)
							<div class="form-group mb-3">
								<label for="lampiran" class="form-label">Lampiran</label>
								<input type="file" name="lampiran" id="lampiran"
									class="form-control @error('lampiran') is-invalid @enderror">
								<small class="bk-hint">Berkas maksimal {{ config('app.size_file') / 1024 }} MB.</small>
								@error('lampiran')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror

								@if (isset($data) && $data->lampiran)
									<div class="bk-file">
										<a href="{{ asset("storage/$data->lampiran") }}" class="btn btn-secondary btn-sm" target="_blank"
											rel="noopener noreferrer">
											<i class="ti ti-paperclip" aria-hidden="true"></i>
											{{ get_original_filename($data->lampiran) }}
										</a>
										<a onclick="return confirm('Hapus lampiran ini?')"
											href="{{ route('dashboard.halaman.delete-lampiran', $data->id) }}"
											class="btn btn-outline-danger btn-sm">Hapus lampiran</a>
									</div>
								@endif
							</div>
						@endunless
					</div>
				</div>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection
