<?php
    require_once __DIR__.'/includes/Experiencia.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href= "./css/style.css" rel="stylesheet" type="text/css">
        <title>Borrar experiencia</title>
    </head>

    <body>

        <?php
            require ('./includes/comun/cabecera.php');
        ?>

        <main>
            <div class="container">
                <div class="borrar">
                    <?php
                        $_SESSION["diferenciar"]="Experiencia";
                        $experiencias = Experiencia::cargarExperiencias(); 
                        
                        if (isset($_GET["mensaje"])) {
		                     echo "<p>" . $_GET["mensaje"] . "</p>";
	                    } 
                        if(empty($experiencias)){
                             echo '<h2>No hay experiencias en la tienda</h2>'; 
                        }
                        else{
                            echo '<form action="validarBorrado.php" method="post">';    
                            echo '<label>Lista de Experiencias:</label>';
                            echo '<ul>';
                            foreach($experiencias as $p){
                                $id = $p->getId();
                                $nombre = $p->getNombre();
                                echo "<li><input type='checkbox' name='experiencias[]' value='". $id ."'> ". $nombre ."</li>";
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