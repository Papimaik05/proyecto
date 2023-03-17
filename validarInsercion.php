<?php
    require_once './includes/Producto.php';
    require_once './includes/Experiencias.php';
    require_once './includes/level.php';
    $mensaje = "";
    $ret=false;
    if(isset($_POST["nombre"],$_POST["descripcion"],$_POST["unidades"],$_POST["precio"],$_POST["imagen"])&&$_POST["nombre"]!=''&&$_POST["descripcion"]!=''&&$_POST["precio"]!=''&&$_POST["imagen"]!=''&&$_POST["unidades"]!=''){
        $nombre = $_POST["nombre"];
        $descripcion = $_POST['descripcion'];
        $unidades = $_POST['unidades'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $ret = Producto::crea($nombre,$descripcion,$unidades,$precio,$imagen);
    }elseif(isset($_POST["nombre"],$_POST["descripcion"],$_POST["precio"],$_POST["imagen"],$_POST["puntos"],$_POST["nivelminimo"])&&$_POST["nombre"]!=''&&$_POST["descripcion"]!=''&&$_POST["precio"]!=''&&$_POST["imagen"]!=''&&$_POST["puntos"]!=''){
        $nombre = $_POST["nombre"];
        $descripcion = $_POST['descripcion'];
        $puntos = $_POST['puntos'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $nivelminimo = level::getNumero($_POST['nivelminimo']);
        $ret = Experiencia::crea($nombre,$descripcion,$precio,$nivelminimo,$puntos,$imagen);
    }
    if($ret==true){
        $mensaje =  "Su inserción se ha realizado con éxito";
    }
    else{
        $mensaje = "Error en la inserción, vuelva a intentarlo";
    }
    if(isset($_GET['esExp'])){
        header("Location:insertarExperiencia.php?mensaje=$mensaje");
    }
    else{
    header("Location:insertarProducto.php?mensaje=$mensaje");
    }
?>
