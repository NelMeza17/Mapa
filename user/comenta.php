<?php
	include '../load/functions.php';
	if(sesion()){
?>
<html>
<?php
		// incluye el head en el html y las llamadas a metodos.
		require_once '../load/head.php';
?>
	</head>
	<body onload="init()">
			<div id="principal">	
		  		<div id="izquierda">
		  			<div id="izquierda_banner">
		  			</div>
		  			<p class="fondo_login">
		  				<?php Retornauser();?> 	
		  			</p>
					<br /><br />
					<center>
					<fieldset class="form">
						<legend>Comentarios</legend>
						<form action='../agrega_comentario.php' method="post">
							<input type="text" name="nombre" value="<?=$_SESSION['login']?>" class="search" disabled/>
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
								while($row=mysql_fetch_object($result)){
								 echo "<tr class='modo1'>
											<td>".$row->nombre."</td>
											<td>".$row->email."</td>
											<td>".$row->fecha."</td>
											<td style='width:500px'>".$row->comentario."</td>
										</tr>";			
								}
							?>
						</table>
					</center>
				</div>	  		
			</div>
	</body>
</html>
<?php
	}
	else{
		Redirecciona('../index.php');
	}
?>