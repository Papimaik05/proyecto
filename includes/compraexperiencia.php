<?php
class compraexperiencia{

    public static function compraExp($username,$id,$puntos){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("INSERT INTO compraexperiencia(nombre_usuario,id_experiencia) VALUES ('%s','%d')"
        , $conn->real_escape_string($username)
        ,$id);

        if ( $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        } 

        //AÑADIR PUNTOS

        $query = sprintf("UPDATE usuario U SET  U.puntos=puntos + %d WHERE U.username='%s'"
        , $puntos
        ,$conn->real_escape_string($username));

        if ( $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
    }


}

?>