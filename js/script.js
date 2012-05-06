(function($){

	/**
	 * Document ready event
	 */
	$(function(){
		// set active search input
		$('#search').focus();

		// set active language
		var current_language = $.cookie('lang') || 'EN';
		$('.change_language[data-lang="'+ current_language +'"]').addClass('change_language_active');
	});

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

	/**
	 * Submit form on every keyup
	 */
	$('form#search_form').keyup(function(){
		$(this).submit();
	});

	/**
	 * Validate input (allowed only digits and spaces)
	 */
	$('#search').keyup(function(){
		if (/([^\d ]+)/.test($(this).val())) {
			$(this).parent().addClass('error');
		} else {
			$(this).parent().removeClass('error');
		}
	});

	/**
	 * Num-keyboard click handler
	 */
	$('.keyboard button').not('.del').click(function(){
		var num = $(this).find('.num').text();
		if (num >= '0' && num <= '9') {
			$('#search').val($('#search').val() + num);
			$('form#search_form').submit();
		}
		$('#search').focus();
	});

	/**
	 * Backspace button handler
	 */
	$('.keyboard button.del').click(function(){
		$('#search').val($('#search').val().substring(0, $('#search').val().length-1));
		$('form#search_form').submit();
		$('#search').focus();
	});

	/**
	 * Change language handler
	 */
	$('.change_language').click(function(){
		$.cookie('lang', $(this).data('lang'), { expires: 7, path: '/' });

		location.reload();

		return false;
	});

})(jQuery);