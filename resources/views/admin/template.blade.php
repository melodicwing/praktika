<!DOCTYPE html>
<html>
	<head>
		@include('head')
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-inverse">
				<div>
					<ul class="nav navbar-nav">
						<li {{ Request::is('/') ? ' class=active' : '' }}><a href="/">На основной сайт</a></li>
						<li {{ Request::is('admin/hits') ? ' class=active' : '' }}><a href="/admin/hits">Статистика посещений</a></li>
						<li {{ Request::is('admin/guestbook') ? ' class=active' : '' }}><a href="/admin/guestbook">Гостевая книга</a></li>
						<li {{ Request::is('admin/blog') ? ' class=active' : '' }}><a href="/admin/blog">Блог</a></li>
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
		@yield('footer', "
			<footer class='footer'>
				<div class='container-fluid'>
					<p class='text-center'>© 2015 Лось Д.А.</p>
				</div>
			</footer>
		")
	</body>
</html>
<script>
	initTime();
</script>