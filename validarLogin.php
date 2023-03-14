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
                <br><br><br>
                <?php
                $sinerrores=true;

                $nombreUsuario = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ( ! $nombreUsuario || empty($nombreUsuario=trim($nombreUsuario)) ) {
                    echo "<h2>El nombre de usuario no puede estar vacío <br></h2>";
                    $sinerrores=false;
                }
                
                $password = filter_input(INPUT_POST, 'contr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ( ! $password || empty($password=trim($password)) ) {
                    echo "<h2>El password no puede estar vacío <br></h2>";
                    $sinerrores=false;
                }

                if($sinerrores){
                    $usuario = Usuario::login($nombreUsuario, $password);
                    if (!$usuario) {
                        echo "<h2>El usuario o password no coinciden <br></h2>";
                    } else {
                        $_SESSION['login'] = true;
                        $_SESSION['nombre'] = $usuario->getNombreUsuario();
                        $_SESSION['puntos'] = $usuario->getPuntos();
                        $_SESSION['rol'] = $usuario->getNombreRol($usuario);
                        header('Location: index.php');
                        //echo "<h2>Bienvenido $nombreUsuario ,suerte Bajo el Mar  <br></h2>";
                        //$_SESSION['esAdmin'] = $usuario->tieneRol(Usuario::ADMIN_ROLE);
                        //header('Location: index.php');
                        //exit();
                    }
                }
                else{
                    echo "<h2>Hay errores y no se ha podido llevar a cabo el login <br></h2>";
                    
                }            
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