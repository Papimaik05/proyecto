<?php
    require_once './includes/config.php';
    require_once './includes/comentario.php';
?>
<?php
    function mostrarComentario($comentario, $nivel){
        ?>  
            <div class="hilo">
                <div class="comment-box">
                    <p class="user-name"><?php echo $comentario->getUsuario();?></p>
                    <h3 class="comment-title"><?php echo $comentario->getTitulo()?></h3>
                    <p class="comment-text"><?php echo $comentario->getContenido()?></p>
                    <p class="created-at"><?php echo $comentario->getFecha()?></p>
                    <button onclick="mostrarFormRespuesta('<?php echo $comentario->getId(); ?>')">Responder</button>
                    <?php echo '<button id="boton-me-gusta-'.$comentario->getId().'" class="like-btn" onclick="darMeGusta('.$comentario->getId().')">Me gusta</button>'?>
                    <div class="contador-me-gusta">
                        <?php echo '<p id="contador-me-gusta-'.$comentario->getId().'">'.$comentario->getMeGusta().' me gusta</p>'?>
                    </div>
                </div>
                <div class="form_respuesta">
                    <?php
                    echo '<form id="formRespuesta'.$comentario->getId().'" style="display:none;" method = "post" action="anadirComentario.php?id='.$comentario->getId().'">';
                        ?>
                        <h3>Responder al comentario:</h3>
                        <label for="titulo">Titulo:</label>
                        <input type="text" class="titulo" name="titulo" required>
                        <br>
                        <label for="contenido">Comentario:</label>
                        <br>
                        <textarea class="contenido" name="contenido" required></textarea>
                        <br><br>
                        <button type="submit" class="aux_padbot">Enviar</button>
                    </form>
                </div>
                <span class="like-count"><?php $comentario->getMeGusta()?></span>
            
            </div>
            <div class="respuestas">
                <?php
                $respuestas = $comentario->cargarRespuestas();
                if($respuestas!=false){
                    foreach($respuestas as $respuesta){
                        ?>
                        <div class="container_respuesta">
                            <?php
                            $nivNuevo = $nivel + 1;
                            mostrarComentario($respuesta, $nivNuevo);
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
        <title>Foro</title>
    </head>

    <body>
        <?php
            require ('./includes/comun/cabecera.php');
        ?>

        <main>
            <div class="container">

                <h1>Comparte tu experiencia!</h1>
                <?php
                    $comentarios = comentario::cargarComentarios();
                    if($comentarios == false){
                        echo "No hay comentarios en este foro";
                    }
                    foreach($comentarios as $comentario)
                    {
                        if($comentario->getPadre() == 0)
                        {
                            echo "<div class='conversacion'>";
                            mostrarComentario($comentario, 0);
                            echo "</div>";
                        }
                    }
                
                if(isset($_SESSION['login'])){
                    ?>
                    <form action="añadirComentario.php" method="POST">
                        <h3>Añadir un comentario:</h3>
                        <label for="titulo">Titulo:</label>
                        <input type="text" id="titulo" name="titulo" required>
                        <br><br>
                        <label for="contenido">Comentario:</label>
                        <br>
                        <textarea id="contenido" name="contenido" required></textarea>
                        <br>
                        <button type="submit">Enviar</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </main>
        <?php
            require('./includes/comun/pie.php');
        ?> 
        <script src="./js/foro.js"></script>
</html>