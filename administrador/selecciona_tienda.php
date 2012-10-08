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
			function initialize() {
				var latlng = new google.maps.LatLng(19.702222, -101.185556);
				var myOptions = {
					zoom: 13,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				image = 'tienda.png'
				
				//----Aqui ponemos todas las tiendas .....
						
				map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
				var arr=['$lat','19.702422','19.705222','19.722222','19.712222'];
				var arr2=['$lon','-101.189856','-101.184556','-101.187556','-101.195556'];
				var msj=['hola','como','estas','culeron','mal pedo']";
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
					//alert('Las coordenadas de la tienda'+marker.position);
					window.location='realta_producto.php?coordenadas='+marker.position+'';
				  });
			    }
				";
echo	"}		
		</script>";
?>
	</head>
	<body onload="initialize()">
		<center>
			<div id="principal">	
		  		<div id="izquierda">
		  			<a href="dentro.php"><div id="izquierda_banner"></div></a>
			
		  				<p>Hola -- <?php echo "<span style='color: blue'>".$_SESSION['login']."</span>";?> / <a href="logout.php">Log-Out</a></p>
		  				<h2>Da click en la tienda para agregar productos</h2>
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