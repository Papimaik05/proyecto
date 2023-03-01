<html>
<head>
<title>
    Login pagina web
</title>
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>

body{
    margin-top: 220px;
    text-align: center;
    align-items: center;
}
h1{
    
    font-size:3rem;
}
p,input[type="text"],input[type="password"]{
    margin-bottom: 10px;
    font-size: 1.5rem;
}
input[type="submit"]{
    font-size: 1.2rem;
}

</style>
</head>
<?php

?>
<body>

<h1>
    Iniciar sesión
</h1>
<form action="validarLogin.php" method="post">
<p>Usuario</p>
<input type="text" name="usuario"/>
<p>Contraseña</p>
<input type="password" name="contraseña"/>
<p><input type="submit" value="Iniciar sesión" /></p>
</form>

</body>


</html>