@extends('admin/template')

@section('content')
	<h3>Статистика посещений</h3>
	<div>
		<table class='table table-striped table-condensed'>
			<tr>
				<th>IP</th>
				<th>hostname</th>
				<th>URL</th>
				<th>Когда</th>
				<th>Браузер</th>
			</tr>
		@foreach ($hits as $hit)
			<tr>
				<td>{{ $hit->IP }}</td>
				<td>{{ $hit->hostname }}</td>
				<td><a href='{{ $hit->url }}'>{{ $hit->url }}</a></td>
				<td>{{ $hit->dateTime }}</td>
				<td>{{ $hit->browser }}</td>
			</tr>
		@endforeach
		</table>
	</div>
	{!! $hits->render() !!}
@endsection