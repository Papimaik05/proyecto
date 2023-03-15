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
            <?php
            if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)){ 
                
            } 
            ?>
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

            <br>

            Nivel:
            <?php 
             echo $_SESSION['level']  ;
            ?>

            <br><br>
	        <form action="procesarDatos.php" method="post">
            <fieldset>
                <legend><b>Introduce nuevos datos</b></legend>
                Nombre Usuario : <br><input type="text" name="nombre" > 
                <br>
                Email :<br><input type="text" name="email" > 
                <br>
                Contraseña :<br><input type="password" name="contr" > 
                <br>
                Repita Contraseña :<br><input type="password" name="contr2" > 
        
            </fieldset>
            <br>
            <button type="submit" name="registro">Actualizar datos</button>
            
	    </main> 
        <?php
            require('pie.php');
        ?>        
        
        
        
</body>
</html>