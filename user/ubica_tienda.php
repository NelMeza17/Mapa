<?php
	include '../load/functions.php';
	if (sesion()) {
?>
<html>
	<?php
		require_once "../load/head.php";	 
	?>
	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCfNxWtSRLIfHhmur8iGHqyV7osTETywRg&sensor=true">
    </script>
    <script type="text/javascript">
	var map = null;
	var infoWindow = null;
	
	function openInfoWindow(marker) {
		var markerLatLng = marker.getPosition();
		$('#latitud').val(markerLatLng.lat());
		$('#longitud').val(markerLatLng.lng());
	}

	function init(){
		localizame();
		navigator.geolocation.getCurrentPosition(function(position) {
 			var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
 			initialize(pos);
 		});
 	}

	function initialize(pos) {
		var myOptions = {
		  zoom: 13,
		  center: pos,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		
		map = new google.maps.Map($("#map_canvas").get(0), myOptions);
		
		infoWindow = new google.maps.InfoWindow();
		
		var marker = new google.maps.Marker({
		    position: pos,
		    draggable: true,
		    map: map,
		    title:"Mueve la marca hasta la ubicacion de la tienda"
		});
		
		var markerLatLng = marker.getPosition();
		$('#latitud').val(markerLatLng.lat());
		$('#longitud').val(markerLatLng.lng());
		
		google.maps.event.addListener(marker, 'dragend', function(){
			openInfoWindow(marker);
		});
	}

  
	$(document).ready(function() {
	    initialize();
	}); 

</script>
	</head>
	<body onload="init()">
		<center>
			<div id="principal">	
		  		<div id="izquierda">
		  			<a title="Inicio" href="<?=USER?>"><div id="izquierda_banner"></div></a>
		  				<p class="fondo_login">
		  				<?php Retornauser();?> 	
		  				</p>
		  				<h3>Ubica tu Tienda en el mapa</h3>
		  				<fieldset class="form">
			  				<legend>Datos tienda</legend>
			  				<br />
			  				<form id="formulario" action="sube_tienda.php" method="post" enctype="multipart/form-data">
			  					<input name="file" type="file" id="file" required><br /><br />
			  					<table>
			  						<tr>
			  							<td><label>Nombre:</label></td>
			  							<td><input type="text" name="nombre" class="search" maxlength="40" required="required"/></td>
			  						</tr>
			  						<tr>
			  							<td><label>Calle:</label></td>
			  							<td><input type="text" name="calle" class="search" maxlength="40" required="required"/></td>
			  						</tr>
			  						<tr>
			  							<td><label>N&uacute;mero:</label></td>
			  							<td><input type="text" name="numero" class="search" maxlength="4" required="required"/></td>
			  						</tr>
			  						<tr>
			  							<td><label>Colonia:</label></td>
			  							<td><input type="text" name="colonia" class="search" maxlength="40" required="required"/></td>
			  						</tr>
			  						<tr>
			  							<td><label>Tel&eacute;fono:</label></td>
			  							<td><input type="text" name="telefono" class="search" /></td>
			  						</tr>
			  					</table>
			  					<input type="hidden" name="latitud" id="latitud" required="required"/>
			  					<input type="hidden" name="longitud" id="longitud" required="required"/>
			  					<input type="hidden" name="iduser" value="<?=$_SESSION['iduser']?>"/>
			  					<br />
			  					<input type="submit" name="enviar" value="Enviar" class="boton " />
			  				</form>
			  				<br />
		  				</fieldset>
		  				<br />
		  				<p class="fondo_letras"><a href='comenta.php' class="comenta">Envianos tus comentarios</a></p>
		  				<br />
		  				<div id="botones">
							<a href="<?=USER?>"><button class="boton size100">Regresar</button></a>
						</div>	
				</div>	
				<div id="map_canvas"></div>	  		
			</div>
		</center>
	</body>
</html>
<?php
	}
	else {
		Redirecciona(SITE); 
	}
?>