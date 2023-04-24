<?php
class level{
    public const cangrejo = 0;
    public const delfin = 1;
    public const megalodon = 2;
    public const poseidon = 3;

    public static function getLevel($puntos){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT numero FROM nivel U WHERE $puntos<=U.maximo AND $puntos>=U.minimo");
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        return $fila['numero'];
    }

    public static function getNumero($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT numero FROM nivel U WHERE U.nombre='%s'",
        $conn->real_escape_string($nombre)
        );      
        $rs = $conn->query($query);
        $fila=mysqli_fetch_assoc($rs);
        return $fila['numero'];
    }

    public static function getNombre($numero){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM nivel U WHERE U.numero=$numero");
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        return $fila['nombre'];
    }
    
    public static function getAllLevels(){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM nivel  ");
        $rs = $conn->query($query);
        return $rs;
    }

    public static function getMaxPuntos($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT maximo FROM nivel U WHERE U.nombre='%s'", $nombre);
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        return $fila['maximo'];
    }

    public static function getMinPuntos($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT minimo FROM nivel U WHERE U.nombre='%s'", $nombre);
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        return $fila['minimo'];
    }

}

?>