<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		<link href='icono.png' rel='shortcut icon' type='image/png'/>
		<link href='icono.png' rel='shortcut icon' type='image/png'/>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/slide.js"></script>
		<meta charset="UTF-8">
		<title>Inicio</title>
	</head>
	<body>
		<center>
			<div id="principal">	
		  		<div id="izquierda">
		  			<div id="izquierda_banner">
		  			</div>
		  			<div id="panel">
						<form class="clearfix" action="manda_root.php" method="post">
						<h1>Log In</h1>
						<label id="user">Usuario:&nbsp&nbsp&nbsp </label>
						<input type="text" name="log" id="log" /><br/>
						<label id="pass">Password: </label>
						<input class="field" type="password" name="pwd" id="pwd" /><br/>
						<input type="submit" name="submit" id="submit" value="Log In" class="bt_login">
						</form>						
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
					<form action='busca.php' method="post">
						<input type="text" name="buscar" size="30" required />
						<input type="submit" value="Buscar" />
					</form>
					<br /><br /><br /><br /><br /><br /><br /><br /><br />
					<a href="index.php"><button>Regresar</button></a>
					<br /><br /><br /><br /><br /><br /><br />
					<p style="color:white; font-size: 20px"><b><a href="video.php">Video tutorial</a> - <a href="manual.php">Manual de usuario</a></b></p>		  
				</div>	
				<div id="map_canvas">
					<iframe width="900" height="642" src="http://www.youtube.com/embed/k4zmhhEXE5E" frameborder="0" allowfullscreen></iframe>
				</div>	  		
			</div>
		</center>
	</body>
</html>
