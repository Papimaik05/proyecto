<?php
    require_once './includes/config.php';
    require_once './includes/comentario.php';
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
                        echo "No hay comentariosen este foro";
                    }
                    foreach($comentarios as $comentario){

                ?>
                        <section class="comment-box">
                            <?php
                            echo '<h3 class="user-name"><'. $comentario->getUsuario() .'</h3>';
                            echo '<h3 class="user-name">Usuario</h3>';?>
                            <h3 class="title"><?php $comentario->getTitulo()?></h3>
                            <p><?php $comentario->getContenido()?></p>
                            <p class="created-at"><?php $comentario->getFecha()?></p>
                            <a href="#" class="reply-btn">Responder</a>
                            <button class="like-btn">Me gusta</button>
                            <span class="like-count"><?php $comentario->getMeGusta()?></span>
                    </section>
                <?php
                    }
                ?>
                <form action="#" method="POST">
                    <h3>Responder</h3>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <br>
                    <label for="comentario">Comentario:</label>
                    <br>
                    <textarea id="comentario" name="comentario" required></textarea>
                    <br>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </main>
        <?php
            require('./includes/comun/pie.php');
        ?> 

</html>