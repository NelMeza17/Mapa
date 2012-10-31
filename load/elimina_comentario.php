<?php
include ('functions.php');
if(sesion_root()){
	$link = Conecta();
	mysql_query("delete from comentarios where idcomentarios='".$_POST['id']."'",$link);
	echo 'Comentario eliminado con exito !!';
}
else{
	Redirecciona(SITE);
}
?>