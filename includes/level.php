<?php
class level{
    public const cangrejo = 0;
    public const delfin = 1;
    public const megalodon = 2;
    public const poseidon = 3;
    private $numero;
    private $nombre;
    private $minimo;
    private $maximo;
    
    private function __construct($numero,$nombre,$minimo,$maximo){
        $this->numero = $numero;
        $this->nombre = $nombre;
        $this->minimo = $minimo;
        $this->maximo = $maximo;
    } 

    public static function getLevel($puntos){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM nivel U WHERE $puntos<=U.maximo AND $puntos>=U.minimo");
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        $level = new level($fila['numero'], $fila['nombre'], $fila['minimo'], $fila['maximo']);
        $rs->free();
        return $level;
    }

    public static function getLevelByNombre($nombre){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM nivel U WHERE U.nombre='%s'",
        $conn->real_escape_string($nombre)
        );      
        $rs = $conn->query($query);
        $fila=mysqli_fetch_assoc($rs);
        $level = new level($fila['numero'], $fila['nombre'], $fila['minimo'], $fila['maximo']);
        $rs->free();
        return $level;
    }

    public static function getLevelByNumero($numero){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM nivel U WHERE U.numero=$numero");
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        $level = new level($fila['numero'], $fila['nombre'], $fila['minimo'], $fila['maximo']);
        $rs->free();
        return $level;
    }
    
    public static function getAllLevels(){
        $levels=[];
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM nivel");
        $rs = $conn->query($query);
        if(mysqli_num_rows($rs) > 0){
            $i = 0;
            while($fila = $rs->fetch_assoc()){
                $levels[$i] = new level($fila['numero'], $fila['nombre'], $fila['minimo'], $fila['maximo']);
                $i++;
            }
            $rs->free();
            return $levels;
        }
       return false;
    }

    public function getMaxPuntos(){
        return $this->maximo;
    }

    public function getMinPuntos(){
        return $this->minimo;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getNumero(){
        return $this->numero;
    }

}

?>