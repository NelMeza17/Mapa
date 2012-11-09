<?php
	include '../load/functions.php';
	if (sesion()) {
?>
<html>
<?php
		// incluye el head en el html y las llamadas a metodos.
		require_once '../load/head.php';
?>
	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCfNxWtSRLIfHhmur8iGHqyV7osTETywRg&sensor=true">
    </script>
    <script>
	    $(function() {
	    <?php
	    $link = Conecta();
		$result = mysql_query("select distinct nombre from productos",$link);
	    echo "var availableSearch = [";
	    while($row = mysql_fetch_object($result)){
	    	echo "'".base64_decode($row->nombre)."',";
	    }
		echo "];";
	    ?>
	        $( "#Search" ).autocomplete({
	        	minLength: 4,
	            source: availableSearch
	        });
	    });
	</script>
<?php
	if(!ValidaEspacios($_POST['buscar'])){
		Alerta("El Campo no debe estar Vacio");
		RedireccionJs(USER);
	}
		$imagen= "../images/logos/";
		echo "<script type='text/javascript'>
			var map;
			var contentString;
			var infowindow;
			var marker;
			var mi_icono = '../images/yo.png';
			
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
				$result=mysql_query("SELECT * FROM tienda INNER JOIN productos ON tienda.idtienda = productos.idtienda WHERE productos.nombre LIKE '%".base64_encode(ValidaEspacios($_POST['buscar']))."%'",$link);
				while($row=mysql_fetch_object($result)){
						$icon = $imagen.base64_decode($row->imagen);
						$coordenadas = base64_decode($row->latitud).", ".base64_decode($row->longitud);
						$id = $row->idtienda;
						$infoventana="<div aling=left class=popup><img width=30 height=30 src=$icon><b><h3>".base64_decode($row->nombre)."</h3></b><span style=color:blue>Direccion: ".base64_decode($row->calle)." ".base64_decode($row->numero)."<br /> Colonia: ".base64_decode($row->colonia)."</span><br /><br /><a href=# rel=$id >Ver Productos</a></div>";
					echo "
						 var image = new google.maps.MarkerImage(
	      				 	'".$icon."',
	        				null,
	        				null,
	        				null,
							new google.maps.Size(20,20)
	    				);
						var myLatlng = new google.maps.LatLng(".$coordenadas.");
					    marker = new google.maps.Marker({
							position: myLatlng, 
							map: map, 
							icon: image,
							title:'".base64_decode($row->nombre)."'
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
		  			<a title="Inicio" href="<?=USER?>"><div id="izquierda_banner"></div></a>
		  			<p class="fondo_login">
		  				<?php Retornauser();?>	
		  			</p>
					<br />
					<div id="botones">
						<a href="ubica_tienda.php"><button class="boton size90">Alta Tienda</button></a>
						<a href="maneja_tienda.php"><button class="boton size120">Manejar Tiendas</button></a>
						<a href="<?=USER?>"><button class="boton size">Regresar</button></a>
					</div>
					<br />
					<center>
						<form action='busca.php' method="post">
							<input id='Search' class="search" type="text" name="buscar" size="30" placeholder="Ingresa tu busqueda" required="required" />
							<input class="boton size" type="submit" value="Buscar" />
						</form>
					</center>
					<div id="content_ajax"></div>
					<br />
					<p class="fondo_letras"><a href='comenta.php' class="comenta">Envianos tus comentarios</a></p>		  
				</div>
				<!-- En este div se carga el mapa -->	
				<div id="map_canvas"></div>	  		
			</div>
	</body>
</html>
<?php
	}
else {
	Redirecciona(SITE);	
}
?>