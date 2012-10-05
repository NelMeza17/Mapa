<?php
	include 'load/functions.php';
	if (sesion()) {
		$link=Conecta();
?>
<html>
<?php
	require_once "load/head.php";
		$cor=str_replace("(", "", $_GET['coordenadas']);
		$cor=str_replace(")", "", $cor);
		$result=mysql_query("select * from productos where coordenadas='".$cor."'",$link);
		$tienda="";
		$informacion="";
		while ($row=mysql_fetch_object($result)) {
			$informacion=$informacion."<br />".$row->producto;
			$tienda=$row->tienda;
		}
		$tienda="<b><h3>".$tienda."</h3></b><span style=color:red>Nuestros Productos:</span>";
		$informacion="<div align=left>".$tienda.$informacion."</div>";
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
			asignaVentana(marker);
		  }
		  
		  function asignaVentana(marker) {
				  var infowindow = new google.maps.InfoWindow(
					  { content: '".$informacion."',
					    maxWidth: 100,
						size: new google.maps.Size(30,30)
					  });
				  google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
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
			  				<legend>Datos producto</legend>
			  				<form id="formulario" action="resube_producto.php" method="post">
			  					<label>Producto: </label><input type="text" name="producto" required /><br /><br />
			  					<input type="submit" name="enviar" value="Enviar" />
			  					<? echo "<input type='hidden' name='coordenadas' value='".$cor."' />";?>
			  				</form>
		  				</fieldset>
		  				<br /><br /><br /><br /><br /><br />
		  				<? echo "<a href='dentro.php'><button>Terminar de agregar productos</button></a>";?>
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