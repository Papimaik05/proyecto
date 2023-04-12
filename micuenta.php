<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
require_once './includes/Level.php';
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
            <div class="container">
            <h1> Datos de sesión </h1>
            <ul class="lista-datos">
            <li class="dato">
                <span class="dato-titulo">Nombre de usuario:&nbsp</span>
                <span class="dato-valor"><?php echo $_SESSION['nombre'] ?></span>
            </li>
            <li class="dato">
                <span class="dato-titulo">Correo electrónico:&nbsp</span>
                <span class="dato-valor"><?php echo $_SESSION['email'] ?></span>
            </li>
            <li class="dato">
                <span class="dato-titulo">Nivel:&nbsp</span>
                <span class="dato-valor"><?php echo ucfirst($_SESSION['level']) ?></span>
            </li>
            <li class="dato">
                <?php 
                $nivel = ucfirst($_SESSION['level']);
                $puntos = $_SESSION['puntos'] - level::getMinPuntos($nivel);
                $maximo = level::getMaxPuntos($nivel);
                $porcentaje = ($puntos/($maximo - level::getMinPuntos($nivel))) * 100;
                ?>
                <span class="dato-titulo">Puntos:&nbsp</span>
                <div class="barra">
                    <div class="nivel" style="width: <?php echo $porcentaje?>%;"></div>
                </div>
            </li>
            </ul>
            Tienes  <?php echo $_SESSION['puntos'] ?> puntos (Te quedan <?php echo ($maximo - $_SESSION['puntos']) ?> para el siguiente nivel)
        <div class="container">
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
</div> 
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
        
</body>
</html>