<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Index</title>
    </head>

    <body>
        <?php
            require ('./includes/comun/cabecera.php');
        ?>
        <main>
            <div class="container">
                <article>  
                    <br>          
                    <img src="./img/logo.jpg" id="logotipo" alt="logo">
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
            </div>
        </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
            
    </body>
</html>