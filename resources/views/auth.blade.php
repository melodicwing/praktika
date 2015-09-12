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

           	        <label for='input_register_name'>Имя</label>
                	<input type="text" class='form-control' id='input_register_name' name="name" value="{{ old('name') }}">

                	<label for='input_register_email'>Email</label>
                	<input type="email" class='form-control' id='input_register_email' name="email" value="{{ old('email') }}">

                	<label for='input_register_password'>Пароль</label>
                	<input type="password" class='form-control' id='input_register_password' name="password">

                	<label for='input_register_password_confirmation'>Повторите пароль</label>
                	<input type="password" class='form-control' id='input_register_password_confirmation' name="password_confirmation">
                </form>
            </div>
            <div class="modal-footer">
                <button form='form_register' type="submit" class="btn btn-success" data-dismiss="modal" value='Submit'>Зарегистрироваться</button>
                <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

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
                <button form='form_login' type="submit" class="btn btn-success" data-dismiss="modal" value='Submit'>Войти</button>
                <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
