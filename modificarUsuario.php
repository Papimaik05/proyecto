<?php
    require_once __DIR__.'/includes/Usuario.php';
    require_once __DIR__.'/includes/rol.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
    
        <link href= "./css/style.css?id=1" rel="stylesheet" type="text/css">
        <title>Modificar Usuario</title>
    </head>

    <body>

            <?php
                require ('./includes/comun/cabecera.php');
            ?>
            <main>
            <div class="container">
                <div class="usu">
                    <ul class="modificarUsuarios">

                        <?php
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
                                echo '<form action="validarEdicion.php?es=usuario" method="post">';
                                echo '<label>Selecciona el usuario que quieres modificar:</label>';
                                echo '<br><br>';
                                foreach($usuarios as $u){
                                    $nombre = $u->getNombreUsuario();
                                    if($_SESSION["nombre"]!=$nombre){
                                        echo "<li><input type='radio' name='usuario' value='". $nombre ."
                                    '> ". $nombre ."</li>";
                                    }
                                }
                        
                    echo '</ul>';
                            echo '<label>Ahora selecciona los valores a modificar: </label>';
                            echo '<fieldset>';
                            echo '<label for="email">Email:</label>';
                            echo '<input type="text" name="email" id="email"><br><br>';
                            echo '<label for="rol">Rol:</label>';
                            echo '<select name ="rol" id="rol">';
                            
                            $result=rol::getAllRols();
                            while($row=mysqli_fetch_object($result)){
                                echo "<option>$row->nombre</option>";
                            }
                            echo'</select> <br><br>';
                            echo '<label for="puntos">Puntos:</label>';
                            echo '<input type="number" name="puntos" id="puntos" min="0" max="99"><br><br>';
                            echo '</fieldset>';
                            echo '<input type="submit" value="Enviar">';
                            echo '</form>';
                            }
                        
                        ?>
                </div>
            </div>
                   
            
        <?php 
            require('./includes/comun/pie.php');
        ?>
        </main>
    </body>
</html>