<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- Inline script to detect system dark mode preference and apply it immediately --}}
	<script>
		(function() {
			const appearance = '{{ $appearance ?? 'system' }}';

			if (appearance === 'system') {
				const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

				if (prefersDark) {
					document.documentElement.classList.add('dark');
				}
			}
		})();
	</script>

	<title inertia>{{ config('app.name', 'Laravel') }}</title>

	<link rel="icon" href="{{ asset('img/logo-kendari.png') }}" type="image/x-icon" />

	{{-- Font dimuat lewat <link> + preconnect, bukan @import di dalam CSS,
	     agar unduhannya tidak menunggu stylesheet selesai diparsing. --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap">

	@routes
	@vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
	@inertiaHead
</head>

<body class="font-sans antialiased">
	@inertia
</body>

</html>
