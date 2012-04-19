jQuery(document).ready(function($){

	$('#search').focus();

	// form submit handler
	$('form#search_form').submit(function(){
		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'html',
			success: function(data) {
				$('#results').html(data);
			}
		});
		return false;
	});

	$('form#search_form').keyup(function(){
		$(this).submit();
	});

	$('#search').keyup(function(){
		if (/([^\d]+)/.test($(this).val())) {
			$(this).parent().addClass('error');
		} else {
			$(this).parent().removeClass('error');
		}
	})

	$('.keyboard button').not('.del').click(function(){
		var num = $(this).find('.num').text();
		if (num >= '0' && num <= '9') {
			$('#search').val($('#search').val() + num);
			$('form#search_form').submit();
		}
		$('#search').focus();
	})

	$('.keyboard button.del').click(function(){
		$('#search').val($('#search').val().substring(0, $('#search').val().length-1));
		$('form#search_form').submit();
		$('#search').focus();
	})
});