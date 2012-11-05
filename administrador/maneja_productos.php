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
					<h4>Productos</h4>
						<table border="0" cellpadding="0" cellspacing="0" class="tabla">
							<tr>
								<th>Tienda</th>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Eliminar</th> 
							</tr>
							<?php 
								$link=Conecta();
								$result=mysql_query("select idproductos, (select nombre from tienda where tienda.idtienda=productos.idtienda) as tienda,(select user from user where user.iduser=(select iduser from tienda where tienda.idtienda=productos.idtienda)) as usuario, nombre, precio from productos order by tienda;", $link);
								if($count=mysql_num_rows($result)>0){
									while($row=mysql_fetch_object($result)){
									 echo "<tr class='modo1'>
												<td style='width:30%'>".base64_decode($row->tienda)."</td>
												<td style='width:20%'>".base64_decode($row->usuario)."</td>
												<td style='width:30%'>".base64_decode($row->nombre)."</td>
												<td style='width:10%'>".base64_decode($row->precio)."</td>
												<td class='eliminar_producto_admin' title='Haz click para eliminar' style='width:10%; cursor:pointer;' rel='".$row->idproductos."'><center><img src='".IMAGES."eliminar.png'/></center></td>
											</tr>";			
									}
								}
								else{
									echo"
									<tr class='modo1'>
										<td colspan=5><center><h1>No hay Productos para mostrar</h1></center></td>
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
