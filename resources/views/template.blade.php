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
						<li {{ Request::is('/') ? ' class=active' : '' }}><a href="/">Главная</a></li>
						<li {{ Request::is('about_me') ? ' class=active' : '' }}><a href="/about_me">Обо мне</a></li>
						<li class="dropdown {{ Request::is('interests') ? 'active' : '' }}">
							<a href="/interests">Мои интересы<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/interests#hobby">Хобби</a></li>
								<li><a href="/interests#music">Музыка</a></li>
								<li><a href="/interests#movies">Фильмы</a></li>
								<li><a href="/interests#books">Книги</a></li>
								<li><a href="/interests#games">Игры</a></li>
							</ul>
						</li>
						<li><a href="/study">Учеба</a></li>
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
<script>
	initTime();
</script>