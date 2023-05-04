<?php
    require_once __DIR__.'/includes/Noticia.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href= "./css/style.css" rel="stylesheet" type="text/css">
        <title>Borrar noticia</title>
    </head>

    <body>
        <?php
            require ('./includes/comun/cabecera.php');
        ?>

        <main>
            <div class="container">
                <div class="borrar">
    
                    <?php
                        $_SESSION["diferenciar"]="Noticia";
                        $noticias = Noticia::cargarNoticias();
                        if (isset($_GET["mensaje"])) {
		                    echo "<p>" . $_GET["mensaje"] . "</p>";
	                    }

                        if(empty($noticias)){
                            echo '<h2>No hay noticias todavía</h2>'; 
                        }
                        else{
                            echo '<form action="validarBorrado.php" method="post">';
                            echo '<label>Lista de Noticias:</label>';
                            echo '<ul>';
                            foreach($noticias as $n){
                                $id = $n->getId();
                                $titulo = $n->getTitulo();
                                echo "<li><input type='checkbox' name='noticias[]' value='". $id ."
                                '> ". $titulo ."</li>";
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