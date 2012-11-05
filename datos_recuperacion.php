<?php
	include ('load/functions.php');
	if(!sesion()){
?>
<html>
    <?
    include ('load/head.php');
    ?>
    </head>
    <body>
    	
        <div id="content" class="login">
        	<center><a title="Inicio" href="<?=SITE?>"><div id="banner"></div></a></center>	
            <h2 style="color: white"><img src="images/locked.png" alt="" />Recuperar Contraseña</h2>
            <form action="load/recupera_pass.php" method="POST" id='recupera_pass'>
                <div class="input">
                    <input type="mail" id="mail" name='mail' placeholder="Ingresa E-mail" required="required"/>
                </div>
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