<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css" />
        <title>Index</title>
    </head>

<body>
    
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
	        <article>  
                <br>          
                <img src="./img/logo.jpg"  width ="580"  height ="480"  alt="logotipo">
                <br>
                <?php
                if(isset($_SESSION['login'])){
                    echo '<h2>Bienvenido, ya eres un Amigo Marino!</h2><br>';
                }
                else{
                ?>
                    <button onclick="window.location.href='login.php'" type="button"  > Inicio de Sesión</button>
                    <button onclick="window.location.href='registro.php'" type="button" > Registrate</button>
                <?php
                }
                ?>
	        </article>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
        
</body>
</html>