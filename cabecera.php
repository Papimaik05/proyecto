<?php
function reconocerUsuario() {
  if (isset($_SESSION["login"])) {
    echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
    echo "<img src='./img/señor.png' width='150' alt = 'Nivel cangrejo' height='100'>";
    echo '<a href="logout.php">(salir)</a>';
  } else {
    echo 'Usuario desconocido. ';
    echo '<a href="login.php">Login </a>';
    echo "<img src='./img/circulo.png' width='150' alt = 'Nivel cangrejo' height='100'>";
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