@extends('template')

@section('content')
	<div class='row center-block'>
		<div class='col-xs-12 text-center'>
			<h2>Лось Дмитрий Александрович</h2>
			<p>Сайт для отчета по практике</p>
			<img title='это я' alt='тут мое фото' src='{{ asset('/assets/img/my_photo.jpg') }}'>
		</div>
	</div>
@endsection