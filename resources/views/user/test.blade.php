@extends('template')

@section('content')
<div class='text-center'>
	<h1>
		Основы программирования и алгоритмические языки
	</h1>
</div>
<br>
<form role="form" method="POST" action="mailto:sample_text@mlg.com" onsubmit="return validate_test()">
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
			<input name="submit" type="submit" value='Поехали'>
			<input name="reset" type="reset" value='Ухади'>
		</div>
	</div>	
</form>
@endsection