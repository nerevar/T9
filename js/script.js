jQuery(document).ready(function($){

	// form submit handler
	$('form#search').submit(function(){
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

	$('form#search').keyup(function(){
		$(this).submit();
	})
});