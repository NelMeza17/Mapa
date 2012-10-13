<?php
	include '../load/functions.php';	
	$link=Conecta();
	$result=mysql_query("select * from user where user='".$_POST['user']."' and password='".$_POST['password']."'",$link);
	if($row=mysql_fetch_object($result)){
			session_start();
			$_SESSION['login']=$_POST['user'];
			$_SESSION['pass']=$_POST['password'];
			$_SESSION['welcome']='1';
			Redireccionauto("dentro.php");	
	}
	else{
		Redireccionauto("index.php?e=1");
	}
?>
