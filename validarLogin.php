<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
require_once './includes/level.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>validarLogin</title>
    </head>

<body>
        <?php
            require('./includes/comun/cabecera.php');
        ?>     
	    <main>
        <div class="container" id="login">  
                <?php
                    $sinerrores=true;

                    $nombreUsuario = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    if ( ! $nombreUsuario || empty($nombreUsuario=trim($nombreUsuario)) ) {
                        $errornombre="ERROR: El nombre de usuario no puede estar vacío";
                        $sinerrores=false;
                    }
                
                    $password = filter_input(INPUT_POST, 'contr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    if ( ! $password || empty($password=trim($password)) ) {
                        $errorpass="ERROR: El password no puede estar vacío";
                        $sinerrores=false;
                    }

                    if($sinerrores){
                        $usuario = Usuario::login($nombreUsuario, $password);
                        if (!$usuario) {
                            $error="ERROR: El usuario o password no coinciden";
                            header('Location:login.php?error='.$error.'');
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
                        $error=$errornombre.'<br>'.$errorpass;
                        header('Location:login.php?error='.$error.'');
                    }
                ?>
            </div>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
       
</body>
</html>