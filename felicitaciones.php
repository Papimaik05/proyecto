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
<div class="container">
            <?php
            require ('./includes/comun/cabecera.php');
            echo"<h2> Ahora tienes: ". $_SESSION['puntos']." puntos</h2>";
            ?>
            <img src="./img/felicitaciones.gif">
            <h2>Gracias por confiar en nosotros</h2>
            <button onclick="window.location.href='tienda.php'" type="button" > Tienda/Experiencias</button>
            <?php
            require('./includes/comun/pie.php');
        ?>        
  </div>      
</body>
</html>