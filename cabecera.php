<?php
function reconocerUsuario() {
  if (isset($_SESSION["login"])) {
    echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
    echo '<a href="logout.php">(salir)</a>';
  } else {
    echo 'Usuario desconocido. ';
    echo '<a href="login.php">Login</a>';
  }
}

?>
<header>
	<h1 style="text-align:center;" >Amigos Marinos</h1>
    <h3 style="text-align:center;" >Bajo el Mar, Nada va mal</h3>
		<div style="text-align:right;" >
		<?php 
		reconocerUsuario();
		?>
		</div>
</header>