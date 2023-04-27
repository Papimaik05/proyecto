<?php
    require_once './includes/noticia.php';    
    $mensaje = "";
    $res=true;
    
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
    

?>