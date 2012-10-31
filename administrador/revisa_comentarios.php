<?php
	include '../load/functions.php';
	if(sesion_root()){
?>
<html>
<?php
		// incluye el head en el html y las llamadas a metodos.
		require_once '../load/head.php';
?>
	</head>
	<body>
			<div id="principal">	
		  		<div id="izquierda">
		  			<a title="Inicio" href="<?=ADMINISTRADOR?>"><div id="izquierda_banner"></div></a>
		  			<p class="fondo_login">
		  				<?php Retornauser();?> 	
		  			</p>
					<br />
					<div id="botones">
						<a href="<?=ADMINISTRADOR?>"><button class="boton size100">Regresar</button></a>
					</div>
					<br />
				</div>
				<!-- En este div se carga el mapa -->	
				<div id="comentarios">
					<br />
					<center>
						<table border="0" cellpadding="0" cellspacing="0" class="tabla">
							<tr>
								<th style='width:15%;'>Nombre</th>
								<th style='width:15%;'>E-mail</th>
								<th style='width:10%;'>Fecha</th>
								<th style='width:50%;'>Comentario</th> 
								<th style='width:10%;'>Eliminar</th>
							</tr>
							<?php 
								$link=Conecta();
								$result=mysql_query("select * from comentarios", $link);
								if($count= mysql_num_rows($result)>0){
									while($row=mysql_fetch_object($result)){
									 echo "<tr class='modo1'>
												<td>".$row->nombre."</td>
												<td>".$row->email."</td>
												<td>".$row->fecha."</td>
												<td style='width:50%;'>".$row->comentario."</td>
												<td class='eliminar_comentario' icons' title='Haz click para eliminar' style='width:10%;' rel='".$row->idcomentarios."'><center><img src='".IMAGES."eliminar.png'/></center></td>
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
<?php
	}
	else{
		Redirecciona('../index.php');
	}
?>
