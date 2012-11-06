<?php
	include ('load/functions.php');
	if(!empty($_POST['user'])){
		$link = Conecta();
		if(inyeccion($_POST['user']) && inyeccion($_POST['email']) && inyeccion($_POST['password']) && inyeccion($_POST['password2'])){
			$user= mysql_query("select user from user where user='".base64_encode($_POST['user'])."'",$link);
			$email= mysql_query("select email from user where email='".base64_encode($_POST['email'])."'",$link);
			if($row=mysql_fetch_object($user)){
				//echo "<script>window.alert('El nombre de usuario ya existe');</script>";
				//RedireccionJs('new_user.php');
				echo "1";
			}
			else if ($row=mysql_fetch_object($email)){
				//echo "<script>window.alert('El email ya se encuentra registrado');</script>";
				//RedireccionJs('new_user.php');
				echo "2";
			}
			else if ($_POST['password']!=$_POST['password2']){
				// echo "<script>window.alert('Las contraseñas no coiciden');</script>";
				// RedireccionJs('new_user.php');				echo "3";
			}
			else {
				mysql_query("insert into user values('null','".base64_encode($_POST['user'])."','".base64_encode($_POST['password'])."','".base64_encode($_POST['email'])."')", $link);
				// echo "<script>window.alert('Usuario registrado exitosamente!!!');</script>";
				// RedireccionJs('login.php');				echo "4";
			}
		}
		else{
			echo "5";	
		}
	}
	else{
		Redireccionauto(SITE);
	}
		
?>