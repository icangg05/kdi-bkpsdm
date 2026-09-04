<title>{{ isset($title) ? $title . ' — Dashboard BKPSDM Kota Kendari' : 'Dashboard BKPSDM Kota Kendari' }}</title>

<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="Dashboard pengelolaan konten situs resmi BKPSDM Kota Kendari." />
<meta name="robots" content="noindex, nofollow" />

<link rel="icon" href="{{ asset('img/logo-kendari.png') }}" type="image/png" />

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap"
	id="main-font-link" />

{{-- Hanya Tabler yang dipakai. Phosphor, Font Awesome, Material, dan Feather
     dilepas: nol pemakaian di seluruh dashboard, ~276 KB CSS per halaman. --}}
<link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/bkpsdm.css') }}" />

<!-- [Tom Select] -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

<style>
	/* Penanda wajib diisi pada label di dalam .form-group. */
	.form-group:has(input[required]) > label::after,
	.form-group:has(textarea[required]) > label::after,
	.form-group:has(select[required]) > label::after {
		content: ' *';
		color: var(--bk-danger);
	}

	.video-wrapper {
		position: relative;
		width: 100%;
		padding-bottom: 56.25%;
		height: 0;
		overflow: hidden;
	}

	.video-wrapper iframe {
		position: absolute;
		inset: 0;
		width: 100%;
		height: 100%;
		border: 0;
	}
</style>

@stack('head')
