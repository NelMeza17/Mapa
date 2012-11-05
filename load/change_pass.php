<?php
include ('functions.php');
if(sesion()){
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
else {
 	Redireccionauto(SITE);   
}
?>