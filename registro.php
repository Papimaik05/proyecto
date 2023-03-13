<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Registro</title>
    </head>

<body>
    <div style="text-align:center;">
            <?php
            require ('cabecera.php');
            ?>
	    <main>
	        <article>  
                <br><br><br>
            <form action="procesarRegistro.php" method="post">
            <fieldset>
                <legend><b>DATOS REGISTRO</b></legend>
                Nombre Usuario : <br><input type="text" name="nombre" > 
                <br>
                Email :<br><input type="text" name="email" > 
                <br>
                Contraseña :<br><input type="text" name="contr" > 
                <br>
                Repita Contraseña :<br><input type="text" name="contr2" > 
        
            </fieldset>
            <br>
            <input type="submit" name="registro">
            <br><br><br><br><br>
        </form>
	        </article>
	    </main> 
        <?php
            require('pie.php');
        ?>        
    </div>     
</body>
</html>