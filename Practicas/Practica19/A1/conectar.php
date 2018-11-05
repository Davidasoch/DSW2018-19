<?php 
if ( ! isset($_SESSION['status'])){
    session_start();
    $_SESSION['status']="connected";

}

?>

<html>
<body>
<h1>Menu - Conectar</h1>
<nav>
<ul>
<li><a href="index.php">Index</a></li>
<li><a href="conectar.php">Conectar</a></li>
<li><a href="desconectar.php">Desconectar</a></li>
<li><a href="comprobar.php">Comprobar</a></li>
</ul>
</nav>
</body>
</html>