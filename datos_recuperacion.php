<?php
	include ('load/functions.php');
	if(!sesion()){
?>
<html>
    <?
    include ('load/head.php');
    ?>
    <script language="javascript">
		$(document).ready(function(){
			<?php 
			$a = rand(0, 10);
			$b = rand(0, 10);
			$suma = $a + $b;
			?>
			$('.clase1').html(<?=$a?>);
			$('.clase2').html(<?=$b?>);
		});
	</script>
    </head>
    <body>
    	
        <div id="content" class="login">
        	<center><a title="Inicio" href="<?=SITE?>"><div id="banner"></div></a></center>	
            <h2 style="color: white"><img src="images/locked.png" alt="" />Recuperar Contraseña</h2>
            <form action="load/recupera_pass.php" method="POST" id='recupera_pass'>
                <div class="input">
                    <input type="mail" id="mail" name='mail' placeholder="Ingresa E-mail" required="required"/>
                </div>
                <div id="numeros">
                	<div id="c1">
                		<span class="clase1"></span>
                	</div> 
                	<div id="c2">
                		<span class="clase2"></span>
                	</div> 
                </div>
                <div class='input captcha'>	
                	<input class='left' type="text" name="captcha" id="captcha" maxlength="2" size="6" style='width: 250px;' placeholder="Ingrese la suma de los dos n&uacute;meros"/>
                </div>
                <input type='hidden' name='suma' value="<?=$suma?>" />
                <center><div id="ajax_loader"><img id="loader_gif" src="<?=IMAGES?>ajax-loader.gif" style='display: none;'/></div></center>
                <div class="submit">        	
                    <input id='btn_recuperar' class="boton" type="submit" value="Recuperar"/>
                </div>
            </form>
        </div>        
    </body>
</html>
<?php
	}
	else {
		Redireccionauto(USER);
	}
?>