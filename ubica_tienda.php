<?php
	include 'load/functions.php';
	if (sesion()) {
?>
<html>
	<?php
		require_once "load/head.php";	 
	?>
		<script type="text/javascript">
		  var map;
		  function initialize() {
			var latlng = new google.maps.LatLng(19.702222, -101.185556);
			var myOptions = {
			  zoom: 13,
			  center: latlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			image = 'tienda.png';
			google.maps.event.addListener(map, 'click', function(event){
				
				placeMarker(event.latLng);
				//alert(event.latLng);
				window.setTimeout('window.location="datos_tienda.php?coordenadas='+event.latLng+'"', 500);
				
			});
		  }
		  /*var contentString = '<div id="content">'+
				'<div id="siteNotice">'+
				'</div>'+
				'<h3 id="firstHeading" class="firstHeading">Xolo</h3>'+
				'<div id="bodyContent">'+
				'<p><b>Xolo</b> Es un perro medio culerillo<b>!!</b></p>'+
				'</div>'+
				'</div>';

			var infowindow = new google.maps.InfoWindow({
				content: contentString,
				maxWidth: 100
			});*/
		
		function placeMarker(location) {
			var clickedLocation = new google.maps.LatLng(location);
		//	alert('Las pinches cordenadas del punto'+location);
			var marker = new google.maps.Marker({
				position : location,
				map : map,
				icon : image
			});
		/*google.maps.event.addListener(marker, 'click', function() {
  			infowindow.open(map,marker);
		});*/
		}
		</script>
	</head>
	<body onload="initialize()">
		<center>
			<div id="principal">	
		  		<div id="izquierda">
		  			<a href="dentro.php"><div id="izquierda_banner"></div></a>
		  				<br /><br /><br /><br /><br /><br />	
		  				<p><b>Hola -- <?php echo "<span style='color: blue'>".$_SESSION['login']."</span>";?> / <a href="logout.php">Log-Out</a></b></p>
		  				<h2>Da click en el mapa para ubicar una tienda</h2>
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