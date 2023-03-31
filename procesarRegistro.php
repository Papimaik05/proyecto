<?php

require_once './includes/config.php';
require_once './includes/Usuario.php';
require_once './includes/level.php';

$formEnviado = isset($_POST['registro']);
if (! $formEnviado ) {
	header('Location: registro.php');
	exit();
} 
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>procesarRegistro</title>
    </head>

<body>
    <div >
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
	        <article>  
                <?php
                 $sinerrores=true;
                 $existe=false;
                 $username = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $username || empty($username=trim($username))) {
                    echo '<h3>ERROR: El nombre de usuario no puede estar vacío <br></h3>';
                    $sinerrores=false;
                 }
                 
                 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<h3>ERROR: El email no es valido <br></h3>';
                    $sinerrores=false;
                 }
                 
                 $password = filter_input(INPUT_POST, 'contr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $password || empty($password=trim($password)) || mb_strlen($password) < 3 ) {
                    echo '<h3>ERROR: El password tiene que tener una longitud de al menos 3 caracteres <br></h3>';
                    $sinerrores=false;
                 }
                 
                 $password2 = filter_input(INPUT_POST, 'contr2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $password2 || empty($password2=trim($password2)) || $password != $password2 ) {
                    echo '<h3>ERROR: Los password deben coincidir <br></h3>';
                    $sinerrores=false;
                 }

                 if($sinerrores){
                    $usuario = Usuario::crea($username, $password, $email);
                    if (!$usuario) {
                        $existe=true;
                    } else {
                        $_SESSION['login'] = true;
                        $_SESSION['nombre'] = $usuario->getNombreUsuario();
                        $_SESSION['puntos'] = $usuario->getPuntos();
                        $_SESSION['rol'] = $usuario->getRol();
                        $_SESSION['email'] = $usuario->getEmail();
                        $_SESSION['contr'] = $usuario->getContr();
                        $_SESSION['level'] = level::getNombre(level::getLevel($_SESSION["puntos"]));
                        $_SESSION['carrito'] = array();
                        header('Location: index.php');
                    }
                 }
                    if($existe){
                        echo '<h3>ERROR: El usuario ya existe <br></h3>';
                    }

                    echo ' <form action="procesarRegistro.php" method="post">';
                    echo ' <fieldset>';
                    echo ' <legend>DATOS REGISTRO</legend>';
                    echo ' Nombre Usuario : <br><input type="text" name="nombre" > ';
                    echo ' <br>';
                    echo ' Email :<br><input type="text" name="email" >'; 
                    echo ' <br>';
                    echo ' Contraseña :<br><input type="password" name="contr" >'; 
                    echo ' <br>';
                    echo ' Repita Contraseña :<br><input type="password" name="contr2" > ';
    
                    echo ' </fieldset>';
                    echo '<br>';
                    echo ' <button type="submit" name="registro">Registrar</button>';
                     
                ?>        
	        </article>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
    </div>     
</body>
</html>