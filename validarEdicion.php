<?php
    require_once './includes/Producto.php';
    require_once './includes/Experiencia.php';  
    require_once './includes/level.php';  
    require_once './includes/Usuario.php'; 
    require_once './includes/rol.php'; 
    $mensaje = "";
    $res=true;
    
    if(isset($_POST['producto'])){
        $idProducto=$_POST['producto'];
        $producto=Producto::buscaPorId($idProducto);
        if(!empty($_POST["nombre"])){
            $producto->setNombre($_POST['nombre']);
        }
        if(!empty($_POST['descripcion'])){
            $producto->setDescripcion($_POST['descripcion']);
        }
        if(!empty($_POST['unidades'])){
            $producto->setUnidades($_POST['unidades']);
        }
        if(!empty($_POST['precio'])){
            $producto->setPrecio($_POST['precio']);
        }
        if(isset($_FILES['imagen']) && is_uploaded_file($_FILES['imagen']['tmp_name'])){

            $nombre_img=$_FILES['imagen']['name'];         
            $tipo_img=$_FILES['imagen']['type'];
            $tamagno_img=$_FILES['imagen']['size'];
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/proyecto/img/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_img);
            $producto->setImagen("./img/".$nombre_img);
        }
        $producto->guarda();
        $mensaje =  "Producto modificado con exito";
    }elseif(isset($_POST['experiencia'])){
        $idExperiencia=$_POST['experiencia'];
        $experiencia=Experiencia::buscaPorId($idExperiencia);
        if(!empty($_POST["nombre"])){
            $experiencia->setNombre($_POST['nombre']);
        }
        if(!empty($_POST['descripcion'])){
            $experiencia->setDescripcion($_POST['descripcion']);
        }
        if(!empty($_POST['nivelminimo'])){
            $experiencia->setNivelMinimo(level::getNumero($_POST['nivelminimo']));
        }
        if(!empty($_POST['puntos'])){
            $experiencia->setPuntos($_POST['puntos']);
        }
        if(!empty($_POST['precio'])){
            $experiencia->setPrecio($_POST['precio']);
        }
        if(isset($_FILES['imagen']) && is_uploaded_file($_FILES['imagen']['tmp_name'])){
            $nombre_img=$_FILES['imagen']['name'];         
            $tipo_img=$_FILES['imagen']['type'];
            $tamagno_img=$_FILES['imagen']['size'];
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/proyecto/img/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_img);
            $experiencia->setImagen("./img/".$nombre_img);
        }
        $experiencia->guarda();
        $mensaje =  "Experiencia modificada con exito";
    }
    elseif(isset($_POST['usuario'])){
        $nombreusuario=$_POST['usuario'];
        $usuario=Usuario::buscaUsuario(trim($nombreusuario));
        $sinerrores=true;
        if(!empty($_POST["email"])){
            $email=$_POST['email'];
        }
        else{
            $email=$usuario->getEmail();
        }
        if(!empty($_POST['rol'])){
            $rol=rol::getNumero($_POST['rol']);
        }
        else{
            $rol=$usuario->getRol();
        }
        if(!empty($_POST['puntos'])){
            $puntos=$_POST['puntos'];
        }
        else{
            $puntos=$usuario->getPuntos();
        }
        if((correoValidoComplu($email) ||correoValidoGmail($email)||correoValidoMarinos($email)) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sinerrores=true;
        }
        else{
            $mensaje="ERROR: El email debe acabar en @ucm.es // @gmail.com // @marinos.com";
            $sinerrores=false;
        }
        if($sinerrores){
            $contr=$usuario->getContr();
            Usuario::cambioDatos(trim($nombreusuario),$usuario->getContr(),$email,$rol,$puntos);
            $mensaje =  "Usuario modificado con exito";
        } 
    }
    
    if($_GET['es']=="experiencia"){

        header("Location:modificarExperiencia.php?mensaje=$mensaje");
    }
    else if($_GET['es']=="producto"){
    header("Location:modificarProducto.php?mensaje=$mensaje");
    }
    else if($_GET['es']=="usuario"){
        header("Location:modificarUsuario.php?mensaje=$mensaje");
    }

    function correoValidoComplu($correo) {
        $dominio = "@ucm.es";
        $index = strpos($correo, $dominio);
        if ($index === -1) {
          return false; // el dominio no está presente en el correo
        }
        $subcadena =substr($correo, 0, $index); // extrae la subcadena antes del dominio
        return strlen($subcadena) > 0; // devuelve true si la subcadena tiene longitud mayor que cero
    }
    
    function correoValidoGmail($correo) {
        $dominio = "@gmail.com";
        $index = strpos($correo, $dominio);
        if ($index === -1) {
          return false; // el dominio no está presente en el correo
        }
        $subcadena = substr($correo, 0, $index); // extrae la subcadena antes del dominio
        return strlen($subcadena) > 0; // devuelve true si la subcadena tiene longitud mayor que cero
    }
    
    function correoValidoMarinos($correo) {
        $dominio = "@marinos.com";
        $index = strpos($correo, $dominio);
        if ($index === -1) {
          return false; // el dominio no está presente en el correo
        }
        $subcadena = substr($correo, 0, $index); // extrae la subcadena antes del dominio
        return strlen($subcadena) > 0; // devuelve true si la subcadena tiene longitud mayor que cero
      }

    

?>