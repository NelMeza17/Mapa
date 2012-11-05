<html>
<?php
		// incluye el head en el html y las llamadas a metodos.
		include 'load/functions.php';
		require_once 'load/head.php';
?>
	</head>
	<body>
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
					<fieldset class="form">
						<legend>Comentarios</legend>
						<form action='agrega_comentario.php' method="post">
							<input type="text" name="nombre" placeholder="Ingresa Nombre" class="search" required />
							<input type="email" name="email" placeholder="Ingresa E-mail" class="search" required />
							<input type="text" name="fecha" class="search" value="<?=date("Y-m-d")?>" disabled  />
							<textarea class="area" rows="15" cols="40" placeholder="Ingresa tu comentario" name="comentario" required ></textarea>
							<br />
							<input type="submit" value="Enviar" class="boton" />
						</form>
						<br />
					</fieldset>
					<br />	  
				</div>
				<!-- En este div se carga el mapa -->	
				<div id="comentarios">
					<br />
					<center>
						<table border="0" cellpadding="0" cellspacing="0" class="tabla">
							<tr>
								<th>Nombre</td>
								<th>E-mail</td>
								<th>Fecha</td>
								<th>Comentario</td> 
							</tr>
							<?php 
								$link=Conecta();
								$result=mysql_query("select * from comentarios", $link);
								if($count= mysql_num_rows($result)>0){
									while($row=mysql_fetch_object($result)){
									 echo "<tr class='modo1'>
												<td>".base64_decode($row->nombre)."</td>
												<td>".base64_decode($row->email)."</td>
												<td>".$row->fecha."</td>
												<td style='width:500px'>".base64_decode($row->comentario)."</td>
											</tr>";			
									}
								}
								else{
									echo"
									<tr class='modo1'>
										<td colspan=5><center><h1>No hay comentarios para mostrar</h1></center></td>
									</tr>
									";
								}
							?>
						</table>
					</center>
				</div>	  		
			</div>
	</body>
</html>
