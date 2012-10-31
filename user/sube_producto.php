<?php
	include '../load/functions.php';
	if (sesion()) {
		$link=Conecta();
		if(isset($_POST['edita']) && $_POST['edita']=='editar'){
			mysql_query("update productos set nombre='".$_POST['producto']."', precio='".$_POST['precio']."' where idproductos='".$_POST['idproducto']."'", $link);
			echo $_POST['idtienda'];
		}
		else{ 
			mysql_query("insert into productos values ('null','".$_POST['idtienda']."','".$_POST['producto']."','".$_POST['precio']."')", $link);
			echo $_POST['idtienda'];
		}
	}
	else {
		Redirecciona(SITE); 
	}
?>