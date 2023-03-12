<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Login</title>
    </head>

<body>
            <?php
            require ('cabecera.php');
            ?>
	    <main>
	        <article>  
                <br><br><br>
            <form action="validarLogin.php" method="post">
            <fieldset>
                <legend><b>DATOS USUARIO</b></legend>
                Usuario : <br><input type="text" name="nombre" > 
                <br>
                Contraseña :<br><input type="text" name="contr" > 
        
            </fieldset>
            <br>
            <input type="submit" name="aceptar">
            <br><br><br><br><br>
        </form>
	        </article>
	    </main> 
        <?php
            require('pie.php');
        ?>        
  
</body>
</html>