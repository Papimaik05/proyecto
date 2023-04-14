<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Registro</title>
    </head>

<body>
<?php
require ('./includes/comun/cabecera.php');
?>
<main>
<div class="container" id="login">
    <div class="formulario">
        <h1>Registro</h1>
        <article>  
        <form action="procesarRegistro.php" method="post">
            <div class="username">
                <input type="text" name="nombre" >
                <label>Nombre de Usuario</label>
            </div>
            <div class="username">
                <input type="text" name="email" >
                <label>Email</label>
            </div>
            <div class="username">
                <input type="password" name="contr" >
                <label>Contraseña</label>
            </div>
            <div class="username">
                <input type="password" name="contr2" >
                <label>Repetir contraseña</label>
            </div> 
            <?php
            if(isset($_GET["error"])){
                echo'<h3>'.$_GET["error"].'</h3>';
            }
            ?>    
            <br>
            <button type="submit" name="registro">Registrar</button>
            <br>
        </form>
        </article>
    </div>
</div> 
</main> 
<?php
    require('./includes/comun/pie.php');
?>            
</body>
</html>