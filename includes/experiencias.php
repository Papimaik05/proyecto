<?php

class Experiencia {
    private $nombre;
    private $id;
    private $descripcion; 
    private $precio;    
    private $nivelminimo;  
    private $puntos;
    private $urlImagen;
    
    private function __construct($id = null , $descripcion, $precio,$nivelminimo, $urlImagen, $nombre,$puntos)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->nivelminimo = $nivelminimo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->urlImagen = $urlImagen;
        $this->puntos=$puntos;
    }

    public static function cargarExperiencias(){
        $experiencias = [];
        $conn=Aplicacion::getInstance()->getConexionBd();
        if(!$conn){
            exit("Fallo en la conexion");
        }
        $query = "SELECT * FROM experiencias";
        $resultado = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultado) > 0){
            $i = 0;
            while($fila = $resultado->fetch_assoc()){
                $experiencias[$i] = new Experiencia($fila["id"], $fila["descripcion"], $fila["precio"], $fila["nivelminimo"], $fila["imagen"], $fila["nombre"],$fila['puntos']);
                $i++;
            }
            $resultado->free();
            return $experiencias; 
        }
        else{
            return false;
        }
    }
    private static function inserta($experiencia)
    {
        $result = false;
       
        $conn=Aplicacion::getInstance()->getConexionBd();
        
        $query=sprintf("INSERT INTO experiencias(nombre,descripcion,precio,nivelminimo,puntos, imagen) VALUES ('%s', '%s', '%d', '%d', '%d', '%s')"
            , $conn->real_escape_string($experiencia->nombre)
            , $conn->real_escape_string($experiencia->descripcion)
            , $experiencia->precio
            , $experiencia->nivelminimo
            , $experiencia->puntos
            ,$conn->real_escape_string($experiencia->urlImagen)
        );
        if ( $conn->query($query) ) {
            $experiencia->id = $conn->insert_id;
            $result=true;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }
    
    private static function actualiza($experiencia)
    {
        $result = false;
        $conn=Aplicacion::getInstance()->getConexionBd();



        $query=sprintf("UPDATE experiencias P SET nombre = '%s', descripcion='%s',precio='%d',nivelminimo='%d',puntos='%d', imagen='%s' WHERE P.id='%d'"
            , $conn->real_escape_string($experiencia->nombre)
            , $conn->real_escape_string($experiencia->descripcion)
            , $experiencia->precio
            , $experiencia->nivelminimo
            , $experiencia->puntos
            , $conn->real_escape_string($experiencia->urlImagen)
            , $experiencia->id
        );
        if ( $conn->query($query) ) {
            $result=true;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
        return $result;
    }

    public static function buscaPorId($idExperiencia)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM experiencias WHERE id='%d'", $idExperiencia);
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $experiencia = new Experiencia($fila["id"], $fila["descripcion"], $fila["precio"], $fila["nivelminimo"], $fila["imagen"], $fila["nombre"],$fila['puntos']);
            $rs->free();
            return $experiencia;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }


    public static function crea($nombre, $descripcion, $precio,$nivelminimo,$puntos, $urlImagen)
    {
        $experiencia = new Experiencia(null,$descripcion, $precio,$nivelminimo, $urlImagen, $nombre,$puntos);
        return $experiencia->guarda();
    }

    public function guarda()
    {
        if ($this->id !== null) {
            return self::actualiza($this);
        }
        return self::inserta($this);
    }

    public static function borraPorId($idExperiencia)
    {
        if (!$idExperiencia) {
            return false;
        } 
        /* Los roles se borran en cascada por la FK
         * $result = self::borraRoles($usuario) !== false;
         */        
        $conn=Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM experiencias WHERE id = '%d'"
            , $idExperiencia
        );
        if (!$conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setImagen($imagen){
        $this->urlImagen = $imagen;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPuntos()
    {
        return $this->puntos;
    }
    public function setPuntos($puntos){
        $this->puntos = $puntos;
    }
    public function setNivelMinimo($nivelminimo){
        $this->nivelminimo = $nivelminimo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getImagen(){
        return $this->urlImagen;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getNivelMinimo(){
        return $this->nivelminimo;
    }

    
    public function borrate()
    {
        if ($this->id !== null) {
            return self::borra($this);
        }
        return false;
    }
}

?>