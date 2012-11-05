<?php
	require_once 'functions.php';
	$link = Conecta();
	$result = mysql_query("SELECT * FROM tienda WHERE idtienda= '".$_POST['id']."' ");
	echo "<div id='close_ajax' class='right' title='Cerrar'></div><div class='clear'></div>
		<div style='width:100%; height:auto; font-size:10px; font-weight:bold; color:white; text-indent: 5px'>";
	if ($row=mysql_fetch_object($result)) {
		echo "<h2>Nombre:&nbsp;&nbsp;&nbsp;&nbsp;".base64_decode($row->nombre)."</h2>
				<p>Direccion:&nbsp;&nbsp;&nbsp;&nbsp;".base64_decode($row->calle)." # ".base64_decode($row->numero)."
				 <br /><br />&nbsp;&nbsp;Col:&nbsp;&nbsp;&nbsp;&nbsp;".base64_decode($row->colonia)."
				 <br /><br />&nbsp;&nbsp;Tel:&nbsp;&nbsp;&nbsp;&nbsp;".base64_decode($row->telefono)."</p>";
	}
	echo "</div>
			<br />";
	$result = mysql_query("SELECT * FROM productos WHERE idtienda= '".$_POST['id']."' ");
	echo "
		<center>
		<table border='0' cellpadding='0' cellspacing='0' class='tabla' style='width:90%'>
			<tr>
				<th>Nombre</td>
				<th>Precio</td>
			</tr>";
	if($count=mysql_num_rows($result)){
		while ($row=mysql_fetch_object($result)) {
			echo "<tr class='modo1'>
					<td>".base64_decode($row->nombre)."</td>
					<td>".base64_decode($row->precio)."</td>
				</tr>";
		}
	}
	else{
		echo"
			<tr class='modo1'>
				<td colspan=2><center><h1>No hay Productos para mostrar</h1></center></td>
			</tr>
		";
	}
	echo "</table>
			</center>";
?>