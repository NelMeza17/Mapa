<?php
	include '../load/functions.php';
	if (sesion()) {
		$link=Conecta();
		if(inyeccion($_POST['producto']) && $_POST['precio']){
			if(isset($_POST['edita']) && $_POST['edita']=='editar'){
				mysql_query("update productos set nombre='".base64_encode($_POST['producto'])."', precio='".base64_encode($_POST['precio'])."' where idproductos='".$_POST['idproducto']."'", $link);
				echo $_POST['idtienda'];
			}
			else{ 
				mysql_query("insert into productos values ('null','".$_POST['idtienda']."','".base64_encode($_POST['producto'])."','".base64_encode($_POST['precio'])."')", $link);
				echo $_POST['idtienda'];
			}
		}
		else{
			echo "scripting";
		}
	}
	else {
		Redirecciona(SITE); 
	}
?>