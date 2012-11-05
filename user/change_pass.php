<?php
	include ('../load/functions.php');
	if(sesion()){
?>
<html>
    <?
    include ('../load/head.php');
    ?>
    </head>
    <body class="wood">
        <div id="content" class="login">
        	<center><a title="Inicio" href="<?=SITE?>"><div id="banner"></div></a></center>	
            <h2 style="color: white"><img src="<?=IMAGES?>locked.png" alt="" />Cambiar Contraseña</h2>
            <form action="../load/change_pass.php" method="POST" id='form_change_pass'>
                <div class="input">
                    <input type="password" id="pass_old" name='password_old' placeholder=" Ingresa Contraseña Anterior" maxlength="12" required="required"/>
                </div>
                
                <div class="input">
                    <input type="password" id="pass_new" name="password_new" placeholder=" Ingresa Nueva Contraseña" maxlength="12" required="required"/>
                </div>
				
				<div class="input">
                    <input type="password" id="pass_nw_conf" name='password_conf' placeholder="Confirmar Nueva Contraseña" maxlength="12" required="required"/>
                </div>
                <center><div id="ajax_loader"><img id="loader_gif" src="<?=IMAGES?>ajax-loader.gif" style='display: none;'/></div></center>
                <div class="submit">
                    <input id='btn_change_pass' class="boton" type="submit" value="Cambiar"/>
                </div>
            </form>
        </div>        
    </body>
</html>
<?php
	}
	else {
		Redireccionauto(SITE);
	}
?>