@extends('template')

@section('content')
<br>
<p><a href='/study/test'>Тест</a></p>
<div>
	<table class="table table-striped table-condensed">
		<tr>
			<th colspan="9" class="center">ПЛАН УЧЕБНОГО ПРОЦЕССА</th>
		</tr>
		<tr>
			<th rowspan="2" class="center">№</th>
			<th rowspan="2" class="center">Дисциплина</th>
			<th rowspan="2" class="center">Кафедра</th>
			<th colspan="6" class="center">Часы</th>
		</tr>
		<tr>
			<th class="center">Всего</th>
			<th class="center">Ауд</th>
			<th class="center">Лк</th>
			<th class="center">Лб</th>
			<th class="center">Пр</th>
			<th class="center">СРС</th>
		</tr>
		<tr>
			<th class="center">1</th>
			<td class="left">Экология</td>
			<td class="center">БЖ</td>
			<td class="right">54</td>
			<td class="right">27</td>
			<td class="right">18</td>
			<td class="right">0</td>
			<td class="right">9</td>
			<td class="right">27</td>
		</tr>
		<tr>
			<th class="center">2</th>
			<td class="left">Высшая математика</td>
			<td class="center">ВМ</td>
			<td class="right">540</td>
			<td class="right">282</td>
			<td class="right">141</td>
			<td class="right">0</td>
			<td class="right">141</td>
			<td class="right">258</td>
		</tr>
		<tr>
			<th class="center">3</th>
			<td class="left">Русский язык и культура речи</td>
			<td class="center">НГиГ</td>
			<td class="right">108</td>
			<td class="right">54</td>
			<td class="right">18</td>
			<td class="right">0</td>
			<td class="right">36</td>
			<td class="right">54</td>
		</tr>
		<tr>
			<th class="center">4</th>
			<td class="left">Основы дискретной математики</td>
			<td class="center">ИС</td>
			<td class="right">216</td>
			<td class="right">139</td>
			<td class="right">87</td>
			<td class="right">0</td>
			<td class="right">52</td>
			<td class="right">77</td>
		</tr>
		<tr>
			<th class="center">5</th>
			<td class="left">Основы программирования и алгоритмические языки</td>
			<td class="center">ИС</td>
			<td class="right">405</td>
			<td class="right">210</td>
			<td class="right">105</td>
			<td class="right">87</td>
			<td class="right">18</td>
			<td class="right">195</td>
		</tr>
		<tr>
			<th class="center">6</th>
			<td class="left">Основы экологии</td>
			<td class="center">ПЭОП</td>
			<td class="right">54</td>
			<td class="right">27</td>
			<td class="right">18</td>
			<td class="right">0</td>
			<td class="right">9</td>
			<td class="right">27</td>
		</tr>
		<tr>
			<th class="center">7</th>
			<td class="left">Теория вероятностей и математическая статистика</td>
			<td class="center">ИС</td>
			<td class="right">162</td>
			<td class="right">72</td>
			<td class="right">54</td>
			<td class="right">18</td>
			<td class="right">0</td>
			<td class="right">90</td>
		</tr>
		<tr>
			<th class="center">8</th>
			<td class="left">Физика</td>
			<td class="center">Физики</td>
			<td class="right">324</td>
			<td class="right">194</td>
			<td class="right">106</td>
			<td class="right">88</td>
			<td class="right">0</td>
			<td class="right">130</td>
		</tr>
		<tr>
			<th class="center">9</th>
			<td class="left">Основы электротехники и электроники</td>
			<td class="center">ИС</td>
			<td class="right">108</td>
			<td class="right">72</td>
			<td class="right">36</td>
			<td class="right">18</td>
			<td class="right">18</td>
			<td class="right">36</td>
		</tr>
		<tr>
			<th class="center">10</th>
			<td class="left">Численные методы в информатике</td>
			<td class="center">ИС</td>
			<td class="right">189</td>
			<td class="right">89</td>
			<td class="right">36</td>
			<td class="right">36</td>
			<td class="right">17</td>
			<td class="right">100</td>
		</tr>
		<tr>
			<th class="center">11</th>
			<td class="left">Методы исследования операций</td>
			<td class="center">ИС</td>
			<td class="right">216</td>
			<td class="right">104</td>
			<td class="right">52</td>
			<td class="right">35</td>
			<td class="right">17</td>
			<td class="right">112</td>
		</tr>
	</table>
</div>
@endsection