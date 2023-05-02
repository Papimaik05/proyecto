<?php
    require_once './includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Felicitaciones</title>
    </head>

    <body>

            <?php
                require ('./includes/comun/cabecera.php');
            ?>

            <div class="container">
                <div class="contfelicitaciones">
                    <h2>Compra realizada con éxito!!!</h2>
                    <?php
                        echo"<h2> Ahora tienes: ". $_SESSION['puntos']." puntos</h2>";
                    ?>
                    <img src="./img/felicitaciones.gif" id="imgFelicitaciones" alt="imgFelicitaciones">
                    <h2>Gracias por confiar en nosotros</h2>
                    <button onclick="window.location.href='tienda.php'" type="button" > Tienda/Experiencias</button>
                </div>  
            </div>

            <?php
                require('./includes/comun/pie.php');
            ?>        
    </body>
</html>