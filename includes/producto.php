<?php

class Producto {
    private $nombre;
    private $id;
    private $descripcion;
    private $unidades;
    private $precio;
    private $urlImagen;
    
    private function __construct($id = null , $descripcion, $unidades, $precio, $urlImagen, $nombre)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->unidades = $unidades;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->urlImagen = $urlImagen;
    }

    public static function cargarProductos(){
        $productos = [];
        $conn = Aplicacion::getInstance()->getConexionBd();
        if(!$conn){
            exit("Fallo en la conexion");
        }
        $query = "SELECT * FROM producto";
        $resultado = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultado) > 0){
            $i = 0;
            while($fila = $resultado->fetch_assoc()){
                $productos[$i] = new Producto($fila["id"], $fila["descripcion"], $fila["unidades"], $fila["precio"], $fila["imagen"], $fila["nombre"]);
                $i++;
            }
            $resultado->free();
            return $productos; 
        }
        else{
            return false;
        }
    }
    private static function inserta($producto)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO producto(nombre,descripcion, unidades, precio, imagen) VALUES ('%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($producto->nombre)
            , $conn->real_escape_string($producto->descripcion)
            , $conn->real_escape_string($producto->unidades)
            , $conn->real_escape_string($producto->precio)
            , $conn->real_escape_string($producto->urlImagen)
        );
        if ( $conn->query($query) ) {
            $producto->id = $conn->insert_id;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
    }
    
    private static function actualiza($producto)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE producto P SET nombre = '%s', descripcion='%s', unidades='%s', precio='%s', imagen='%s' WHERE P.id=%d"
            , $conn->real_escape_string($producto->nombre)
            , $conn->real_escape_string($producto->descripcion)
            , $conn->real_escape_string($producto->unidades)
            , $conn->real_escape_string($producto->precio)
            , $conn->real_escape_string($producto->urlImagen)
            , $usuario->id
        );
        if ( $conn->query($query) ) {
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
        return $result;
    }

    public static function buscaPorId($idProducto)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM producto WHERE id=%d", $idProducto);
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            $producto = new Producto($fila["id"], $fila["descripcion"], $fila["unidades"], $fila["precio"], $fila["imagen"], $fila["nombre"]);
            $rs->free();
            return $producto;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }


    public static function crea($nombre, $descripcion, $unidades, $precio, $urlImagen)
    {
        $producto = new Producto($nombre, $descripcion, $unidades, $precio, $urlImagen);
        return $producto->guarda();
    }

    public function guarda()
    {
        if ($this->id !== null) {
            return self::actualiza($this);
        }
        return self::inserta($this);
    }

    private static function borraPorId($idProducto)
    {
        if (!$idProducto) {
            return false;
        } 
        /* Los roles se borran en cascada por la FK
         * $result = self::borraRoles($usuario) !== false;
         */
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM producto P WHERE P.id = %d"
            , $idProducto
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

    public function getUnidades(){
        return $this->unidades;
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