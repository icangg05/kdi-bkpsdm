
<!DOCTYPE html>
<html lang="en">

<head>
	@include('layouts.auth.partials.head')
</head>

<body>
	@include('layouts.auth.partials.loader')

	<div class="auth-main">
		@yield('content')
	</div>

	@include('layouts.auth.partials.footer')
</body>

</html>
