@extends('admin/template')

@section('content')
	<div class=''>
		<h2>Гостевая книга</h2>
	</div>
	<form name="form" method="POST" action="/admin/guestbook" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class='row center-block'>
			<div class='col-xs-3'>
			</div>
			<div class='col-sm-4'>
				<br>
				<div class='form-group'>
					<input type="file" title="Выберите файл" class="btn-primary" name='guestbook'>
				</div>
			</div>
			<div class='col-sm-2'>
				<br>
				<div class='form-group'>
					<button type="submit" class="btn btn-success" value='Submit'>Отправить</button>
				</div>
			</div>
		</div>
	</form>
	<script>
		$(document).ready(function(){
			$('input[type=file]').bootstrapFileInput();
		});
	</script>
	@if ( isset($guestbook_messages) and $guestbook_messages )
		@include('admin/show_guestbook_messages')
	@endif
@endsection