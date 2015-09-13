<br>
<div class='row center-block'>
	<?php $i = 1; ?>
	@foreach ($posts as $row)
		@if ( ( ($i-1) % 3 ) == 0 )
</div>
<div class="row center-block">
		@endif
		<div class="col-xs-4">
			<h3>{{ $row->title }}</h3>
			<p><small>{{ $row->dateTime }}</small></p>
			@if($row->path_to_img)
				<p>
					<a class='fancybox' data-fancybox-group='group1' href='/{{ $row->path_to_img }}'>
						<img src='/{{ $row->path_to_img }}' style='width:100%'>
					</a>
				</p>
			@endif
			<p>{{ $row->text }}</p>
		</div>
		<?php $i++ ?>
	@endforeach
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