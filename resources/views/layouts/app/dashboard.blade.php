<!DOCTYPE html>
<html lang="id">

<head>
	@include('layouts.app.partials.head')
</head>

<body data-pc-theme="light" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr">
	<a href="#konten" class="bk-skip">Lompat ke konten</a>

	@include('layouts.app.partials.sidebar')
	@include('layouts.app.partials.header')

	<div class="pc-container">
		<main class="pc-content" id="konten">
			@yield('content')
		</main>
	</div>

	@include('layouts.app.partials.footer')
	@stack('footer')
</body>

</html>
