@extends('template')

@section('content')
	<div class=''>
		<h2>Гостевая книга</h2>
	</div>
	<form name="form" method="POST" action="/guestbook">
		{!! csrf_field() !!}
		<div class='row center-block'>
			<div class='col-xs-1'>
			</div>
			<div class='col-sm-5'>
				<br>
				<div class='form-group'>
					<p>ФИО</p>
					<input class='form-control' name="fio" type='textarea' id="input_fio">
				</div>
				<div class='form-group'>
					<p>E-mail</p>
					<input class='form-control' name="email" type='textarea' id="input_email">
				</div>
			</div>
			<div class='col-sm-5'>
				<br>
				<div class='form-group'>
					<p>Текст отзыва</p>
					<textarea class='form-control' rows='4' name="text" id="textarea_text"></textarea>
				</div>
			</div>
		</div>
		<div class='row center-block'>
			<div class='col-xs-12 text-center'>
				<button type="submit" class="btn btn-success" value='Submit'>Отправить</button>
				<button type="reset" class="btn btn-danger" value='Submit'>Не отправить</button>
			</div>
		</div>
	</form>
@endsection