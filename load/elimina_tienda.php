<?php
include ('functions.php');
if(sesion()){
	$link = Conecta();
	mysql_query("delete from tienda where idtienda='".$_POST['id']."'",$link);
	echo 'Tienda eliminado con exito !!';
}
else{
	Redirecciona(SITE);
}
?>