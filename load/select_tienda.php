<?php
include ('functions.php');
if(sesion()){
	$link = Conecta();
	$result=mysql_query("select idtienda, nombre from tienda where iduser='".$_SESSION['iduser']."'", $link);
	echo "<select name='tienda' class='tienda'>
			<option>Selecciona una tienda</option>";
			while($row=mysql_fetch_object($result)){
				echo "<option value='".$row->idtienda."'>".base64_decode($row->nombre)."</option>";
			}
	echo "</select>";
	}
else{
	Redireccionauto(SITE);
}
?>