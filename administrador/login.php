<?php
	include '../load/functions.php';	
	if(!ValidaEspacios($_POST['user']) || !ValidaEspacios($_POST['password'])){
		echo "4";
	}
	else{	
		$link=Conecta();
		if(inyeccion($_POST['user']) && inyeccion($_POST['password'])){
			$result=mysql_query("select * from user where user='".base64_encode($_POST['user'])."' and password='".base64_encode($_POST['password'])."'",$link);
			if($row=mysql_fetch_object($result)){
					session_start();
					$_SESSION['user']=$_POST['user'];
					$_SESSION['password']=$_POST['password'];
					$_SESSION['welcome']='1';
					$_SESSION['iduser']=$row->iduser;
					$_SESSION['root']=ADMIN;
					//Redireccionauto(ADMINISTRADOR."dentro.php");
					echo "1";	
			}
			else{
				echo "3";
				//Redireccionauto(ADMINISTRADOR."index.php?e=1");
			}
		}
		else{
			echo "2";
		}
	}
?>