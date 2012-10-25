<?php include ('functions.php');
if(sesion()){
?>
<fieldset class="form">
	<center>
	<legend>Edita tienda</legend>
	<br />
	<?php
		$link = Conecta();
		$result = mysql_query("select * from tienda where idtienda='".$_POST['id']."'", $link);
		if($row = mysql_fetch_object($result))
		{
	?>
	Tu imagen actual es: <img src='<?=LOGOS.$row->imagen?>'/>
	<form id="formulario" action="<?=USER?>sube_tienda.php" method="post" enctype="multipart/form-data">
		<input name="file" type="file" id="file" />
		<br /><br />
		<table>
			<tr>
				<td><label>Nombre:</label></td>
				<td><input type="text" name="nombre" value='<?=$row->nombre?>' class="search" required/></td>
			</tr>
			<tr>
				<td><label>Calle:</label></td>
				<td><input type="text" name="calle" value='<?=$row->calle?>' class="search" required/></td>
			</tr>
			<tr>
				<td><label>Numero:</label></td>
				<td><input type="text" name="numero" value='<?=$row->numero?>' class="search" required/></td>
			</tr>
			<tr>
				<td><label>Colonia:</label></td>
				<td><input type="text" name="colonia" value='<?=$row->colonia?>' class="search" required/></td>
			</tr>
			<tr>
				<td><label>Telefono:</label></td>
				<td><input type="text" name="telefono" value='<?=$row->telefono?>' class="search" /></td>
			</tr>
		</table>
		<br />
		<input type='hidden' name='editar' value='edita' />
		<input type='hidden' name='id' value='<?=$_POST['id']?>' />
		<input type="submit" name="enviar" value="Enviar" class="boton " />
	</form>
	<?php } ?>
	<br />
	</center>
</fieldset>
<?php
}
else{
	Redirecciona(SITE);
}
?>