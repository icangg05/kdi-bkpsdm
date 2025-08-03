<!DOCTYPE html>
<html lang="en">

<head>
	@include('layouts.app.partials.head')
</head>

<body>
	@include('layouts.app.partials.loader')
	@include('layouts.app.partials.sidebar')
	@include('layouts.app.partials.header')

	<div class="pc-container">
		<div class="pc-content">
			@yield('content')
		</div>
	</div>

	@include('layouts.app.partials.footer')
	@stack('footer')
</body>

</html>
