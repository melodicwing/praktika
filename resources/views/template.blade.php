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
						<li {{ Request::is('study') ? ' class=active' : '' }}><a href="/study">Учеба</a></li>
						<li {{ Request::is('gallery') ? ' class=active' : '' }}><a href="/gallery">Фотоальбом</a></li>
						<li {{ Request::is('feedback') ? ' class=active' : '' }}><a href="/feedback">Обратная связь</a></li>
						<li {{ Request::is('history') ? ' class=active' : '' }}><a href="/history">История</a></li>
						<li {{ Request::is('guestbook') ? ' class=active' : '' }}><a href="/guestbook">Гостевая книга</a></li>
						<li {{ Request::is('blog') ? ' class=active' : '' }}><a href="/blog">Блог</a></li>
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
	init_all();
</script>