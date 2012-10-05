<?php
	include 'load/functions.php';
	if (sesion()) {
		$link=Conecta();
		mysql_query("insert into coordenadas values ('".$_POST['coordenadas']."','".$_POST['nombre']."')",$link);
		header('Location: alta_producto.php?coordenadas='.$_POST['coordenadas']); 
	}
	else {
		Redirecciona('index.php'); 
	}
?>