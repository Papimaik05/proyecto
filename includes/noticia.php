<?php
require_once "Aplicacion.php";
require_once 'config.php';
class Noticia{
private $id;
private $titulo;
private $descripcion;
private $fecha;
private $imagen;

public function __construct($id,$titulo,$descripcion,$fecha,$imagen){
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


}







?>