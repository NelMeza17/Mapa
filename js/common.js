$(document).ready(function(){
	var ruta = "http://localhost/Mapa/";
	$('#content').on('click', 'a.close', function(e){
		e.preventDefault();
		$(this).parent().fadeTo(500, 0).slideUp();
	});
	
	
	$('#map_canvas').on('click', 'a', function(e){
		e.preventDefault();
		
		$.ajax({
			type: 'post',
			dataType: 'html',
			url: ruta+'load/consultaproductos.php',
			data: {'id':$(this).attr("rel")},
			beforeSend: function(){},
			error: function(){},
			success: function (data){
				$('#content_ajax').css('background-color','#3B5997');
				$('#content_ajax').css('border','1px solid');
				$('#content_ajax').css('opacity','.9');
				$('#content_ajax').css('border-radius','10px');
				$('#content_ajax').html(data);
			}
		});
	});

	
});
