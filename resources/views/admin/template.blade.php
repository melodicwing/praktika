<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'Практика')</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/css/mystyle.css">
		<script src="/assets/js/jquery-2.1.4.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<a class="navbar-brand">Админка</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li {{ Request::is('/') ? ' class=active' : '' }}><a href="/">На основной сайт</a></li>
						<li {{ Request::is('about_me') ? ' class=active' : '' }}><a href="/about_me">Обо мне</a></li>
						<li><a href="#">Page 2</a></li>
						<li><a href="#">Page 3</a></li>
					</ul>

					@include('auth')
				</div>
			</nav>
		</div>
		<div class="container">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@yield('content')

		</div>
		<br>
		<br>
		<div class="container-fluid">
			@yield('footer', "<div class='panel-footer text-center'>© 2015 Лось Д.А.</div>")            
		</div>
	</body>
</html>
