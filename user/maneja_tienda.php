<?php
	// incluye el head en el html y las llamadas a metodos.
	include '../load/functions.php';
	if(sesion()){
?>			
<html>
	<?php include '../load/head.php';?>
	</head>
	<body>
		<div id="principal">	
	  		<div id="izquierda">
	  			<a title="Inicio" href="<?=USER?>"><div id="izquierda_banner"></div></a>
	  			<p class="fondo_login">
	  				<?php Retornauser();?> 	
	  			</p>
				<br />
				<div id="botones">
					<a href="<?=USER?>"><button class="boton size100">Regresar</button></a>
				</div> 
				<div id="admin_ajax"></div>
				<p class="fondo_letras"><a href='comenta.php' class="comenta">Envianos tus comentarios</a></p> 
			</div>
			<!-- En este div se carga el mapa -->	
			<div id="comentarios">
				<center>
					<h4>Mis Tiendas</h4>
					<div id="table_tienda">
						<table border="0" cellpadding="0" cellspacing="0" class="tabla">
							<tr>
								<th>Nombre</th>
								<th>Direccion</th>
								<th>Colonia</th>
								<th>Telefono</th>
								<th>Editar</th>
								<th>Eliminar</th> 
							</tr>
							<?php 
								$link=Conecta();
								$result=mysql_query("select * from tienda where iduser='".$_SESSION['iduser']."'", $link);
								while($row=mysql_fetch_object($result)){
								 echo "<tr class='modo1'>
											<td style='width:25%'>".$row->nombre."</td>
											<td style='width:25%'>".$row->calle." #".$row->numero."</td>
											<td style='width:15%'>".$row->colonia."</td>
											<td style='width:15%'>".$row->telefono."</td>
											<td class='editar' title='Haz click para editar' style='width:10%; cursor:pointer;' rel='".$row->idtienda."'><center><img src='".IMAGES."editar.png'/></center></td>
											<td class='eliminar' title='Haz click para eliminar' style='width:10%; cursor:pointer;' rel='".$row->idtienda."'><center><img src='".IMAGES."eliminar.png'/></center></td>
										</tr>";			
								}
							?>
						</table>
					</div>
					<h4>Seleccionar Tienda para ver sus productos</h4>
					<?php
						$result=mysql_query("select idtienda, nombre from tienda where iduser='".$_SESSION['iduser']."'", $link);
						echo "<select name='tienda' class='tienda'>
								<option>Selecciona una tienda</option>";
						while($row=mysql_fetch_object($result)){
							echo "<option value='".$row->idtienda."'>".$row->nombre."</option>";
						}
						echo "</select>";
					?>
					<br /><br />
					<div id="productos_ajax"></div>
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