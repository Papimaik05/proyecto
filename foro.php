<?php
    require_once './includes/config.php';
    require_once './includes/comentario.php';
?>
<?php
    function mostrarComentario($comentario){
        ?>  
            <div class="container">
            <div class="comment-box">
                <p class="user-name"><?php echo $comentario->getUsuario();
                echo '<h3><'. $comentario->getUsuario() .'</h3>';?></p>
                <h3 class="comment-title"><?php echo $comentario->getTitulo()?></h3>
                <p class="comment-text"><?php echo $comentario->getContenido()?></p>
                <p class="created-at"><?php echo $comentario->getFecha()?></p>
           
                <button onclick="mostrarFormRespuesta('<?php echo $comentario->getId(); ?>')">Responder</button>
                <button class="like-btn">Me gusta</button>
            </div>
                <?php
                echo '<form id="formRespuesta'.$comentario->getId().'" style="display:none;" method = "post" action="añadirComentario.php?id='.$comentario->getId().'">';
                    ?>
                    
                    <h3>Responder al comentario:</h3>
                    <label for="titulo">Titulo:</label>
                    <input type="text" id="titulo" name="titulo" required>
                    <br>
                    <label for="contenido">Comentario:</label>
                    <br>
                    <textarea id="contenido" name="contenido" required></textarea>
                    <br>
                    <button type="submit">Enviar</button>
                </form>
                <span class="like-count"><?php $comentario->getMeGusta()?></span>
            
            </div>
            <div class="respuestas">
                <?php
                $respuestas = $comentario->cargarRespuestas();
                if($respuestas!=false){
                    foreach($respuestas as $respuesta){
                        mostrarComentario($respuesta);
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

                <h2>Título del hilo de discusión</h2>
                <?php
                    $comentarios = comentario::cargarComentarios();
                    if($comentarios == false){
                        echo "No hay comentarios en este foro";
                    }
                    foreach($comentarios as $comentario)
                    {
                        if($comentario->getPadre() == 0)
                        {
                            mostrarComentario($comentario);
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
        <script>
            function mostrarFormRespuesta(id){
                var formulario = document.getElementById("formRespuesta" + id);
                formulario.style.display = "block";
            }
        </script>
</html>