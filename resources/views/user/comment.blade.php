<div class='row'>
	<div class='center-block' style='width:50%'>
			<form>
				{{ csrf_field() }}
				<br>
				<div class='form-group'>
					<label for='text'>Введите коментарий:</label>
					<textarea class='form-control' rows='4' name="text" id="textarea_comment_text"></textarea>
				</div>
				<div class='text-center'>
					<button type='button' class="btn btn-success" id='button_comment_send'>Отправить</button>
					<button type="reset" class="btn btn-danger" value='Submit'>Не отправить</button>
				</div>
			</form>
	</div>
</div>
<?php
	$encrypter = app('Illuminate\Encryption\Encrypter');
	$encrypted_token = $encrypter->encrypt(csrf_token());
?>
<input class="token" type="hidden" value="{{$encrypted_token}}">
<script>
	$('#button_comment_send').click(function(){
		$_token = $('.token').val();
		$.ajax({
			type: 'post',
			cache: false,
			headers: { 'X-XSRF-TOKEN' : $_token }, 
			url: '/post/{{ $post[0]->id }}/comment/add',
			data: { text: $('#textarea_comment_text').val() },
			success: function(data) {
				$('#textarea_comment_text').val('');
				console.log('comment ajax success');
				data = $.parseJSON(data);
				console.log(data['user']);
				console.log(data['dateTime']);
				console.log(data['text']);
				var user = $('<h4>').text(data['user']);
				var dateTime = $('<h6>').text(data['dateTime']);
				var text = $('<p>').text(data['text']);
				var div = $('<div>')
					.attr('class','center-block')
					.css('width', '30%')
					.append(user)
					.append(dateTime)
					.append(text)
					.append($('<br>'));
				$('#div_comments').append(div).css('display', 'block');
			}
		});
	});
</script>

@if( isset($comments) && $comments )
	<div id='div_comments' class='row' style='display:block;'>
		@foreach($comments as $row)
			<div class='center-block' style='width:30%'>
				<h4>{{ $row['user'] }}</h4>
				<h6>{{ $row['dateTime'] }}</h6>
				<p>{{ $row['text'] }}</p>
			</div>
			<br>
		@endforeach
	</div>
@else
	<div id='div_comments' class='row' style='display:none'>
	</div>
@endif
