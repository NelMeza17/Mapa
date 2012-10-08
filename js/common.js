$(document).ready(function(){
	
	$('#content').on('click', 'a.close', function(e){
		e.preventDefault();
		$(this).parent().fadeTo(500, 0).slideUp();
	});
	
});
