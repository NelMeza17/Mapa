<?php
include 'load/functions.php';
$fecha=date("Y-m-d");
if(sesion() && !empty($_POST['comentario'])){
	$link=Conecta();
	mysql_query("insert into comentarios values ('null','".$_SESSION['login']."','".$_POST['email']."','".$fecha."','".$_POST['comentario']."')");
	//echo "insert into comentarios values ('null','".$_SESSION['login']."','".$_POST['email']."','".$fecha."','".$_POST['comentario']."')";
	Redireccionauto('user/index.php');
}
else if(!empty ($_POST['nombre'])){
	$link=Conecta();
	mysql_query("insert into comentarios values ('null','".$_POST['nombre']."','".$_POST['email']."','".$fecha."','".$_POST['comentario']."')");
	Redireccionauto('index.php');
}
else{
	if(sesion() && empty($_POST['comentario']))
		Redireccionauto('user/index.php');
	else
		Redireccionauto('index.php');
}
?>