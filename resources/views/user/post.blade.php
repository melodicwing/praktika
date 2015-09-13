@extends('template')

@section('content')
	<div class='row center-block'>
		<div class='col-xs-12 text-center'>
			<h2>{{ $post[0]->title }}</h2>
			<p>{{ $post[0]->dateTime }}</p>
			<p>{{ $post[0]->text }}</p>
			@if($post[0]->path_to_img)
				<p>
					<a class='fancybox' data-fancybox-group='group1' href='/{{ $post[0]->path_to_img }}'>
						<img src='/{{ $post[0]->path_to_img }}' style='width:100%'>
					</a>
				</p>
			@endif
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$(".fancybox").fancybox({
				closeClick: true,
				mouseWheel: true,
				arrows: true
			});
		});
	</script>
@endsection