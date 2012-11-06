<?php
	include ('load/functions.php');
	if(!sesion()){
?>
<html>
    <?
    include ('load/head.php');
    ?>
    </head>
    <body class="wood">
        <div id="content" class="login">
        	<center><a title="Inicio" href="<?=SITE?>"><div id="banner"></div></a></center>	
            <h2 style="color: white"><img src="images/locked.png" alt="" />Nuevo Usuario</h2>
            <form action="alta_user.php" method="POST" id='form_new_user'>
                <div class="input">
                    <input type="text" id="login" name='user' placeholder=" Ingresa Usuario" maxlength="8" required="required"/>
                </div>
                
                <div class="input">
                    <input type="password" id="pass" name="password" placeholder=" Ingresa Contraseña" maxlength="12" required="required"/>
                </div>
				
				<div class="input">
                    <input type="password" id="pass2" name='password2' placeholder="Confirmar Contraseña" maxlength="12" required="required"/>
                </div>
				
				<div class="input">
                    <input type="email" id="email" name='email' placeholder="Ingresa e-mail" required="required"/>
                </div>
				<center><div id="ajax_loader"><img id="loader_gif" src="<?=IMAGES?>ajax-loader.gif" style='display: none;'/></div></center>
                <div class="submit">
                    <input id='btn_new_user' class="boton" type="submit" value="Registrarme"/>
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