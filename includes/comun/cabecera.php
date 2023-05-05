<?php
require_once './includes/level.php';
require_once './includes/rol.php';
require_once './includes/Usuario.php';
function reconocerUsuario() {
  if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)){ 
    $rol =rol::getRolByNumero($_SESSION['rol']);
    echo'Rol: '.$rol->getNombre();
    $level=level::getLevel($_SESSION["puntos"]);
    if($level->getNumero() == level::cangrejo){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/cangrejo.jpg" name="boton" width="50" alt="Botón icono cangrejo"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
    else if($level->getNumero() == level::delfin){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/delfin.jpg" name="boton" width="50" alt="Botón icono delfin"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
    else if($level->getNumero() == level::megalodon){
      echo '<form method="post" action="micuenta.php">
      <input type="image" src="./img/tiburon.jpg" name="boton" width="50" alt="Botón icono tiburon"  height="50" />
      </form>';
      echo 'Bienvenido ' . $_SESSION['nombre'] . '! ';
      echo '<a href="logout.php">(salir)</a>';
    }
    else if($level->getNumero() == level::poseidon){
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
<header class ="header">
  <div class="cont logo-nav-cont" >
    <a class="logo">Amigos Marinos</a>
    <nav class="navigation">
          <ul>
            <li><a href="index.php ">Inicio</a></li>
            <li><a href="tienda.php">Tienda/Experiencias</a></li>
            <li><a href="noticias.php">Noticias</a></li>
            <li><a href="foro.php">Foro</a></li>
            <?php
            if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
              ?>
              <li><a href="vistaCarrito.php">Carrito</a></li>
              <br>
                <?php
                if($_SESSION["rol"] == "0"||$_SESSION["rol"] == "2"){
                  ?>
                  <li class="list__item list__item--click">
                    <div class="list__button list__button--click">
                      <a href="#" class="nav__link" id="header_button">Menu Gestor</a>
                    </div>
                    <ul class="list__show">
                      <li class="list__inside">
                      <a href="gestorProductos.php" class="nav__link nav__link--inside">Gestor Contenido</a>
                      </li>
                      <br>
                      <li class="list__inside">
                      <a href="gestorNoticias.php" class="nav__link nav__link--inside">Gestor Noticias</a>
                      </li>
                      <br>
                      <?php
                          if($_SESSION["rol"] == "0"){
                          ?>
                            <li class="list__inside">
                            <a  href="gestorUsuarios.php" class="nav__link nav__link--inside">Gestor Usuarios</a>
                            </li>
                            <br>
                            <li class="list__inside">
                            <a  href="moderador.php" class="nav__link nav__link--inside">Gestor Moderador</a>
                            </li>
                            <?php
                          }
                          ?>
                      </ul>
              </li>
          </ul>
                <?php
                }
                elseif($_SESSION["rol"] == "3"){
                ?>
                  <li class="list__item list__item--click">
                    <div class="list__button list__button--click">
                      <a href="#" class="nav__link" id="header_button">Menu Gestor</a>
                    </div>
                    <ul class="list__show">
                      <li class="list__inside">
                      <a href="moderador.php" class="nav__link nav__link--inside">Gestor Moderador</a>
                      </li>
                      <br>
                    </ul>
                  </li>
                </ul>
              <?php
              }
            }
          ?>
      </nav>
      <script>let listElements = document.querySelectorAll('.list__button--click');
              listElements.forEach(listElement => {
              listElement.addEventListener('click', ()=>{
                                  
                listElement.classList.toggle('arrow');

                let height = 0;
                let menu = listElement.nextElementSibling;
                if(menu.clientHeight == "0"){
                  height=menu.scrollHeight;
                }

                menu.style.height = `${height}px`;

              })
              });</script>
    </div>
       
		<div class="login" >
		 <?php 
    
		reconocerUsuario();
    
		?>  
		</div>
</header>