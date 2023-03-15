<?php
    require_once './includes/Producto.php';
    $productosSeleccionados = $_POST['productos'];
    $mensaje = "";
    $res=true;
    if (!empty($productosSeleccionados)) {
        foreach ($productosSeleccionados as $id) {
            if(Producto::borraPorId($id)){
            }
            else{
                $res = false;
            }
        }
        if($res==false){
            $mensaje = "No se han podido eliminar todos los productos";
        }
        else{
            $mensaje = "Todos los elementos seleccionados se han borrado con exito";
        }
    } 
    else {
        $mensaje = "Por favor, seleccione al menos un producto.";
    }
    header("Location:borrarProducto.php?mensaje=$mensaje");

?>