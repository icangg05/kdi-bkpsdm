@extends('layouts.app.dashboard')

@section('content')
	@php
		$teksBerjalanRaw = $data->firstWhere('nama_pengaturan', 'teks_berjalan')?->value;
		$teksBerjalan = json_decode($teksBerjalanRaw ?? '', true) ?: ['visibility' => 1, 'duration' => 0, 'items' => ''];
	@endphp

	<x-breadcrumb :title="$title" :list="[[$title, route('dashboard.pengaturan')], ['Ubah']]" />

	@if (session('success'))
		<x-alert :message="session('success')" color="success" />
	@endif

	<div class="card bk-rise bk-rise-1">
		<div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
			<h2 class="h5">{{ $title }}</h2>
			<a href="{{ route('dashboard.clear-unused-image') }}" class="btn btn-outline-secondary"
				onclick="return confirm('Hapus semua gambar yang tidak lagi dipakai konten mana pun?')">
				<i class="ti ti-trash" aria-hidden="true"></i> Bersihkan gambar tak terpakai
			</a>
		</div>
		<div class="card-body">
			<form action="{{ route('dashboard.pengaturan.update') }}" method="POST">
				@csrf
				@method('patch')

				<fieldset class="bk-fieldset">
					<legend><i class="ti ti-notebook" aria-hidden="true"></i>Identitas &amp; kontak</legend>

					<div class="row g-3">
						@foreach ($data->where('nama_pengaturan', '!=', 'teks_berjalan') as $item)
							<div class="col-md-6">
								<div class="form-group">
									<label for="{{ $item->nama_pengaturan }}" class="form-label">{{ $item->label }}</label>
									<input type="text" name="{{ $item->nama_pengaturan }}" id="{{ $item->nama_pengaturan }}"
										class="form-control @error($item->nama_pengaturan) is-invalid @enderror"
										value="{{ old($item->nama_pengaturan, $item->value ?? '') }}"
										placeholder="Isi {{ $item->label }}…" required>
									@error($item->nama_pengaturan)
										<small class="bk-field-error">{{ $message }}</small>
									@enderror
								</div>
							</div>
						@endforeach
					</div>
				</fieldset>

				<fieldset class="bk-fieldset">
					<legend><i class="ti ti-writing" aria-hidden="true"></i>Teks berjalan beranda</legend>

					<div class="row g-3">
						<div class="col-md-6">
							<div class="form-group">
								<label for="teks_berjalan_visibility" class="form-label">Visibilitas</label>
								<select name="teks_berjalan_visibility" id="teks_berjalan_visibility"
									class="form-select @error('teks_berjalan_visibility') is-invalid @enderror" required>
									<option value="1" @selected(old('teks_berjalan_visibility', $teksBerjalan['visibility']) == '1')>Tampilkan</option>
									<option value="0" @selected(old('teks_berjalan_visibility', $teksBerjalan['visibility']) == '0')>Sembunyikan</option>
								</select>
								@error('teks_berjalan_visibility')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="teks_berjalan_duration" class="form-label">Durasi satu putaran (milidetik)</label>
								<input value="{{ old('teks_berjalan_duration', $teksBerjalan['duration'] ?? '') }}" min="0"
									type="number" inputmode="numeric" name="teks_berjalan_duration" id="teks_berjalan_duration"
									class="form-control @error('teks_berjalan_duration') is-invalid @enderror" placeholder="Contoh: 20000"
									required>
								<small class="bk-hint">Makin besar angkanya, makin lambat teksnya bergerak.</small>
								@error('teks_berjalan_duration')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>

						<div class="col-12">
							<div class="form-group">
								<label for="teks_berjalan_items" class="form-label">Isi teks</label>
								{{-- Dulu kolom ini memakai kunci old() milik field durasi dan
								     menempelkan satu tanda kutip di belakang nilainya, lalu ada
								     skrip kecil yang membersihkan kutip itu saat halaman dimuat. --}}
								<textarea rows="4" name="teks_berjalan_items" id="teks_berjalan_items"
									class="form-control @error('teks_berjalan_items') is-invalid @enderror"
									placeholder="Kalimat pertama ### Kalimat kedua" required>{{ old('teks_berjalan_items', $teksBerjalan['items'] ?? '') }}</textarea>
								<small class="bk-hint">Pisahkan antarkalimat dengan tanda <code>###</code>.</small>
								@error('teks_berjalan_items')
									<small class="bk-field-error">{{ $message }}</small>
								@enderror
							</div>
						</div>
					</div>
				</fieldset>

				<div class="bk-form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection
