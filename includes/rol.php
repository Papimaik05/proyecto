<?php
class rol{

    private $numero;
    private $nombre;

    private function __construct($numero,$nombre){
        $this->numero = $numero;
        $this->nombre = $nombre;
    } 

    public static function getRolByNumero($numero){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM rol U WHERE U.numero=$numero");
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        $rol = new rol($fila['numero'], $fila['nombre']);
        $rs->free();
        return $rol;
    }

    public static function getRolByNombre($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM rol U WHERE U.nombre='%s'",
        $conn->real_escape_string($nombre)
        );      
        $rs = $conn->query($query);
        $fila=mysqli_fetch_assoc($rs);
        $rol = new rol($fila['numero'], $fila['nombre']);
        $rs->free();
        return $rol;
    }

    public static function getAllRols(){
        $rols=[];
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM rol");
        $rs = $conn->query($query);
        if(mysqli_num_rows($rs) > 0){
            $i = 0;
            while($fila = $rs->fetch_assoc()){
                $rols[$i] = new rol($fila['numero'], $fila['nombre']);
                $i++;
            }
            $rs->free();
            return $rols;
        }
       return false;
    }



    public function getNombre(){
        return $this->nombre;
    }
    public function getNumero(){
        return $this->numero;
    }


}

?>