<?php
	include '../load/functions.php';	
	$link=Conecta();
	$result=mysql_query("select * from user where user='".base64_encode($_POST['user'])."' and password='".base64_encode($_POST['password'])."'",$link);
	if($row=mysql_fetch_object($result)){
			session_start();
			$_SESSION['user']=$_POST['user'];
			$_SESSION['password']=$_POST['password'];
			$_SESSION['welcome']='1';
			$_SESSION['iduser']=$row->iduser;
			$_SESSION['root']=ADMIN;
			Redireccionauto(ADMINISTRADOR."dentro.php");	
	}
	else{
		Redireccionauto(ADMINISTRADOR."index.php?e=1");
	}
?>