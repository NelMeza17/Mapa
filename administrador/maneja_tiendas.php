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
					<a href="revisa_comentarios.php"><button class="boton size140">Revisar Comentarios</button></a>
						<a href="maneja_usuarios.php"><button class="boton size120">Manejar Usuarios</button></a><br /><br />
						<a href="maneja_tiendas.php"><button class="boton size120">Manejar Tiendas</button></a>
						<a href="maneja_productos.php"><button class="boton size140">Manejar Productos</button></a><br /><br />
					<a href="<?=ADMINISTRADOR?>"><button class="boton size100">Regresar</button></a>
				</div>
				<br /><br /> 
				<div id="content_ajax"></div>
				<br /><br /> 
			</div>	
			<div id="comentarios">
				<center>
					<h4>Mis Tiendas</h4>
						<table border="0" cellpadding="0" cellspacing="0" class="tabla">
							<tr>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Direcci&oacute;n</th>
								<th>Colonia</th>
								<th>Tel&eacute;fono</th>
								<th>Eliminar</th> 
							</tr>
							<?php 
								$link=Conecta();
								//$result=mysql_query("select * from tienda", $link);
								$result=mysql_query("select idtienda, nombre, calle, numero, colonia, telefono, (select user from user where user.iduser= tienda.iduser) as usuario from tienda", $link);
								$tienda=0;
								if($count=mysql_num_rows($result)>0){
									while($row=mysql_fetch_object($result)){
									 echo "<tr class='modo1' id='$tienda'>
												<td style='width:12%'>".base64_decode($row->usuario)."</td>
												<td style='width:20%'>".base64_decode($row->nombre)."</td>
												<td style='width:25%'>".base64_decode($row->calle)." #".base64_decode($row->numero)."</td>
												<td style='width:18%'>".base64_decode($row->colonia)."</td>
												<td style='width:15%'>".base64_decode($row->telefono)."</td>
												<td class='eliminar_tienda_admin' title='Haz click para eliminar' style='width:10%; cursor:pointer;' rel='".$row->idtienda."'><center><img src='".IMAGES."eliminar.png'/></center></td>
											</tr>";			
									}
								}
								else{
									echo"
									<tr class='modo1'>
										<td colspan=5><center><h1>No hay Tiendas para mostrar</h1></center></td>
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
