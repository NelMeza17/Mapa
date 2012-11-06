<?php
	include 'load/functions.php';	
	$link=Conecta();
	if(inyeccion($_POST['user']) && inyeccion($_POST['password'])){
		$result=mysql_query("select * from user where user='".base64_encode($_POST['user'])."' and password='".base64_encode($_POST['password'])."'",$link);
		if($row=mysql_fetch_object($result)){
				session_start();
				$_SESSION['user']=$_POST['user'];
				$_SESSION['password']=$_POST['password'];
				$_SESSION['iduser']=$row->iduser;
				$_SESSION['welcome']='1';
				$_SESSION['root']='0';
				echo "1";
		}
		else{
			echo "3";
		}
	}
	else{
		echo "2";
	}
?>
