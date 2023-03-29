<?php
class compraexperiencia{

    public static function compraExp($username,$id){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("INSERT INTO compraexperiencia(nombre_usuario,id_experiencia) VALUES ('%s','%d')"
        , $conn->real_escape_string($username)
        ,$id);

        if ( $conn->query($query) ) {
            echo "<h2>Inserción con éxito </h2> <br>";
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }

        return null;
    }


}

?>