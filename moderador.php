<?php
    require_once './includes/config.php';
    require_once './includes/comentario.php';
?>
<?php
    function mostrarComentario($comentario){
        ?>  
            <div class="hilo">
                <div class="comment-box">
                    <p class="user-name"><?php echo $comentario->getUsuario();?></p>
                    <h3 class="comment-title"><?php echo $comentario->getTitulo()?></h3>
                    <p class="comment-text"><?php echo $comentario->getContenido()?></p>
                    <p class="created-at"><?php echo $comentario->getFecha()?></p>
                    <?php echo '<span id="contador-me-gusta-'.$comentario->getId().'">'.$comentario->getMeGusta().'</span>'?>
                    <ul>
                    <?php echo "<li><input type='checkbox' name='comentarios[]' value='". $comentario->getId() ."'></li>";?>
                    </ul>
                </div>
            </div>
            <div class="respuestas">
                <?php
                $respuestas = $comentario->cargarRespuestas();
                if($respuestas!=false){
                    foreach($respuestas as $respuesta){
                        ?>
                        <div class="container_respuesta">
                        <?php
                        mostrarComentario($respuesta);
                        ?>
                        </div>
                        <?php
                    }
                }?>
            </div>
        <?php
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
        <title>Moderador</title>
    </head>

    <body>
        <?php
            require ('./includes/comun/cabecera.php');
        ?>

        <main>
            <div class="container">
                <?php
                    $comentarios = comentario::cargarComentarios();
                    $_SESSION["diferenciar"]="Comentario";
                    if (isset($_GET["mensaje"])) {
		                echo "<p>" . $_GET["mensaje"] . "</p>";
	                }
                    if($comentarios == false){
                        echo "No hay comentarios en este foro";
                    }
                    else{
                        echo '<form action="validarBorrado.php" method="post">';
                        echo '<h2>Lista de comentarios, seleccione los comentarios a borrar</h2>';
                        foreach($comentarios as $comentario)
                        {
                            if($comentario->getPadre() == 0)
                            {
                                echo "<div class='conversacion'>";
                                mostrarComentario($comentario); 
                                echo "</div>";                           
                            }
                        }
                        echo '<input type="submit" value="Eliminar">';
                        echo '</form>';
                    }
                ?>
            </div>
        </main>
        <?php
            require('./includes/comun/pie.php');
        ?> 
        <script src="./js/foro.js">
           
        </script>
</html>