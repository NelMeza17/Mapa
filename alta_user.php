<?php
	include ('load/functions.php');
	if(!empty($_POST['user'])){
		$link = Conecta();
		$user= mysql_query("select user from user where user='".$_POST['user']."'",$link);
		$email= mysql_query("select email from user where email='".$_POST['email']."'",$link);
		if($row=mysql_fetch_object($user)){
			echo "<script>window.alert('El nombre de usuario ya existe');</script>";
			RedireccionJs('new_user.php');
		}
		else if ($row=mysql_fetch_object($email)){
			echo "<script>window.alert('El email ya se encuentra registrado');</script>";
			RedireccionJs('new_user.php');
		}
		else if ($_POST['password']!=$_POST['password2']){
			echo "<script>window.alert('Las contraseñas no coiciden');</script>";
			RedireccionJs('new_user.php');
		}
		else {
			mysql_query("insert into user values('null','".$_POST['user']."','".$_POST['password']."','".$_POST['email']."')", $link);
			echo "<script>window.alert('Usuario registrado exitosamente!!!');</script>";
			RedireccionJs('login.php');
		}
	}
	else{
		Redireccionauto('index.php');
	}
		
?>