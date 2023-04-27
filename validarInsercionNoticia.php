<?php
    require_once './includes/noticia.php';
    $mensaje = "";
    $ret=false;
    if(isset($_POST["titulo"],$_POST["descripcion"],$_POST["fecha"],$_POST["imagen"])&&$_POST["titulo"]!=''&&$_POST["descripcion"]!=''&&$_POST["fecha"]!=''&&$_POST["imagen"]!=''){
        $titulo = $_POST["titulo"];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $imagen = $_POST['imagen'];
        $ret = Noticia::crea($titulo,$descripcion,$fecha,$imagen);
    }
    if($ret==true){
        $mensaje =  "Su inserción se ha realizado con éxito";
    }
    else{
        $mensaje = "Error en la inserción, vuelva a intentarlo";
    }
    
    header("Location:insertarNoticia.php?mensaje=$mensaje");
    
?>
