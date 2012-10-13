<?php
	require_once 'functions.php';
	$link = Conecta();
	$result = mysql_query("SELECT * FROM tienda WHERE idtienda= '".$_POST['id']."' ");
	echo "<div style='width:100%; height:auto; font-size:10px; font-weight:bold; color:white; text-indent: 5px'>";
	if ($row=mysql_fetch_object($result)) {
		echo "<h2>Nombre:&nbsp;&nbsp;&nbsp;&nbsp;".$row->nombre."</h2>
				<p>Direccion:&nbsp;&nbsp;&nbsp;&nbsp;".$row->calle." # ".$row->numero."
				 <br /><br />&nbsp;&nbsp;Col:&nbsp;&nbsp;&nbsp;&nbsp;".$row->colonia."
				 <br /><br />&nbsp;&nbsp;Tel:&nbsp;&nbsp;&nbsp;&nbsp;".$row->telefono."</p>";
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
	while ($row=mysql_fetch_object($result)) {
		echo "<tr class='modo1'>
				<td>".$row->nombre."</td>
				<td>".$row->precio."</td>
			</tr>";
	}
	echo "</table>
			</center>";
?>