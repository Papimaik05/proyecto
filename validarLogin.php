<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
require_once './includes/level.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css" />
        <title>validarLogin</title>
    </head>

<body>
        <?php
            require('./includes/comun/cabecera.php');
        ?>     
	    <main>
	        <article>  
                <?php
                $sinerrores=true;
                $coinciden=false;

                $nombreUsuario = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ( ! $nombreUsuario || empty($nombreUsuario=trim($nombreUsuario)) ) {
                    echo '<h3>ERROR: El nombre de usuario no puede estar vacío <br></h3>';
                    $sinerrores=false;
                }
                
                $password = filter_input(INPUT_POST, 'contr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ( ! $password || empty($password=trim($password)) ) {
                    echo '<h3>ERROR: El password no puede estar vacío <br></h3>';
                    $sinerrores=false;
                }

                if($sinerrores){
                    $usuario = Usuario::login($nombreUsuario, $password);
                    if (!$usuario) {
                        $coinciden=true;
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
                if($coinciden){
                    echo "<h3>ERROR: El usuario o password no coinciden <br></h3>";
                }
                echo '<form action="validarLogin.php" method="post">';
                echo '<fieldset>';
                echo '<legend>DATOS USUARIO</legend>';
                echo 'Usuario : <br><input type="text" name="nombre" > ';
                echo '<br>';
                echo 'Contraseña :<br><input type="password" name="contr" >'; 
                echo '</fieldset>';
                echo '<br>';
                echo '<button type="submit" name="aceptar">Login</button>';                  
                ?>
            <br><br><br><br><br>
        </form>
	        </article>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
        
</body>
</html>