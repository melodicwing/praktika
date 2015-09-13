@extends('admin/template')

@section('content')
	<div class=''>
		<h2>Блог</h2>
	</div>
	<form name="form" method="POST" action="/admin/blog" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class='row center-block'>
			<br>
			<div class='col-xs-4 form-group'>
				<p>Заголовок</p>
				<input class='form-control' name="title" type="text" id="input_title">
			</div>
			<div class='col-xs-4 form-group'>
				<p>Сообщение</p>
				<textarea class='form-control' name="text" id="textarea_text"></textarea>
			</div>
			<div class='col-xs-4 form-group'>
				<input type="file" title="Выберите изображение" class="btn-primary" name='img'>
				<br>
				<br>
				<button type="submit" class="btn btn-success" value='Submit'>Отправить</button>
			</div>
		</div>
	</form>
	<script>
		$(document).ready(function(){
			$('input[type=file]').bootstrapFileInput();
		});
	</script>
	@if ( isset($posts) and $posts )
		@include('admin/show_posts')
	@endif
@endsection