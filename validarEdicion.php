<?php
    require_once './includes/Producto.php';
    require_once './includes/Experiencias.php';    
    $mensaje = "";
    $res=true;
    if(isset($_POST['producto'])){
        $idProducto=$_POST['producto'];
        $producto=Producto::buscaPorId($idProducto);
        if(!empty($_POST["nombre"])){
            $producto->setNombre($_POST['nombre']);
        }
        if(!empty($_POST['descripcion'])){
            $producto->setDescripcion($_POST['descripcion']);
        }
        if(isset($_POST['unidades'])){
            $producto->setUnidades($_POST['unidades']);
        }
        if(isset($_POST['precio'])){
            $producto->setPrecio($_POST['precio']);
        }
        if(!empty($_POST['imagen'])){
            $producto->setImagen($_POST['imagen']);
        }
        $producto->guarda();
        $mensaje =  "Producto modificado con exito";
    }
    else{
        $mensaje="Seleccione el producto a modificar";
    }
    header("Location:modificarProducto.php?mensaje=$mensaje");
?>