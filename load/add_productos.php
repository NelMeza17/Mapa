<?php include ('functions.php');
if(sesion()){
?>
<div id='close_ajax' class='right' title="Cerrar"></div>
<div class='clear'></div>
<fieldset class="form">
	<center>
	<legend>Agrega Producto</legend>
	<br />
	<form id="form_add_producto" method="post" action="<?=USER?>sube_producto.php"  >
		<table>
			<tr>
				<td><label>Nombre:</label></td>
				<td><input id='producto' type="text" name="producto" class="search" required="required"/></td>
			</tr>
			<tr>
				<td><label>Precio:</label></td>
				<td><input id='precio' type="number" name="precio"  class="search" min='1' required="required"/></td>
			</tr>
		</table>
		<br />
		<input id='idtienda' type='hidden' name='idtienda' value='<?=$_POST['id']?>' />
		<div id="ajax_loader"><img id="loader_gif" src="<?=IMAGES?>ajax-loader_white.gif" style=" display:none;"/></div>
		<br />
		<input id='btn_add_producto'  type="submit" name="enviar" value="Agregar" class="boton " />
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