@extends('template')

@section('content')
	<br>
	@if ( isset($result) )
		@if ( $result == 'Тест не пройден' )
			<div class='alert alert-danger'>
		@elseif ( $result == 'Тест пройден' )
			<div class='alert alert-success'>
		@endif
			{{ $result }}
			</div>
	@endif
	<a href='/study/test'>Вернуться к тесту</a>
	@if ( isset($from_model) )
		<pre><?php var_dump($from_model) ?></pre>
	@endif
@endsection