<?php
require_once "Aplicacion.php";
require_once 'config.php';
class Noticia{
private $id;
private $titulo;
private $descripcion;
private $fecha;
private $imagen;

public function __construct($id=null,$titulo,$descripcion,$fecha,$imagen){
$this->id=$id;
$this->titulo=$titulo;
$this->descripcion=$descripcion;
$this->fecha=$fecha;
$this->imagen=$imagen;
}


public static function cargarNoticias(){
    $noticias=[];
    $conn = Aplicacion::getInstance()->getConexionBd();
    if(!$conn){
        exit("Fallo en la conexion");
        return false;
    }

    $query = sprintf("SELECT * FROM noticia ORDER BY fecha DESC");
    $resultado = mysqli_query($conn, $query);
    $i = 0;
    if(mysqli_num_rows($resultado) > 0){
       
        while($fila = $resultado->fetch_assoc()){
            $noticias[$i] = new Noticia($fila["id"], $fila["titulo"], $fila["descripción"], $fila["fecha"], $fila["imagen"]);
            $i++;
        }
        $resultado->free();
    }

    return $noticias;


}

public function getTitulo(){
    return $this->titulo;
}
public function getDescripcion(){
    return $this->descripcion;
}

public function getFecha(){
    return $this->fecha;
}

public function getImagen(){
    return $this->imagen;
}
public function getId(){
    return $this->id;
}
public static function buscaPorId($idNoticia){
    
    $conn = Aplicacion::getInstance()->getConexionBd();
    $query = sprintf("SELECT * FROM noticia WHERE id='%d'", $idNoticia);
    $rs = $conn->query($query);
    if ($rs) {
        $fila = $rs->fetch_assoc();
        $noticia = new Noticia($fila["id"], $fila["titulo"], $fila["descripción"], $fila["fecha"], $fila["imagen"]);
        $rs->free();
        return $noticia;
    } else {
        error_log("Error BD ({$conn->errno}): {$conn->error}");
    }
    return false;


}

    private static function inserta($noticia)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO noticia(titulo,descripción,fecha, imagen) VALUES ('%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($noticia->titulo)
            , $conn->real_escape_string($noticia->descripcion)
            , $noticia->fecha            
            , $conn->real_escape_string($noticia->imagen)
        );
        $rs=$conn->query($query);
        if ( $rs) {
            $noticia->id = $conn->insert_id;
            $result=true;
            $rs->free();
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }

    public function guarda()
    {
       
        return self::inserta($this);
    }
    public static function crea($titulo, $descripcion, $fecha, $imagen)
    {
        $noticia = new Noticia(null,$titulo,$descripcion, $fecha, $imagen);
        return $noticia->guarda();
    }

    
    public static function borraPorId($idNoticia)
    {
        if (!$idNoticia) {
            return false;
        } 
        /* Los roles se borran en cascada por la FK
         * $result = self::borraRoles($usuario) !== false;
         */
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM noticia WHERE id = '%d'"
            , $idNoticia
        );
        $rs=$conn->query($query);
        if (!$rs) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        $rs->free();
        return true;
    }




}







?>