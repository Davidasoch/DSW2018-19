<?php 
if ( ! isset($_COOKIE['id']) ) {
    setcookie('id', '77', time()+3600);
} ?>

<html>
<body>
<h1>Menu - Index</h1>
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