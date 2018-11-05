<?php 
if ( ! isset($_COOKIE['id']) ) {
    setcookie('id', '77', time()+3600);
} 

?>

<html>
<body>
<h1>Formulario en 3 pasos (form1)</h1>
<p>Escriba su nombre</p>
<form action="form1.php" method="POST">
<input type="text" name="name" value="">
    <input type="submit" value="Siguiente" />
    <input type="reset" value="Borrar ">
</form>

</form>

</body>
</html>