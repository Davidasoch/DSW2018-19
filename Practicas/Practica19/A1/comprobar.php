<?php
session_start();
if (isset($_SESSION['status'])){
    echo '<p>Usted esta conectado</p>';
}else{
    echo '<p>Usted esta desconectado</p>';
}

?>

<html>
<body>
<h1>Menu - Comprobar</h1>
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