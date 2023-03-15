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
                        $_SESSION['puntos'] = 0;
                        $_SESSION['rol'] = "usuario";
                        header('Location: index.php');
                        //$_SESSION['esAdmin'] = $usuario->tieneRol(Usuario::ADMIN_ROLE);
                        //header('Location: index.php');
                        //exit();
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
            require('pie.php');
        ?>        
    </div>     
</body>
</html>