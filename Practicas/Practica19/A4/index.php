<?php

if ( ! isset($_COOKIE['id']) ) {
    setcookie('id', '55', time()+3600);
} 

session_start();
if(count($_SESSION)>0){
    $check='datos guardados</p>';
}else{
    $check='<p>No hay datos guardados</p>';
}





?>


<html>
<body>
<h1>Datos de sesion (Inicio)</h1>
<?php echo $check?>
<nav>Elija una opcion</nav>
<ul>
<li><a href="nuevo-1.php">Guardar un nuevo dato</a></li>
<li><a href="ver.php">Ver los datos actuales</a></li>
<li><a href="borrar-1.php">Borrar datos</a></li>
<li><a href="cerrar.php">Cerrar sesion</a></li>
</ul>
</body>
</html>