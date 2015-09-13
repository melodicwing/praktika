<br>
<div class='row center-block'>
	<?php $i = 1; ?>
	@foreach ($guestbook_messages as $row)
		@if ( ( ($i-1) % 3 ) == 0 )
</div>
<div class="row center-block">
		@endif
		<div class="col-xs-4">
			<h3>{{ $row->fio }}</h3>
			<p><small>{{ $row->dateTime }}</small></p>
			<p>{{ $row->text }}</p>
		</div>
		<?php $i++ ?>
	@endforeach
</div>