<html>
	<?php
		require_once "load/head.php"; 
	?>
		
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
