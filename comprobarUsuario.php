<?php
	require_once __DIR__.'/includes/Usuario.php';
	require_once './includes/config.php';

	$usuarios = Usuario::cargarUsuarios();
	$aux=false;
	foreach($usuarios as $u){
		$nombre = $u->getNombreUsuario();
		if ($_GET['user'] == $nombre){
			$aux=true;
		}
	}
	if ($aux) echo "existe";
	else echo "disponible";
?>