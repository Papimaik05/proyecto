<?php
    require_once './includes/producto.php';
    require_once './includes/experiencias.php';    
    $mensaje = "";
    $res=true;
    if(isset($_POST['productos'])){
    $productosSeleccionados = $_POST['productos'];
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
}else{
    $experienciasSeleccionadas = $_POST['experiencias'];
    if (!empty($experienciasSeleccionadas)) {
        foreach ($experienciasSeleccionadas as $id) {
            if(Experiencia::borraPorId($id)){
            }
            else{
                $res = false;
            }
        }
        if($res==false){
            $mensaje = "No se han podido eliminar todas las experiencias";
        }
        else{
            $mensaje = "Todos los elementos seleccionados se han borrado con exito";
        }
    } 
    else {
        $mensaje = "Por favor, seleccione al menos una experiencia.";
    }
    header("Location:borrarExperiencia.php?mensaje=$mensaje");
}

?>