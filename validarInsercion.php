<?php
    require_once './includes/Producto.php';
    $mensaje = "";
    $nombre = $_POST["nombre"];
    $descripcion = $_POST['descripcion'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $ret = Producto::crea($nombre,$descripcion,$unidades,$precio,$imagen);
    if($ret==true){
        $mensaje =  "Su inserción se ha realizado con éxito";
    }
    else{
        $mensaje = "Error en la inserción, vuelva a intentarlo";
    }
    header("Location:insertarProducto.php?mensaje=$mensaje");

?>
