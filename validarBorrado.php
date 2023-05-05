<?php
    require_once './includes/Producto.php';
    require_once './includes/Experiencia.php';   
    require_once './includes/Usuario.php'; 
    require_once './includes/Noticia.php';  
    require_once './includes/comentario.php';  
    
    
    function eliminarConHijos($idComentario){
        $res = true;
        $aBorrar = comentario::buscaPorId($idComentario);
        $respuestas = $aBorrar->cargarRespuestas();
        if($respuestas != false){
            foreach($respuestas as $respuesta){
                eliminarConHijos($respuesta->getId());
            }
        }
        if(comentario::borraPorId($idComentario)){
        }
        else{
            $res = false;
        }
        return $res;
    }
    
    
    $mensaje = "";
    $res=true;
    if($_SESSION["diferenciar"]=="Producto"){
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
    }else if($_SESSION["diferenciar"]=="Experiencia"){
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
    else if($_SESSION["diferenciar"]=="Usuario"){
        $usuariosSeleccionados = $_POST['usuarios'];
        if (!empty($usuariosSeleccionados)) {
            foreach ($usuariosSeleccionados as $nombre) {
                if(Usuario::borrarUsuario($nombre)){
                }
                else{
                    $res = false;
                }
            }
            if($res==false){
                $mensaje = "No se han podido eliminar todos los usuarios";
            }
            else{
                $mensaje = "Todos los elementos seleccionados se han borrado con exito";
            }
        } 
        else {
            $mensaje = "Por favor, seleccione al menos un usuario.";
        }
        header("Location:borrarUsuario.php?mensaje=$mensaje");
    } else if($_SESSION["diferenciar"]=="Noticia"){
        $noticasSeleccionadas = $_POST['noticias'];
        if (!empty($noticasSeleccionadas)) {
            foreach ($noticasSeleccionadas as $id) {
                if(Noticia::borraPorId($id)){
                }
                else{
                    $res = false;
                }
            }
            if($res==false){
                $mensaje = "No se han podido eliminar todas las noticias";
            }
            else{
                $mensaje = "Todos los elementos seleccionados se han borrado con exito";
            }
        } 
        else {
            $mensaje = "Por favor, seleccione al menos una noticia.";
        }
        header("Location:borrarNoticia.php?mensaje=$mensaje");
    } else if($_SESSION["diferenciar"] == "Comentario"){
        $comentariosSeleccionados = $_POST['comentarios'];
        if (!empty($comentariosSeleccionados)) {
            foreach ($comentariosSeleccionados as $id) {
                eliminarConHijos($id); 
            }
            if($res==false){
                $mensaje = "No se han podido eliminar todos los comentarios";
            }
            else{
                $mensaje = "Todos los elementos seleccionados se han borrado con exito";
            }
        } 
        else {
            $mensaje = "Por favor, seleccione al menos un comentario.";
        }
        header("Location:moderador.php?mensaje=$mensaje");
    }

?>