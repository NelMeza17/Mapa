<?php
	include 'load/functions.php';	
	$link=Conecta();
	$result=mysql_query("select * from user where user='".$_POST['user']."' and password='".$_POST['password']."'",$link);
	if($row=mysql_fetch_object($result)){
			session_start();
			$_SESSION['user']=$_POST['user'];
			$_SESSION['password']=$_POST['password'];
			$_SESSION['iduser']=$row->iduser;
			$_SESSION['welcome']='1';
			$_SESSION['root']='0';
			Redireccionauto("user/index.php");
	}
	else{
		Redireccionauto("login.php?e=1");
	}
?>
