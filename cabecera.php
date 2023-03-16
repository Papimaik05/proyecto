<?php
require_once './includes/level.php';
require_once './includes/Usuario.php';
function reconocerUsuario() {
  if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)){ 
    echo'Rol: '.Usuario::getNombreRol($_SESSION['rol']);
    $level=level::getLevel($_SESSION["puntos"]);
    if($level == level::cangrejo){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/cangrejo.jpg" name="boton" width="50" alt="Botón icono cangrejo"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
    else if($level == level::delfin){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/delfin.jpg" name="boton" width="50" alt="Botón icono delfin"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
    else if($level == level::megalodon){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/tiburon.jpg" name="boton" width="50" alt="Botón icono tiburon"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
    else if($level == level::poseidon){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/poseidon.jpg" name="boton" width="50" alt="Botón icono poseidon"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
  } else {
    echo '<form method="post" action="login.php">
    <input type="image" src="./img/usuariodesconocido.jpg" name="boton" width="50" alt="Botón para ir a login"  height="50" />
    </form>';
    echo 'Usuario desconocido. ';
    echo '<a href="login.php">Login </a>';
  }
}

?>
<header>
	<h1 style="text-align:center;" >Amigos Marinos</h1>
    <h3 style="text-align:center;" >Bajo el Mar, Nada va mal</h3>
        <div style="text-align:left;" >
        <button onclick="window.location.href='index.php'" type="button" > Inicio</button>
		    <button onclick="window.location.href='tienda.php'" type="button" > Tienda/Experiencias</button>
        <button onclick="window.location.href='Noticias.php'" type="button" > Noticias</button>
        <button onclick="window.location.href='Blog.php'" type="button" > Blog</button>
        <?php
        if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
          if($_SESSION["rol"] == "0" || $_SESSION["rol"] == "2"){
            ?>
            <button onclick='window.location.href="gestorProductos.php"' type='button' > GestorContenido</button>
          <?php
          }
        }
        ?>
        </div>
		<div style="text-align:right;" >
		<?php 
    
		reconocerUsuario();
    
		?>
		</div>
</header>