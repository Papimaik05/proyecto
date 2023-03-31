<?php
require_once "Aplicacion.php";
require_once 'config.php';
class Pedido{
private $usuario;
private $idproducto;
private $unidades;
private function __construct($usuario, $idproducto,$unidades=NULL){
        $this->usuario = $usuario;
        $this->idproducto = $idproducto;
        $this->unidades = $unidades;
        }
public static function cargaPedidos($usuario){
    $pedidos = [];
    $conn = Aplicacion::getInstance()->getConexionBd();
    if(!$conn){
        exit("Fallo en la conexion");
        return false;
    }

    $query = sprintf("SELECT * FROM compraproducto where nombre_usuario='%s'",$conn->real_escape_string($usuario));
    $resultado = mysqli_query($conn, $query);
    $i = 0;
    if(mysqli_num_rows($resultado) > 0){
       
        while($fila = $resultado->fetch_assoc()){
            $pedidos[$i] = new Pedido($fila["nombre_usuario"], $fila["id_producto"], $fila["unidades"]);
            $i++;
        }
        $resultado->free();
    }
    $query = sprintf("SELECT * FROM compraexperiencia WHERE nombre_usuario='%s'", $conn->real_escape_string($usuario));

    $resultado = mysqli_query($conn, $query);
    if(mysqli_num_rows($resultado) > 0){
        while($fila = $resultado->fetch_assoc()){
            $pedidos[$i] = new Pedido($fila["nombre_usuario"], $fila["id_experiencia"], NULL);
            $i++;
        }
        $resultado->free();
    }

return $pedidos;

}
public function getUsuario(){
return $this->usuario;
}
public function getIdProducto(){
    return $this->idproducto;
}
public function getUnidades(){
    return $this->unidades;
}



}



?>