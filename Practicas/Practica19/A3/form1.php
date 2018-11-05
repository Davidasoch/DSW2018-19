<?php 
session_start();
if (isset($_POST['name']) && $_POST['name']!=""){
    $_SESSION['name']=$_POST['name'];

}else if(! isset($_SESSION['name'])){
    echo "<p>Nombre no introducido</p>";
    echo "<p><a href='index.php'>Volver a la primera pagina</a></p>";
    exit();
}


?>

<html>
<body>
<h1>Formulario en 3 pasos (form2)</h1>
<?php
echo "<p> su nombre es : ".$_SESSION['name']."</p>";
?>
<p>Escriba su Apellido</p>
<form action="form2.php" method="POST">
<input type="text" name="surname" value="">
    <input type="submit" value="Siguiente" />
    <input type="reset" value="Borrar ">
</form>
<p><a href="index.php">Volver a la primera pagina</a></p>

</body>
</html>