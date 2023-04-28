<?php
class rol{

    public static function getAllRols(){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM rol ");
        $rs = $conn->query($query);
        return $rs;
    }

    public static function getNumero($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT numero FROM rol r WHERE r.nombre='%s'",
        $conn->real_escape_string($nombre)
        );      
        $rs = $conn->query($query);
        $fila=mysqli_fetch_assoc($rs);
        return $fila['numero'];
    }


}

?>