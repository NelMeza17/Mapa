<?php
include ('functions.php');
if(sesion()){
	if(!ValidaEspacios($_POST['password_old']) || !ValidaEspacios($_POST['password_new']) || !ValidaEspacios($_POST['password_conf'])){
		echo "3";
	}
	else { 
		$link = Conecta();
		$result = mysql_query("select * from user where user='".base64_encode($_SESSION['user'])."' and password='".base64_encode($_POST['password_old'])."'",$link);
		if($count = mysql_num_rows($result)){
			if($_POST['password_new']==$_POST['password_conf']){
				mysql_query("update user set password='".base64_encode($_POST['password_new'])."' where user='".base64_encode($_SESSION['user'])."'",$link);
				$_SESSION['password']=$_POST['password_new'];	
				echo "1";	
			}
			else{
				echo "2";
			}	
			
		} 
		else{
			echo "Contraseña anterior Incorrecta !!!";
		}	
	}
}
else {
 	Redireccionauto(SITE);   
}
?>