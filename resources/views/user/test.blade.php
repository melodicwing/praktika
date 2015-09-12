@extends('template')

@section('content')
	<div class='text-center'>
		<h1>
			Основы программирования и алгоритмические языки
		</h1>
	</div>
	<br>
	<form role="form" name='form' method="POST" action="/study/test/result" onsubmit="return validate_test()">
		{!! csrf_field() !!}
		<div class='row center-block'>
			<div class='col-xs-4 form-group'>
				<p>Вопрос 1: Выберите оператор ветвления</p>
				<select class='form-control' name="question_1" id="q1">
					<option value=0></option>
					<option value=1> begin</option>
					<option value=2> writeln</option>
					<option value=3> if</option>
					<option value=4> for</option>
				</select>
			</div>
			<div class='col-xs-4 form-group'>
				<p>Вопрос 2: ФИО лектора</p>
				<input class='form-control' name="question_2" type="textarea" id="q2">
			</div>
			<div class='col-xs-4 form-group'>
				<p>Вопрос 3: В чем смысл жизни?</p>
				<div class='radio'>
					<label><input name="question_3" type="radio" value=1> деньги ради денег</label>
				</div>
				<div class='radio'>
					<label><input name="question_3" type="radio" value=2> в удовольствиях</label>
				</div>
				<div class='radio'>
					<label><input name="question_3" type="radio" value=3> смысла нет</label>
				</div>
			</div>
		</div>
		<div class='row center-block'>
			<div class='col-xs-12 text-center'>
				<button type="submit" class="btn btn-success" value='Submit'>Поехали</button>
				<button type="reset" class="btn btn-danger" value='Submit'>Ухади</button>
			</div>
		</div>	
	</form>
	@if ( !empty($results) )
		<br>
		<div class='text-center'>
			<h3>
				Результаты теста
			</h3>
		</div>
		<br>
		<table class='table table-striped table-condensed'>
			<tr>
				<th>Пользователь</th>
				<th>Когда</th>
				<th>Первый вопрос</th>
				<th>Второй вопрос</th>
				<th>Третий вопрос</th>
				<th>Результат теста</th>
			</tr>
			@foreach ($results as $row)
				<tr>
					@foreach ($row as $key => $value)
					<td>
					<?php
						switch ($key) {
							case 'user': case 'when':
								echo $value;
								break;
							case 'q1': case 'q2': case 'q3':
								echo $value ? '<span class="text-success">Верно</span>' : '<span class="text-danger">Не верно</span>';
								break;
							case 'result':
								echo $value ? '<span class="text-success">Пройдено</span>' : '<span class="text-danger">Не пройдено</span>';
								break;
						}
					?>
					</td>
					@endforeach
				</tr>
			@endforeach
		</table>
	@endif
@endsection