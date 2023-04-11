<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css?v=3415" />
        <title>Index</title>
    </head>

<body>

            <?php
            require ('./includes/comun/cabecera.php');
            
            ?>
	    <main>
            <h1> Datos de sesión </h1>
            <ul class="lista-datos">
            <li class="dato">
                <span class="dato-titulo">Nombre de usuario:</span>
                <span class="dato-valor"><?php echo $_SESSION['nombre'] ?></span>
            </li>
            <li class="dato">
                <span class="dato-titulo">Correo electrónico:</span>
                <span class="dato-valor"><?php echo $_SESSION['email'] ?></span>
            </li>
            <li class="dato">
                <span class="dato-titulo">Puntos:</span>
                <div class="barra">
                    <div class="nivel" style="width: <?php echo $_SESSION['puntos']?>%;"></div>
                </div>
            </li>
            </ul>
        <div class="container">
            Tienes
            <?php 
            echo $_SESSION['puntos']." puntos"; 
            ?>

            <br><br>

            Nivel:
            <?php 
             echo ucfirst($_SESSION['level'])  ;
            ?>

            <br><br>
	        <form action="procesarDatos.php" method="post">
            <fieldset>
                <legend><b>Actualizar Email</b></legend>
                Email :<br><input type="email" name="email" > 
                <br><br><br>
                <button type="submit" name="emailnuevo">Actualizar email</button>  
            </fieldset>
            <br><br>

	        <form action="procesarDatos.php" method="post">
            <fieldset>
                <legend><b>Actualizar contraseña</b></legend>
                Contraseña :<br><input type="password" name="contr" > 
                <br>
                Repita Contraseña :<br><input type="password" name="contr2" > 
            <br><br><br>
            <button type="submit" name="contrnuevo">Actualizar contraseña</button>
            </fieldset>
            <br><br>
            <fieldset>
            <a id="link" href="historialpedidos.php" class="button">Historial de pedidos</a>
            </fieldset>
            </div>  
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
        
</body>
</html>