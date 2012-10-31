<?php
include ('functions.php');
if (sesion_root()){
	$link = Conecta();
	mysql_query("delete from user where iduser='".$_POST['id']."'",$link);
	echo 'Usuario eliminado con exito !!';
}
else{
	Redirecciona(SITE);
}
?>