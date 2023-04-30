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
                        echo "No hay comentarios en este foro";
                    }
                    foreach($comentarios as $comentario){

                ?>
                        <section class="comment-box">
                            <?php
                            echo $comentario->getUsuario();
                            echo '<h3><'. $comentario->getUsuario() .'</h3>';?>
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
                <?php
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

</html>