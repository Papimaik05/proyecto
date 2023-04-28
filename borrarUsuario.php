<?php
    require_once __DIR__.'/includes/Usuario.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href= "./css/style.css" rel="stylesheet" type="text/css">
        <title>Borrar Usuario</title>
    </head>

    <body>

        <?php
            require ('./includes/comun/cabecera.php');
        ?>

        <main>
            <div class="container">
                <div class="borrar">
                    <?php
                        $_SESSION["diferenciar"]="Usuario";
                        $usuarios = Usuario::cargarUsuarios(); 
                        
                        if (isset($_GET["mensaje"])) {
		                     echo "<p>" . $_GET["mensaje"] . "</p>";
	                    } 
                        foreach($usuarios as $u){
                            $nombreaux = $u->getNombreUsuario();
                        }
                        if(empty($usuarios)||$_SESSION["nombre"]==$nombreaux){
                             echo '<h2>No hay usuarios en la Base de Datos</h2>'; 
                        }
                        else{
                            echo '<form action="validarBorrado.php" method="post">';    
                            echo '<label>Lista de Usuarios:</label>';
                            echo '<ul>';
                            foreach($usuarios as $u){
                                $nombre = $u->getNombreUsuario();
                                if($_SESSION["nombre"]!=$nombre){
                                    echo "<li><input type='checkbox' name='usuarios[]' value='". $nombre ."'> ". $nombre ."</li>";
                                }
                            }
                
                            echo '</ul>';
                            echo '<br>';
                            echo '<input type="submit" value="Enviar">';
                            echo '</form>';
                            }
                    ?>
                </div>
            </div>
        </main>

        <?php 
            require('./includes/comun/pie.php');
        ?>
    </body>
</html>