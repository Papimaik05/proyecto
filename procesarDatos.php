<?php

require_once './includes/config.php';
require_once './includes/Usuario.php';

$formEnviado1 = isset($_POST['emailnuevo']);
$formEnviado2 = isset($_POST['contrnuevo']);

if (! $formEnviado1 && ! $formEnviado2 ) {
	header('Location: micuenta.php');
	exit();
} 
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css" />
        <title>procesarDatos</title>
    </head>

<body>

            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
        <div class="container">
	        <article>  
                <?php
                 $sinerrores=true;

                 if($formEnviado1){

                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                       echo '<h3>ERROR: El email no es valido <br></h3>';
                       $sinerrores=false;
                    }
                 }
                 if($formEnviado2){
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
                 }
                 
                 if($sinerrores){
                    $username =  $_SESSION['nombre'];

                    if($formEnviado1){
                        $email = $_POST['email'];
                    }
                    else{
                        $email = $_SESSION['email'];
                    }

                    if($formEnviado2){
                        $password = Usuario::hashPassword($_POST['contr']);
                    }
                    else{
                        $password = $_SESSION['contr'];
                    }
                    $rol=$_SESSION['rol'];
                    $puntos=$_SESSION['puntos'];
                    Usuario::cambioDatos($username, $password, $email,$rol,$puntos);
                    $_SESSION['login'] = true;
                    $_SESSION['nombre'] = $username;
                    $_SESSION['puntos'] = $puntos;
                    $_SESSION['rol'] = $rol;
                    $_SESSION['email'] = $email;
                    $_SESSION['contr'] = $password;
                    $_SESSION['level'] = level::getNombre(level::getLevel($_SESSION["puntos"]));
                    $_SESSION['carrito'] = array();
                    header('Location: micuenta.php');
                 }

                echo '<br><br>';
	            echo '<form action="procesarDatos.php" method="post">';
                echo '<fieldset>';
                echo '<legend><b>Actualizar Email</b></legend>';
                echo 'Email :<br><input type="email" name="email" >'; 
                echo '</fieldset>';
                echo '<br>';
                echo '<button type="submit" name="emailnuevo">Actualizar email</button>';
                echo '<br><br>';
	            echo '<form action="procesarDatos.php" method="post">';
                echo '<fieldset>';
                echo '<legend><b>Actualizar contraseña</b></legend>';
                echo 'Contraseña :<br><input type="password" name="contr" >'; 
                echo '<br>';
                echo 'Repita Contraseña :<br><input type="password" name="contr2" >'; 
        
                echo '</fieldset>';
                echo '<br>';
                echo '<button type="submit" name="contrnuevo">Actualizar contraseña</button>';
                echo '<br><br>';
            
                    
                    ?>        
                    </article>
                    </div>  
                </main> 
                <?php
                    require('./includes/comun/pie.php');
                ?>        
              
        </body>
        </html>