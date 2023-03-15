<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>validarLogin</title>
    </head>

<body>
        <?php
            require('cabecera.php');
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
                        $_SESSION['rol'] = $usuario->getNombreRol($usuario);
                        $_SESSION['email'] = $usuario->getEmail();
                        header('Location: index.php');
                        //echo "<h2>Bienvenido $nombreUsuario ,suerte Bajo el Mar  <br></h2>";
                        //$_SESSION['esAdmin'] = $usuario->tieneRol(Usuario::ADMIN_ROLE);
                        //header('Location: index.php');
                        //exit();
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
            require('pie.php');
        ?>        
        
</body>
</html>