<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		@include('layouts.partials.head')
	</head>
	<body>
		<div id="app">
			@include('layouts.partials.header')

			@include('layouts.partials.nav')

			<main class="py-4 container">
				@yield('content')
			</main>

			@include('layouts.partials.footer')
		</div>

		@include('layouts.partials.footer-scripts')
	</body>
</html>