<?php
	// incluye el head en el html y las llamadas a metodos.
	include '../load/functions.php';
	if(sesion_root()){
?>			
<html>
	<?php include '../load/head.php';?>
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
				<br /><br /> 
				<div id="content_ajax"></div>
				<br /><br /> 
			</div>	
			<div id="comentarios">
				<center>
					<h4>Usuarios</h4>
						<table border="0" cellpadding="0" cellspacing="0" class="tabla">
							<tr>
								<th>Nombre</th>
								<th>Password</th>
								<th>Correo</th>
								<th>Eliminar</th>
							</tr>
							<?php 
								$link=Conecta();
								$result=mysql_query("select * from user WHERE iduser != ".$_SESSION['iduser']."", $link);
								if($count=mysql_num_rows($result)>0){
									while($row=mysql_fetch_object($result)){
									 echo "<tr class='modo1'>
												<td style='width:35%'>".$row->user."</td>
												<td style='width:35%'>".$row->password."</td>
												<td style='width:35%'>".$row->email."</td>
												<td class='eliminar_user_admin' title='Haz click para eliminar' style='width:10%; cursor:pointer;' rel='".$row->iduser."'><center><img src='".IMAGES."eliminar.png'/></center></td>
											</tr>";			
									}
								}
								else{
									echo"
									<tr class='modo1'>
										<td colspan=4><center><h1>No hay Usuarios para mostrar</h1></center></td>
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
		Redirecciona(SITE);
	}
?>
