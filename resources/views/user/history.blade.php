@extends('template')

@section('content')
	<div class=''>
		<h2>История</h2>
	</div>
	<br>
	<table class='table table-striped table-condensed'>
		<tr>
			<th rowspan="2"></th>
			<th colspan="2">Количество посещений:</th>
		</tr>
		<tr>
			<th>текущая сессия</th>
			<th>всего</th>
		</tr>
		@foreach($pages as $key => $page)
			<tr id='page_{{ $key }}'>
				<td class="page_name"><a href="{{ $page['link'] }}">{{ $page['name'] }}</a></td>
				<td class="session"></td>
				<td class="all"></td>
			</tr>
		@endforeach
	</table>
	<script>
		history_update([
			@foreach($pages as $key => $page)
				{!! "'".$key."'".', ' !!}
			@endforeach
		]);
	</script>
@endsection