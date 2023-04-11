<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css" />
        <title>Registro</title>
    </head>

<body>
<div class="container">
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
	        <article>  
                <br><br><br>
            <form action="procesarRegistro.php" method="post">
            <fieldset>
                <legend>DATOS REGISTRO</legend>
                Nombre Usuario : <br><input type="text" name="nombre" > 
                <br>
                Email :<br><input type="text" name="email" > 
                <br>
                Contraseña :<br><input type="password" name="contr" > 
                <br>
                Repita Contraseña :<br><input type="password" name="contr2" > 
        
            </fieldset>
            <br>
            <button type="submit" name="registro">Registrar</button>
            <br><br><br><br><br>
        </form>
	        </article>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
    </div>     
</body>
</html>