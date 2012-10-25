<?php
	include '../load/functions.php';
	if (sesion()) {
		$link=Conecta();
		if($_POST['editar']=='edita'){
			
		}
		else{ 
			mysql_query("insert into productos values ('".$_POST['id']."','".$_POST['producto']."','".$_POST['precio']."')", $link);
			Alerta("Producto Agregado con exito!!!");
			RedireccionJs(USER.'maneja_tienda.php');
		}
	}
	else {
		Redirecciona(SITE); 
	}
?>