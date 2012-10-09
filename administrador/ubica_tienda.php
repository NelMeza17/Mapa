<?php
	include 'load/functions.php';
	if (sesion()) {
?>
<html>
	<?php
		require_once "load/head.php";	 
	?>
    <script type="text/javascript">
	var map = null;
	var infoWindow = null;
	
	function openInfoWindow(marker) {
		var markerLatLng = marker.getPosition();
		$('#latitud').val(markerLatLng.lat());
		$('#longitud').val(markerLatLng.lng());
	}

	function init(){
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
		    title:"Ejemplo marcador arrastrable"
		});
		
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
		  			<a href="dentro.php"><div id="izquierda_banner"></div></a>
		  				<br /><br /><br /><br /><br /><br />	
		  				<p><b>Hola -- <?php echo "<span style='color: blue'>".$_SESSION['login']."</span>";?> / <a href="logout.php">Log-Out</a></b></p>
		  				<h2>Ubica tu Tienda en el mapa</h2>
		  				<fieldset style="border-color: #A9A9F5">
			  				<legend>Datos tienda</legend>
			  				<form id="formulario" action="sube_tienda.php" method="post">
			  					<label>Nombre:</label><input type="text" name="nombre" required/><br /><br />
			  					<label>Latitud:</label><input type="text" name="latitud" id="latitud" disabled="true" required/><br /><br />
			  					<label>Latitud:</label><input type="text" name="longitud" id="longitud" disabled="true" required/><br /><br />
			  					<input type="submit" name="enviar" value="Enviar" />
			  				</form>
		  				</fieldset>
				</div>	
				<div id="map_canvas"></div>	  		
		  		
			</div>
		</center>
	</body>
</html>
<?php
	}
	else {
		Redireccion('index.php'); 
	}
?>