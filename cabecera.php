<?php
function reconocerUsuario() {
  if (isset($_SESSION["login"])) { 
    // Asi se ponen en php las imagenes de forma que sean boton tambien
    echo '<form method="post" action="login.php">
    <input type="image" src="./img/señor.png" name="boton" width="150" alt="Botón icono cangrejo"  height="100" />
    </form>';
    echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
    echo '<a href="logout.php">(salir)</a>';
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
		<div style="text-align:right;" >
		<?php 
		reconocerUsuario();
		?>
		</div>
</header>