function coordenadas(){

}

function localizame() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(coordenadas, errores);
    }else{
        alert('Oops! Tu navegador no soporta geolocalización. Bájate Chrome, que es gratis!');
        map_canvas.style.backgroundImage="url('http://localhost/Mapa/images/error_explorer.jpg')";
        map_canvas.style.height = "659px";
        map_canvas.style.width = "895px";
    }
}

function errores(err) {
    if (err.code == 0) {
      alert("Oops! Algo ha salido mal");
    }
    if (err.code == 1) {
      alert("Oops! No has aceptado compartir tu posición");
    }
    if (err.code == 2) {
      alert("Oops! No se puede obtener la posición actual");
    }
    if (err.code == 3) {
      alert("Oops! Hemos superado el tiempo de espera");
    }
}

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
	
	
	$('#table_tienda').on('click', 'td.eliminar_tienda', function(){
		if(window.confirm('Esta seguro que desea eliminar esta tienda?\n'+
		'Tome en cuenta que al eliminar una tienda '+
		'desapareceran todos su productos')){
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/elimina_tienda.php',
				data: {'id':$(this).attr("rel")},
				beforeSend: function(){},
				error: function(){},
				success: function (data){
					window.location=ruta+'user/maneja_tienda.php';
					window.alert(data);
				}
			});
		}		
	});
	
	
	$('#table_tienda').on('click', 'td.editar_tienda', function(){
		if(window.confirm('Esta seguro que desea editar esta tienda?'))
		{
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/edita_tienda.php',
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
	
	$('#comentarios').on('click', '#add_producto', function(e){
		e.preventDefault();		
		$.ajax({
			type: 'post',
			dataType: 'html',
			url: ruta+'load/add_productos.php',
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
	
	$('#content_ajax').on('click', '#close_ajax', function(){
		//$(this).parent().fadeTo(500, 0).slideUp();
		$(this).parent().css('background','none');
		$('#content_ajax').css('border','none');
		$(this).parent().html("");
	});
	
});
