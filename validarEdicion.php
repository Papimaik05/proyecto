<?php
    require_once './includes/Producto.php';
    require_once './includes/Experiencias.php';    
    $mensaje = "";
    $res=true;
    if(isset($_POST['producto'])){
        $idProducto=$_POST['producto'];
        $producto=Producto::buscaPorId($idProducto);
        if(!empty($nombre)){
            $producto->setNombre($_POST['nombre']);
        }
        if(!empty($_POST['descripcion'])){
            $producto->setDescripcion($_POST['descripcion']);
        }
        if(!empty($_POST['Unidades'])){
            $producto->setUnidades($_POST['Unidades']);
        }
        if(!empty($_POST['Precio'])){
            $producto->setPrecio($_POST['Precio']);
        }
        if(!empty($_POST['URL de la imagen'])){
            $producto->setImagen($_POST['URL de la imagen']);
        }
        $producto->guarda();
        $mensaje =  "Producto modificado con exito";
    }
    else{
        $mensaje="Seleccione el producto a modificar";
    }
    header("Location:modificarProducto.php?mensaje=$mensaje");
?>