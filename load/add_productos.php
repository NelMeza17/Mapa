<?php include ('functions.php');
if(sesion()){
?>
<div id='close_ajax' class='right' title="Cerrar"></div>
<div class='clear'></div>
<fieldset class="form">
	<center>
	<legend>Agrega Producto</legend>
	<br />
	<form id="formulario" action="<?=USER?>sube_producto.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Nombre:</label></td>
				<td><input type="text" name="producto" class="search" required/></td>
			</tr>
			<tr>
				<td><label>Precio:</label></td>
				<td><input type="number" name="precio"  class="search" min='1' required/></td>
			</tr>
		</table>
		<br />
		<input type='hidden' name='id' value='<?=$_POST['id']?>' />
		<input  type="submit" name="enviar" value="Agregar" class="boton " />
	</form>
	<br />
	</center>
</fieldset>
<?php
}
else{
	Redirecciona(SITE);
}
?>