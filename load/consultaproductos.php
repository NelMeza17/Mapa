<?php
	require_once 'functions.php';
	$link = Conecta();
	$result = mysql_query("SELECT * FROM tienda WHERE idtienda= '".$_POST['id']."' ");
	while ($row=mysql_fetch_object($result)) {
		echo "<h3>".$row->nombre."</h3>
				<br />".$row->calle." ".$row->numero."
				 <br />".$row->colonia."
				 <br />".$row->telefono."
		";
	}
	$result = mysql_query("SELECT * FROM productos WHERE idtienda= '".$_POST['id']."' ");
	echo "<table>
			<tr>
				<td><b>Producto</b></td>
				<td><b>Precio</b></td>
			</tr>";
	while ($row=mysql_fetch_object($result)) {
		echo "<tr>
				<td><b>".$row->nombre."</b></td>
				<td><b>".$row->precio."</b></td>
			</tr>";
	}
	echo "</table>";
?>