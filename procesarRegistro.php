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

            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
        <div class="container" id="login">  
                <?php
                 $sinerrores=true;
                 $existe=false;

                 $username = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $username || empty($username=trim($username))) {
                    $errornombre="ERROR: El nombre de usuario no puede estar vacío";
                    $sinerrores=false;
                 }
                 
                 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erroremail="ERROR: El email no es valido";
                    $sinerrores=false;
                 }
                 
                 $password = filter_input(INPUT_POST, 'contr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $password || empty($password=trim($password)) || mb_strlen($password) < 3 ) {
                    $errorpass="ERROR: El password tiene que tener una longitud de al menos 3 caracteres";
                    $sinerrores=false;
                 }
                 
                 $password2 = filter_input(INPUT_POST, 'contr2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $password2 || empty($password2=trim($password2)) || $password != $password2 ) {
                    $errorcoinciden="ERROR: Los password deben coincidir";
                    $sinerrores=false;
                 }

                 if($sinerrores){
                    $usuario = Usuario::crea($username, $password, $email);
                    if (!$usuario) {
                        $error="ERROR: El usuario ya existe";
                        header('Location:registro.php?error='.$error.'');
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
                 else{
                    $error=$errornombre.'<br>'.$erroremail.'<br>'.$errorpass.'<br>'.$errorcoinciden;
                    header('Location:registro.php?error='.$error.'');
                 }
                ?>
            </div>            
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
     
</body>
</html>