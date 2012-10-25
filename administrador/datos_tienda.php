<?php
	include 'load/functions.php';
	if (sesion()) {
		$link=Conecta();
			$cor=str_replace("(","",$_GET['coordenadas']);
			$cor=str_replace(")","",$cor);
?>
<html>
<?php
	require_once "load/head.php";
		echo "
		<script type='text/javascript'>
		  var map;
		  function initialize() {
			var latlng = new google.maps.LatLng(19.702222, -101.185556);
			var myOptions = {
			  zoom: 13,
			  center: latlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
			image = 'tienda.png';
			var cor= new google.maps.LatLng(".$cor.");
			placeMarker(cor);

		  }
		  function placeMarker(location) {
			var clickedLocation = new google.maps.LatLng(location);
			var marker = new google.maps.Marker({
				position : location,
				map : map,
				icon : image
			});
		}
		</script>";
?>
	</head>
	<body onload="initialize()">
		<center>
			<div id="principal">	
		  		<div id="izquierda">
		  			<a href="dentro.php"><div id="izquierda_banner"></div></a>
		  				<br /><br /><br /><br /><br /><br />	
		  				<p><b>Hola -- <?php echo "<span style='color: blue'>".$_SESSION['login']."</span>";?> / <a href="logout.php">Log-Out</a></b></p>
		  				<fieldset style="border-color: #A9A9F5">
			  				<legend>Datos tienda</legend>
			  				<form id="formulario" action="sube_tienda.php" method="post">
			  					<?php echo "<input type='hidden' name='coordenadas' value='".$cor."'>";?>
			  					<label>Nombre:</label><input type="text" name="nombre" required/><br /><br />
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
		Redirecciona('index.php'); 
	}
?>