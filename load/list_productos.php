<?php	
require_once 'functions.php';
if(sesion()){
	$link = Conecta();	echo "<br />";
	echo "<strong style='color: white'>Haga click en la imagen para agregar mas productos</strong> <img rel='".$_POST['id']."' id='add_producto'  title='Agregar' class='icons' src='".IMAGES."add.png' />";
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
	$tienda=0;
	while ($row=mysql_fetch_object($result)) {
		echo "<tr class='modo1'>
				<td>".$row->nombre."</td>
				<td>".$row->precio."</td>
				<td class='editar icons' title='Haz click para editar' style='width:10%;' rel='".$row->idtienda."'><center><img src='".IMAGES."editar.png'/></center></td>
			    <td class='eliminar icons' title='Haz click para eliminar' style='width:10%;' rel='".$row->idtienda."'><center><img src='".IMAGES."eliminar.png'/></center></td>
			</tr>";
		$tienda++;
	}
	echo "</table>
		</center>";
}
else{
	Redirecciona(SITE);
}
?>