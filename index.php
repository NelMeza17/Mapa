<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		<link href='images/icono.png' rel='shortcut icon' type='image/png'/>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/slide.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php
		include 'functions.php';
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
				  });
			    }
				";
echo	"}		
		</script>";
?>
		<meta charset="UTF-8">
		<title>Inicio</title>
	</head>
	<body onload="initialize()">
			<div id="principal">	
		  		<div id="izquierda">
		  			<div id="izquierda_banner">
		  			</div>
		  			<div id="panel">
		  				<center>
							<form class="clearfix" action="manda_root.php" method="post">
							<h1>Log In</h1>
							<label id="user">Usuario:&nbsp&nbsp&nbsp </label>
							<input type="text" name="log" id="log" /><br/>
							<label id="pass">Password: </label>
							<input class="field" type="password" name="pwd" id="pwd" /><br/>
							<input type="submit" name="submit" id="submit" value="Log In" class="bt_login">
							</form>
						</center>						
					</div>
					<div class="tab">
						<ul class="login">
							<li >Hola Invitado!!!!!</li>
							<li id="toggle">
								<a id="open" class="open" >Log-In</a>
								<a id="close" style="display: none;" class="close" >Close Panel</a>
							</li>
						</ul>
					</div>
					<br /><br /><br /><br /><br /><br /><br /><br />
					<center><b style="color: #084B8A">Ingresa Producto a Buscar:</b></center>
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
