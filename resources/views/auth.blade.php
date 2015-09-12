@if (Auth::check())	
	<ul class="nav navbar-nav navbar-right">
		<li class='active'><a>{{ Auth::user()->name }}</a></li>
		@if ( Auth::user()->name == 'admin' )
			<li><a href='/admin'><button class="btn btn-xs btn-warning">админка</button></a></li>
		@endif
		<li><a href='/auth/logout'><button class="btn btn-xs btn-info">logout</button></a></li>
		&nbsp
		&nbsp
		&nbsp
	</ul>
@else
	<ul class="nav navbar-nav navbar-right">
		<li><a href='' data-toggle='modal' data-target='#modalRegister'><span class="glyphicon glyphicon-user"></span> Зарегистрироваться</a></li>
		<li><a href='' data-toggle='modal' data-target='#modalLogin'><span class="glyphicon glyphicon-log-in"></span> Войти&nbsp&nbsp</a></li>
	</ul>

	<!-- Modal -->
	<div class="modal fade" id="modalRegister" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Зарегистрироваться</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="/auth/register" id='form_register'>
						{!! csrf_field() !!}

						<div class='form-group' id='div_register_name'>
							<label for='input_register_name'>Имя</label>
							<input type="text" class='form-control' id='input_register_name' name="name" value="{{ old('name') }}">
						</div>
						
						<div>
							<label for='input_register_email'>Email</label>
							<input type="email" class='form-control' id='input_register_email' name="email" value="{{ old('email') }}">
						</div>

						<div>
							<label for='input_register_password'>Пароль</label>
							<input type="password" class='form-control' id='input_register_password' name="password">
						</div>

						<div>
							<label for='input_register_password_confirmation'>Повторите пароль</label>
							<input type="password" class='form-control' id='input_register_password_confirmation' name="password_confirmation">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button form='form_register' type="submit" class="btn btn-success" value='Submit'>Зарегистрироваться</button>
					<button type="button" class="btn" data-dismiss="modal">Закрыть</button>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" id="_token" value="{{ csrf_token() }}">
	<?php
		$encrypter = app('Illuminate\Encryption\Encrypter');
		$encrypted_token = $encrypter->encrypt(csrf_token());
	?>
	<input id="token" type="hidden" value="{{$encrypted_token}}">
	<script>
		$('#input_register_name').blur(function(){
			// $.post('/ajax/check_login', { login: $('#input_register_name').val() }, function(data){
			// 	alert(data);
			// });
			$_token = $('#token').val();
			$.ajax({
				type: 'post',
				cache: false,
				headers: { 'X-XSRF-TOKEN' : $_token }, 
				url: '/ajax/check_login',
				data: { login: $('#input_register_name').val() },
				success: function(data) {
					switch (data) {
						case 'unique':
							var glyph = $('<span>').addClass('glyphicon glyphicon-ok form-control-feedback');
							$('#div_register_name').removeClass('has-error').addClass('has-feedback has-success').find('span').remove();
							$('#div_register_name').append(glyph);
							break;
						case 'duplicate':
							var glyph = $('<span>').addClass('glyphicon glyphicon-remove form-control-feedback');
							$('#div_register_name').removeClass('has-success').addClass('has-feedback has-error').find('span').remove();
							$('#div_register_name').append(glyph);
							break;
					}
				}
			});
		});
	</script>

	<!-- Modal -->
	<div class="modal fade" id="modalLogin" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Войти</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="/auth/login" id='form_login'>
						{!! csrf_field() !!}
						
						<label for='input_login_email'>Email</label>
						<input type="email" class='form-control' id='input_login_email' name="email" value="{{ old('email') }}">

						<label for='input_login_password'>Пароль</label>
						<input type="password" class='form-control' id='input_login_password' name="password">

						<input type="checkbox" name="remember"> Запомнить меня
					</form>
				</div>
				<div class="modal-footer">
					<button form='form_login' type="submit" class="btn btn-success" value='Submit'>Войти</button>
					<button type="button" class="btn" data-dismiss="modal">Закрыть</button>
				</div>
			</div>
		</div>
	</div>
@endif
