<html>
<?php
		// incluye el head en el html y las llamadas a metodos.
		include 'load/functions.php';
		require_once 'load/head.php';
		$imagen= "images/logos/";
		echo "<script type='text/javascript'>
			var map;
			var contentString;
			var infowindow;
			var marker;
			var mi_icono = 'images/yo.png';
			
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
				$result=mysql_query("SELECT * FROM tienda INNER JOIN productos ON tienda.idtienda = productos.idtienda WHERE productos.nombre LIKE '%".$_POST['buscar']."%'",$link);
				while($row=mysql_fetch_object($result)){
						$icon = $imagen.$row->imagen;
						$coordenadas = $row->latitud.", ".$row->longitud;
						$id = $row->idtienda;
						$infoventana="<div aling=left class=popup><img src=$icon><b><h3>".$row->nombre."</h3></b><span style=color:blue>Direccion: ".$row->calle." ".$row->numero."<br /> Colonia: ".$row->colonia."</span><br /><br /><a href=# rel=$id >Ver Productos</a></div>";
						echo "
							var myLatlng = new google.maps.LatLng(".$coordenadas.");
						    marker = new google.maps.Marker({
								position: myLatlng, 
								map: map, 
								icon: '".$icon."',
								title:'".$row->nombre."'
							});
							asignaVentana(marker, '".$infoventana."');
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
		  			<a title="Inicio" href="<?=SITE?>"><div id="izquierda_banner"></div></a>
		  			<p class="fondo_login">
		  				<a href="login.php">Iniciar Sesion</a>	
		  			</p>
					<br />
					<div id="botones">
						<a href="<?=SITE?>"><button class="boton size100">Regresar</button></a>
					</div>
					<br />
					<center>
					<form action='busca.php' method="post">
						<input class="search" type="text" name="buscar" size="30" placeholder="Ingresa tu busqueda" required />
						<input class="boton size" type="submit" value="Buscar" />
					</form>
					<div id="content_ajax">
					</div>
					<br />
					<p class="fondo_letras"><a href="comenta.php" class="comenta">Envianos tu comentario</a></p>		  
				</div>
				<!-- En este div se carga el mapa -->	
				<div id="map_canvas"></div>	  		
			</div>
	</body>
</html>
