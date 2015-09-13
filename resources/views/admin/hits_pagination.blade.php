@if ($hits->lastPage() > 1)
 
<ul class="pagination">
	<li><a href="{{ $hits->url( $hits->currentPage()+1 ) }}" class="item{{ ($hits->currentPage() == $hits->lastPage() ) ? ' disabled' : '' }}">«</a></li>
	@for ($i = $hits->lastPage(); $i > 0; $i--)
		@if ($hits->currentPage() == $i)
			<li class='active'><span>{{ $i }}</span></li>
		@else
			<li><a href="{{ $hits->url($i) }}">{{ $i }}</a></li>
		@endif
	@endfor
	<li><a href="{{ $hits->url($hits->currentPage()-1) }}" class="item{{ ($hits->currentPage() == $hits->lastPage()) ? ' disabled' : '' }}">»</a></li>
</ul>
 
@endif