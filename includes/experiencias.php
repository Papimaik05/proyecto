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
        $dbhost="localhost";
        $dbuser="proyecto";
        $dbpass="proyecto";
        $dbname="proyecto";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
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
        $dbhost="localhost";
        $dbuser="proyecto";
        $dbpass="proyecto";
        $dbname="proyecto";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        $query=sprintf("INSERT INTO experiencias(nombre,descripcion,precio,nivelminimo,puntos, imagen) VALUES ('%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($experiencia->nombre)
            , $conn->real_escape_string($experiencia->descripcion)
            , $conn->real_escape_string($experiencia->precio)
            , $conn->real_escape_string($experiencia->nivelminimo)
            , $conn->real_escape_string($experiencia->puntos)
            ,$conn->real_escape_string($experiencia->imagen)
        );
        if ( $conn->query($query) ) {
            $experiencia->id = $conn->insert_id;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
    }
    
    private static function actualiza($experiencia)
    {
        $result = false;
        $dbhost="localhost";
        $dbuser="proyecto";
        $dbpass="proyecto";
        $dbname="proyecto";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        $query=sprintf("UPDATE experiencia P SET nombre = '%s', descripcion='%s',precio='%s',nivelminimo='%s',puntos='%s', imagen='%s' WHERE P.id=%d"
            , $conn->real_escape_string($experiencia->nombre)
            , $conn->real_escape_string($experiencia->descripcion)
            , $conn->real_escape_string($experiencia->precio)
            , $conn->real_escape_string($experiencia->nivelminimo)
            , $conn->real_escape_string($experiencia->puntos)
            , $conn->real_escape_string($experiencia->urlImagen)
            , $usuario->id
        );
        if ( $conn->query($query) ) {
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
        return $result;
    }

    public static function buscaPorId($idExperiencia)
    {
        $dbhost="localhost";
        $dbuser="proyecto";
        $dbpass="proyecto";
        $dbname="proyecto";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        $query = sprintf("SELECT * FROM experiencia WHERE id=%d", $idExperiencia);
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
        $experiencia = new Experiencia($nombre, $descripcion, $precio,$nivelminimo,$puntos, $urlImagen);
        return $experiencia->guarda();
    }

    public function guarda()
    {
        if ($this->id !== null) {
            return self::actualiza($this);
        }
        return self::inserta($this);
    }

    private static function borraPorId($idExperiencia)
    {
        if (!$idExperiencia) {
            return false;
        } 
        /* Los roles se borran en cascada por la FK
         * $result = self::borraRoles($usuario) !== false;
         */
        $dbhost="localhost";
        $dbuser="proyecto";
        $dbpass="proyecto";
        $dbname="proyecto";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        $query = sprintf("DELETE FROM experiencia P WHERE P.id = %d"
            , $idExperiencia
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
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