<br>
<div class='row center-block'>
	<?php $i = 1; ?>
	@foreach ($posts as $row)
		@if ( ( ($i-1) % 3 ) == 0 )
</div>
<div class="row center-block">
		@endif
		<div class="col-xs-4" id='div_post_{{ $row->id }}'>
			<div>
				<a href='/admin/post/{{ $row->id }}'>
					<h3>{{ $row->title }}</h3>
				</a>
				&nbsp
				<a class='link link_edit' style='cursor:pointer' data-toggle='modal' data-target='#modalEdit' id='link_edit_{{ $row->id }}'>
					Редактировать <span class="glyphicon glyphicon-pencil"></span>
				</a>
			</div>
			<p>
				<small>{{ $row->dateTime }}</small>
			</p>
			@if($row->path_to_img)
				<p>
					<a class='fancybox' data-fancybox-group='group1' href='/{{ $row->path_to_img }}'>
						<img src='/{{ $row->path_to_img }}' style='width:100%'>
					</a>
				</p>
			@endif
			<p id='p_post_{{ $row->id }}'>{{ $row->text }}</p>
		</div>
		<?php $i++ ?>
	@endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdit" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Редактировать пост</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="/admin/post/edit" id='form_edit'>
					{!! csrf_field() !!}
					<input type='hidden' value='' id='modal_post_id'>
					<div class='form-group' id='div_edit_text'>
						<textarea class='form-control' name="text" id="textarea_edit_text"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id='btn_edit_submit' type="submit" class="btn btn-success" data-dismiss="modal" value='Submit'>Изменить</button>
				<button type="button" class="btn" data-dismiss="modal">Закрыть</button>
			</div>
		</div>
	</div>
</div>
<?php
	$encrypter = app('Illuminate\Encryption\Encrypter');
	$encrypted_token = $encrypter->encrypt(csrf_token());
?>
<input class="token" type="hidden" value="{{$encrypted_token}}">
<script>
	$(document).ready(function() {
		$(".fancybox").fancybox({
			closeClick: true,
			mouseWheel: true,
			arrows: true
		});
		
		var edit_post_id;
		$('.link_edit').click(function(e){
			edit_post_id = $(this).attr('id').replace(/link_edit_/,'');
			var text = $('#p_post_'+edit_post_id).text();
			$('#textarea_edit_text').val(text);
		});

		$('#btn_edit_submit').click(function(){
			$_token = $('.token').val();
			$.ajax({
				type: 'post',
				cache: false,
				headers: { 'X-XSRF-TOKEN' : $_token }, 
				url: '/admin/post/'+edit_post_id+'/edit',
				data: { text: $('#textarea_edit_text').val() },
				success: function(data) {
					//alert(data);
					$('#p_post_'+edit_post_id).text(data);
				}
			});
		});
	});
</script>