<html>
<?php
		include 'load/functions.php';
		require_once 'load/head.php';
		$lat="19.72";
		$lon="-101.20";
		echo "<script type='text/javascript'>
			var map;
			var contentString;
			var infowindow;
			var marker;
			var mi_icono = 'images/yo.png';
			var image = 'images/tienda.png';
			
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
				
				map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
				var mi_localizacion = new google.maps.Marker({
					position: pos,
					map: map,
					icon: mi_icono,
					title: 'Yo'
				});
				";
				
				//----Aqui ponemos todas las tiendas .....
				$link=Conecta();
				$result=mysql_query("select * from coordenadas",$link);
				while($row=mysql_fetch_object($result)){
					$result1=mysql_query("select * from productos where coordenadas='".$row->coordenadas."'",$link);
					$tienda="";
					$informacion="";
					while ($row1=mysql_fetch_object($result1)) {
						$informacion=$informacion."<br />".$row1->producto;
						$tienda=$row1->tienda;
					}
					$tienda="<b><h3>".$tienda."</h3></b><span style=color:red>Nuestros Productos:</span>";
					$informacion="<div align=left>".$tienda.$informacion."</div>";
					echo "
						var myLatlng = new google.maps.LatLng(".$row->coordenadas.");
					    marker = new google.maps.Marker({
							position: myLatlng, 
							map: map, 
							icon: image,
							title:'".$row->nombre."'
						});
						asignaVentana(marker, '".$informacion."');
					";
				}
				echo "
				function asignaVentana(marker, informacion) {
				  var infowindow = new google.maps.InfoWindow(
					  { content: informacion,
					    maxWidth: 100,
						size: new google.maps.Size(30,30)
					  });
				  google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				  });
			    }
				";
echo	"}		
		</script>";
?>
	</head>
	<body onload="init()">
			<div id="principal">	
		  		<div id="izquierda">
		  			<div id="izquierda_banner">
		  			</div>
					<br /><br /><br /><br /><br /><br /><br /><br />
					<p class="fondo_letras">Ingresa Producto a Buscar:</p>
					<br />
					<center>
					<form action='busca.php' method="post">
						<input type="text" name="buscar" size="30" required />
						<input type="submit" value="Buscar" />
					</form>
							  
				</div>
				<!-- En este div se carga el mapa -->	
				<div id="map_canvas"></div>	  		
			</div>
	</body>
</html>
