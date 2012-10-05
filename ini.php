<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		<link href='icono.png' rel='shortcut icon' type='image/png'/>
		<link href='icono.png' rel='shortcut icon' type='image/png'/>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/slide.js"></script>
		
	</head>
	<body >	
		  		<div id="izquierda">  			
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
			</div>
	</body>
</html>
