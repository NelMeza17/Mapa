<?php include ('functions.php');
if(sesion()){
?>
<div id='close_ajax' class='right' title="Cerrar"></div>
<div class='clear'></div>
<fieldset class="form">
	<center>
	<legend>Editar Producto</legend>
	<br />
	<?php
		$link = Conecta();
		$result = mysql_query("select * from productos where idproductos='".$_POST['id']."'", $link);
		if($row = mysql_fetch_object($result))
		{
	?>
	<form id="form_add_producto" method="post" action="<?=USER?>sube_producto.php"  >
		<table>
			<tr>
				<td><label>Nombre:</label></td>
				<td><input id='producto' type="text" value='<?=base64_decode($row->nombre)?>' name="producto" class="search" required="required"/></td>
			</tr>
			<tr>
				<td><label>Precio:</label></td>
				<td><input id='precio' type="number" value='<?=base64_decode($row->precio)?>' name="precio"  class="search" min='1' required="required"/></td>
			</tr>
		</table>
		<br />
		<input type='hidden' name='idproducto' value='<?=$row->idproductos?>' />
		<input id='idtienda' type='hidden' name='idtienda' value='<?=$row->idtienda?>' />
		<input type="hidden" name='edita' value='editar' />
		<div id="ajax_loader"><img id="loader_gif" src="<?=IMAGES?>loader.gif" style=" display:none;"/></div>
		<br />
		<input id='btn_add_producto'  type="submit" name="enviar" value="Editar" class="boton " />
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