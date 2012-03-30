jQuery(document).ready(function($){

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
	})
	
	$('#search').focus();
	
    $("#search").keydown(function(event) {
        // Allow: backspace, delete, tab and escape
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
	
});