@extends('template')

@section('content')
	<div class="row">
		@for ($i = 1; $i <= 15; $i++)
			@if ( ( ($i-1) % 5 ) == 0 )
	</div>
	<div class="row">
			@endif
			<div class="col-xs-5ths">
				<!-- <span>This is column {{ $i }}</span> -->
				<?php $file_extension = ( $i == 12 ) ? ".gif" : ".jpg" ?>
				<a class='fancybox' data-fancybox-group='group1' href='/assets/img/photos/{{$i}}{{$file_extension}}'>
					<img style='width:100%' src='/assets/img/photos/{{$i}}{{$file_extension}}'>
				</a>
			</div>
		@endfor
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
				closeClick: true,
				mouseWheel: true,
				arrows: true
			});
		});
	</script>
@endsection