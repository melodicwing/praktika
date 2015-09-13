@extends('template')

@section('content')
	<div class=''>
		<h2>Блог</h2>
	</div>
	@if ( isset($posts) and $posts )
		@include('user/show_posts')
	@endif
@endsection