<?php
    require_once './includes/comentario.php';


    $idComentario = $_POST['idComentario'];

    // Actualizar el valor en la base de datos
    $comentario = comentario::buscaPorId($idComentario);
    $comentario->actualizarMeGustas();

    // Obtener el nuevo valor del "Me gusta" para ese comentario y devolverlo como respuesta
    $nuevoValorMeGusta = $comentario->getMeGusta(); // Aquí se puede obtener el valor actualizado de la base de datos
    echo $nuevoValorMeGusta;
?>