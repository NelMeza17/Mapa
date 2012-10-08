<?php
	include 'load/functions.php';
	if (sesion()) {
?>
<html>
<?php
	require_once "load/head.php";
		$lat="19.72";
		$lon="-101.20";
		echo "<script type='text/javascript'>
			var map;
			var contentString;
			var infowindow;
			var marker;
			var mi_icono = '../images/yo.png';
			var image = '../images/tienda.png';
			
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
	<script type="text/javascript">
		$(document).ready(function(){
			<?php 
			if (isset($_SESSION['welcome']) && $_SESSION['welcome'] == '1'){ 
				echo "window.alert('Bienvenido Administrador');";
			    $_SESSION['welcome'] = '';
			} 
			?>	
		});
	</script>
	</head>
	<body onload="init()">
		<center>
			<div id="principal">	
		  		<div id="izquierda">
		  			<a href="dentro.php"><div id="izquierda_banner"></div></a>
						<br /><br /><br /><br /><br />
		  				<p>Hola -- <?php echo "<span style='color: blue'>".$_SESSION['login']."</span>";?> / <a href="logout.php">Log-Out</a></p>
		  				<form name="eleccion">
			  				<div align="left">
			  					<center><a href="ubica_tienda.php"><input type="button" value="Alta Tienda" /></a> 
								<!--<a href="baja_tienda.php"><button>Baja Tienda</button></a>--></center>
								<center><a href="selecciona_tienda.php"><input type="button" value="Agrega Producto" /></a></center>
			  				</div>
		  				</form>
		  				<br /><br />
						<center><b style="color: #084B8A">Ingresa Producto a Buscar:</b></center>
						<br />
						<form action='busca_admin.php' method="post">
							<input type="text" name="buscar" size="30" required />
							<input type="submit" value="Buscar" />
						</form>
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