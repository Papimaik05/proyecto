<?php

require_once './includes/config.php';

unset($_SESSION["login"]);
unset($_SESSION["nombre"]);
if (isset($_SESSION["esadmin"])) { //Usuario incorrecto
    unset($_SESSION["esadmin"]);
}
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Logout</title>
    </head>

    <body>


            <?php
            require ('cabecera.php');
            ?>
	    <main>
	        <article>  
                <h2>Has cerrado la sesión </h2>
                <br>
                <h2>Hasta Pronto!</h2>
	        </article>
	    </main> 
        <?php
            require('pie.php');
        ?>        
        

    </body>
</html>
