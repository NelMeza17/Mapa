<?php
include ('functions.php');
if(sesion()){
	$link = Conecta();
	$tienda= mysql_query("select idtienda from productos where idproductos='".$_POST['id']."'" , $link);
	$idtienda;
	if($row = mysql_fetch_object($tienda))
		$idtienda = $row->idtienda;
	mysql_query("delete from productos where idproductos='".$_POST['id']."'",$link);
	echo "<div id='close_ajax' class='right' title='Cerrar'></div><br />";
	echo "<strong style='color: white'>Haga click en la imagen para agregar mas productos</strong> <img rel='".$idtienda."' id='add_producto'  title='Agregar' class='icons' src='".IMAGES."add.png' />";
	echo "<br /><br />";
	$result = mysql_query("SELECT * FROM productos WHERE idtienda= '".$idtienda."' ");
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
				<td class='editar_producto icons' title='Haz click para editar' style='width:10%;' rel='".$row->idproductos."'><center><img src='".IMAGES."editar.png'/></center></td>
			    <td class='eliminar_producto icons' title='Haz click para eliminar' style='width:10%;' rel='".$row->idproductos."'><center><img src='".IMAGES."eliminar.png'/></center></td>
			</tr>";
		$tienda++;
	}
	echo "</table>
		</center>";
}
else if (sesion_root()){
	$link = Conecta();
	mysql_query("delete from productos where idproductos='".$_POST['id']."'",$link);
	echo "Producto Eliminado con Exito";
}
else{
	Redirecciona(SITE);
}
?>