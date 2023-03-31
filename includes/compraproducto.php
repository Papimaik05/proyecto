<?php
class compraproducto{

    public static function compraPro($username,$id,$unidadesfinal,$unidadesinicio){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("INSERT INTO compraproducto(nombre_usuario,id_producto,unidades) VALUES ('%s','%d','%d')"
        , $conn->real_escape_string($username)
        ,$id
        ,$unidadesinicio
        );

        if ( $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        } 

        //Reducir unidades

        $query = sprintf("UPDATE producto P SET  unidades='%d' WHERE P.id='%d'"
        , $unidadesfinal
        , $id);

        if ( $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
    }


}

?>