<?php

require_once './includes/config.php';
require_once './includes/Usuario.php';

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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>procesarRegistro</title>
    </head>

<body>
    <div style="text-align:center;">
            <?php
            require ('cabecera.php');
            ?>
	    <main>
	        <article>  
                <br><br><br>
                <?php
                 $sinerrores=true;
                 $username = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $username || empty($username=trim($username))) {
                    echo "<h2>ERROR: El nombre de usuario no puede estar vacío <br></h2>";
                    $sinerrores=false;
                 }
                 
                 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<h2>ERROR: El email no es valido <br></h2>";
                    $sinerrores=false;
                 }
                 
                 $password = filter_input(INPUT_POST, 'contr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $password || empty($password=trim($password)) || mb_strlen($password) < 3 ) {
                    echo "<h2>ERROR: El password tiene que tener una longitud de al menos 3 caracteres <br></h2>";
                    $sinerrores=false;
                 }
                 
                 $password2 = filter_input(INPUT_POST, 'contr2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                 if ( ! $password2 || empty($password2=trim($password2)) || $password != $password2 ) {
                    echo "<h2>ERROR: Los password deben coincidir <br></h2>";
                    $sinerrores=false;
                 }

                 if($sinerrores){
                    $usuario = Usuario::crea($username, $password, $email);
                    if (!$usuario) {
                        echo "<h2>El usuario ya existe <br></h2>";
                    } else {
                        $_SESSION['login'] = true;
                        $_SESSION['nombre'] = $usuario->getNombreUsuario();

                        echo "<h2>Bienvenido $nombreUsuario ,suerte Bajo el Mar  <br></h2>";
                        //$_SESSION['esAdmin'] = $usuario->tieneRol(Usuario::ADMIN_ROLE);
                        //header('Location: index.php');
                        //exit();
                    }
                 }
                 else{
                    echo "<h2>Hay errores y no se ha podido llevar a cabo el registro <br></h2>";
                 }    
                ?>
            <br><br><br><br><br>
        </form>
	        </article>
	    </main> 
        <?php
            require('pie.php');
        ?>        
    </div>     
</body>
</html>