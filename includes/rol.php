<?php
class rol{

    public static function getAllRols(){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM rol ");
        $rs = $conn->query($query);
        return $rs;
    }


}

?>