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
	
	
	$('.tabla').on('click', 'td.eliminar', function(){
		if(window.confirm('Esta seguro que desea eliminar esta tienda?'))
		{
			
			window.alert('El id de la tienda ' + $(this).attr("rel"));
		}		
	});
	
	
	$('#table_tienda').on('click', 'td.editar', function(){
		if(window.confirm('Esta seguro que desea editar esta tienda?'))
		{
			
			window.alert('El id de la tienda ' + $(this).attr("rel"));
		}		
	});


	$('#comentarios').on('change', 'select', function(e){
		e.preventDefault();		
		$.ajax({
			type: 'post',
			dataType: 'html',
			url: ruta+'load/list_productos.php',
			data: {'id':$(this).val()},
			beforeSend: function(){},
			error: function(){},
			success: function (data){
				$('#productos_ajax').css('background-color','#3B5997');
				$('#productos_ajax').css('border','1px solid');
			    $('#productos_ajax').css('opacity','.9');
				$('#productos_ajax').css('border-radius','10px');
				$('#productos_ajax').html(data);
			}
		});	
	});
	
});
