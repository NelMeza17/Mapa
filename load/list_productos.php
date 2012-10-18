<?php	
require_once 'functions.php';
if(sesion()){
	$link = Conecta();
	// $result = mysql_query("SELECT * FROM tienda WHERE idtienda= '".$_POST['id']."' ");
	// echo "<div style='width:100%; height:auto; font-size:10px; font-weight:bold; color:white; text-indent: 5px'>";
	// if ($row=mysql_fetch_object($result)) {
		// echo "<h2>Nombre:&nbsp;&nbsp;&nbsp;&nbsp;".$row->nombre."</h2>
				// <p>Direccion:&nbsp;&nbsp;&nbsp;&nbsp;".$row->calle." # ".$row->numero."
				 // <br /><br />&nbsp;&nbsp;Col:&nbsp;&nbsp;&nbsp;&nbsp;".$row->colonia."
				 // <br /><br />&nbsp;&nbsp;Tel:&nbsp;&nbsp;&nbsp;&nbsp;".$row->telefono."</p>";
	// }
	// echo "</div>
			// <br />";	echo "<br />";
	echo "<strong>Haga click en la imagen para agregar mas productos</strong> <img title='Agregar' class='icons' src='".IMAGES."add.png' />";
	echo "<br /><br />";
	$result = mysql_query("SELECT * FROM productos WHERE idtienda= '".$_POST['id']."' ");
	echo "
		<center>
		<table border='0' cellpadding='0' cellspacing='0' class='tabla' style='width:90%'>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>";
	while ($row=mysql_fetch_object($result)) {
		echo "<tr class='modo1'>
				<td>".$row->nombre."</td>
				<td>".$row->precio."</td>
				<td class='editar icons' title='Haz click para editar' style='width:10%;' rel='".$row->idtienda."'><center><img src='".IMAGES."editar.png'/></center></td>
			    <td class='eliminar icons' title='Haz click para eliminar' style='width:10%;' rel='".$row->idtienda."'><center><img src='".IMAGES."eliminar.png'/></center></td>
			</tr>";
	}
	echo "</table>
		</center>";
}
else{
	Redirecciona(SITE);
}
?>