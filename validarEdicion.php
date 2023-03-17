<?php
    require_once './includes/Producto.php';
    require_once './includes/Experiencias.php';  
    require_once './includes/level.php';  
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
        if(!empty($_POST['unidades'])){
            $producto->setUnidades($_POST['unidades']);
        }
        if(!empty($_POST['precio'])){
            $producto->setPrecio($_POST['precio']);
        }
        if(!empty($_POST['imagen'])){
            $producto->setImagen($_POST['imagen']);
        }
        $producto->guarda();
        $mensaje =  "Producto modificado con exito";
    }elseif(isset($_POST['experiencia'])){
        $idExperiencia=$_POST['experiencia'];
        $experiencia=Experiencia::buscaPorId($idExperiencia);
        if(!empty($_POST["nombre"])){
            $experiencia->setNombre($_POST['nombre']);
        }
        if(!empty($_POST['descripcion'])){
            $experiencia->setDescripcion($_POST['descripcion']);
        }
        if(!empty($_POST['nivelminimo'])){
            $experiencia->setNivelMinimo(level::getNumero($_POST['nivelminimo']));
        }
        if(!empty($_POST['puntos'])){
            $experiencia->setPuntos($_POST['puntos']);
        }
        if(!empty($_POST['precio'])){
            $experiencia->setPrecio($_POST['precio']);
        }
        if(!empty($_POST['imagen'])){
            $experiencia->setImagen($_POST['imagen']);
        }
        $experiencia->guarda();
        $mensaje =  "Experiencia modificada con exito";
    }
    
    if(isset($_GET['esExp'])){
        header("Location:modificarExperiencia.php?mensaje=$mensaje");
    }else{
    header("Location:modificarProducto.php?mensaje=$mensaje");
}
?>