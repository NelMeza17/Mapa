<?php
	include '../load/functions.php';
	if (sesion()) {
		$link=Conecta();
		if(1>1){
			
		}
		else{ 
			mysql_query("insert into productos values ('".$_POST['id']."','".$_POST['producto']."','".$_POST['precio']."')", $link);
			echo "Producto Agregado con exito..";
			//Alerta("Producto Agregado con exito!!!");
			//RedireccionJs(USER.'maneja_tienda.php');
		}
	}
	else {
		Redirecciona(SITE); 
	}
?>