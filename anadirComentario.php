<?php
    require_once './includes/comentario.php';


    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $meGusta = 0;
    $usuario = $_SESSION['nombre'];
    if(isset($_GET["id"])){
        $padre = $_GET["id"];
    }
    else{
        $padre = 0;
    }
    $fecha_de_creacion = date('Y-m-d');

    comentario::crea($titulo, $usuario, $padre,$contenido,$fecha_de_creacion, $meGusta);

    header('Location: foro.php');

?>