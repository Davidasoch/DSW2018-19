<?php
session_start();
?>


<html>
<body>
<h1>Datos de sesion (Inicio)</h1>
<p>Escriba el nuevo dato</p>

<form action="nuevo-2.php" method="POST">
Nombre del dato:
<input type="text" name="id" value="">
</br>
Valor del dato  :  
<input type="text" name="name" value="">
</br>
    <input type="submit" value="Guardar dato" />
    <input type="reset" value="Borrar ">
</form>

<p><a href="index.php">Volver al inicio</a></p>
</body>
</html>