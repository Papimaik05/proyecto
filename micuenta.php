<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Index</title>
    </head>

<body>
    
            <?php
            require ('cabecera.php');
            
            ?>
	    <main>
            Nombre de usuario:
            <br>
            <input type="text" name="nombre"  readonly value="<?php echo $_SESSION['nombre'] ?>">
            <br><br>
            Email:
            <br>
            <input type="email" name="nombre" readonly value="<?php echo $_SESSION['email'] ?>">
            <br><br>
            Tienes: 
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
            </fieldset>
            <br>
            <button type="submit" name="emailnuevo">Actualizar email</button>
            <br><br>

	        <form action="procesarDatos.php" method="post">
            <fieldset>
                <legend><b>Actualizar contraseña</b></legend>
                Contraseña :<br><input type="password" name="contr" > 
                <br>
                Repita Contraseña :<br><input type="password" name="contr2" > 
        
            </fieldset>
            <br>
            <button type="submit" name="contrnuevo">Actualizar contraseña</button>
            <br><br>
            
	    </main> 
        <?php
            require('pie.php');
        ?>        
        
        
        
</body>
</html>