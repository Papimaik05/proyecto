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
        $rs->free();
        return $fila['numero'];
    }

    public static function getNumero($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT numero FROM nivel U WHERE U.nombre='%s'",
        $conn->real_escape_string($nombre)
        );      
        $rs = $conn->query($query);
        $fila=mysqli_fetch_assoc($rs);
        $rs->free();
        return $fila['numero'];
    }

    public static function getNombre($numero){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM nivel U WHERE U.numero=$numero");
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        $rs->free();
        return $fila['nombre'];
    }
    
    public static function getAllLevels(){
        $levels=[];
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM nivel  ");
        $rs = $conn->query($query);
        if(mysqli_num_rows($rs) > 0){
           
            
            return $rs;
        }
       return false;
    }

    public static function getMaxPuntos($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT maximo FROM nivel U WHERE U.nombre='%s'", $nombre);
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        $rs->free();
        return $fila['maximo'];
    }

    public static function getMinPuntos($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT minimo FROM nivel U WHERE U.nombre='%s'", $nombre);
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        $rs->free();
        return $fila['minimo'];
    }

}

?>