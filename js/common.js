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
	
	function execute_ajax(url, datos, contenedor){
		$.ajax({
			type: 'post',
			dataType: 'html',
			url: url,
			data: {'id': datos},
			beforeSend: function(){},
			error: function(){},
			success: function (data){
				$(contenedor).css('background-color','#3B5997');
				$(contenedor).css('border','1px solid');
			    $(contenedor).css('opacity','.9');
				$(contenedor).css('border-radius','10px');
				$(contenedor).html(data);
			}
		});	
	}
	
	$('#content').on('click', 'a.close', function(e){
		e.preventDefault();
		$(this).parent().fadeTo(500, 0).slideUp();
	});
	
	$('#map_canvas').on('click', 'a', function(e){
		e.preventDefault();
		url = ruta+'load/consultaproductos.php';
		datos = $(this).attr("rel");
		contenedor = '#content_ajax';
		execute_ajax(url, datos, contenedor);
	});
	
	$('#table_tienda').on('click', 'td.eliminar_tienda', function(){
		if(window.confirm('Esta seguro que desea eliminar esta tienda?\n'+
		'Tome en cuenta que al eliminar una tienda '+
		'desapareceran todos su productos')){
			// url = ruta+'load/elimina_tienda.php';
			// datos = $(this).attr("rel");
			// contenedor			$(this).parent().fadeTo(500, 0).slideUp();
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/elimina_tienda.php',
				data: {'id':$(this).attr("rel")},
				beforeSend: function(){},
				error: function(){},
				success: function (data){
					window.alert(data);
				}
			});
		}		
	});
	
	$('#table_tienda').on('click', 'td.editar_tienda', function(){
		if(window.confirm('Esta seguro que desea editar esta tienda?'))
		{
			url = ruta+'load/edita_tienda.php';
			datos = $(this).attr("rel");
			contenedor = '#content_ajax';
			execute_ajax(url, datos, contenedor);
		}		
	});

	$('#comentarios').on('change', 'select', function(e){
		e.preventDefault();
		url = ruta+'load/list_productos.php';
		datos = $(this).val();
		contenedor = '#productos_ajax';
		execute_ajax(url, datos, contenedor);		
	});
	
	$('#comentarios').on('click', '#add_producto', function(e){
		e.preventDefault();	
		url = ruta+'load/add_productos.php';
		id = $(this).attr("rel");
		contenedor = '#content_ajax';	
		execute_ajax(url, id, contenedor);
	});
	
	$('#comentarios').on('click', 'td.editar_producto', function(e){
		if(window.confirm('Esta seguro que desea editar este producto?'))
		{	
			e.preventDefault();	
			url = ruta+'load/edit_productos.php';
			id = $(this).attr("rel");
			contenedor = '#content_ajax';	
			execute_ajax(url, id, contenedor);
		}
	});
	
	$('#comentarios').on('click', 'td.eliminar_producto', function(e){
		if(window.confirm('Esta seguro que desea eliminar este producto?'))
		{	
			e.preventDefault();	
			url = ruta+'load/delete_producto.php';
			id = $(this).attr("rel");
			contenedor = '#productos_ajax';	
			execute_ajax(url, id, contenedor);
			window.alert('Producto eliminado con exito!!');
		}
	});
	
	$('#content_ajax').on('click', '#close_ajax', function(){
		$(this).parent().css('background','none');
		$('#content_ajax').css('border','none');
		$(this).parent().html("");
	});
	
	$('#comentarios').on('click', '#close_ajax', function(){
		$('#productos_ajax').css('background','none');
		$('#productos_ajax').css('border','none');
		$('#productos_ajax').html("");
	});
	
	//definimos las opciones del plugin AJAX FORM
    //asignamos el plugin ajaxForm al formulario myForm y le pasamos las opciones
    $('#izquierda').on('click','#btn_add_producto',function(){
		var opciones= {
		   clearForm: true,
	       beforeSubmit: mostrarLoader, //funcion que se ejecuta antes de enviar el form
	       error: mostrarError,
	       success: mostrarRespuesta, //funcion que se ejecuta una vez enviado el formulario
	    };
		$('#form_add_producto').ajaxForm(opciones);
    });
     function mostrarLoader(){
     	$("#loader_gif").fadeIn("slow");
     };
     function mostrarError(){
     	alert('Error inesperado');
     }
     function mostrarRespuesta (responseText){
		$("#loader_gif").fadeOut("slow");
		id = responseText;
		window.alert('Producto agregado con exito!!');
		// $('#content_ajax').css('background','none');
		// $('#content_ajax').css('border','none');
		// $('#content_ajax').html("");
		url = ruta+'load/list_productos.php';
		contenedor = '#productos_ajax';
		execute_ajax(url,id, contenedor);
     };
     
     $('#comentarios').on('click', 'td.eliminar_comentario', function(){
		if(window.confirm('Esta seguro que desea eliminar este Comentario?')){
			$(this).parent().fadeTo(500, 0).slideUp();
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/elimina_comentario.php',
				data: {'id':$(this).attr("rel")},
				beforeSend: function(){},
				error: function(){},
				success: function (data){
					window.alert(data);
				}
			});
		}		
	});
	
	$('#comentarios').on('click', 'td.eliminar_tienda_admin', function(){
		if(window.confirm('Esta seguro que desea eliminar esta tienda?\n'+
		'Tome en cuenta que al eliminar una tienda '+
		'desapareceran todos su productos')){
			$(this).parent().fadeTo(500, 0).slideUp();
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/elimina_tienda.php',
				data: {'id':$(this).attr("rel")},
				beforeSend: function(){},
				error: function(){},
				success: function (data){
					window.alert(data);
				}
			});
		}		
	});
	
	$('#comentarios').on('click', 'td.eliminar_user_admin', function(){
		if(window.confirm('Esta seguro que desea eliminar este Usuario?\n'+
		'Tome en cuenta que al eliminar todas sus tiendas y '+
		'desapareceran todos su productos')){
			$(this).parent().fadeTo(500, 0).slideUp();
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/elimina_usuario.php',
				data: {'id':$(this).attr("rel")},
				beforeSend: function(){},
				error: function(){},
				success: function (data){
					window.alert(data);
				}
			});
		}		
	});
	
	
	$('#comentarios').on('click', 'td.eliminar_producto_admin', function(){
		if(window.confirm('Esta seguro que desea eliminar este Producto?\n')){
			$(this).parent().fadeTo(500, 0).slideUp();
			$.ajax({
				type: 'post',
				dataType: 'html',
				url: ruta+'load/delete_producto.php',
				data: {'id':$(this).attr("rel")},
				beforeSend: function(){},
				error: function(){},
				success: function (data){
					window.alert(data);
				}
			});
		}		
	});
});

