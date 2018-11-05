<?php 
session_start();
if (isset($_POST['surname']) && $_POST['surname']!=""){
    $_SESSION['surname']=$_POST['surname'];
}else if(! isset($_SESSION['surname'])){
    echo "<p>Apellido no introducido</p>";
    echo "<p><a href='index.php'>Volver a la primera pagina</a></p>";
    exit();
}
?>

<html>
<body>
<h1>Formulario en 3 pasos (form3)</h1>
<?php 
echo "<p> su nombre y apellidos son : ".$_SESSION['name']." ".$_SESSION['surname']."</p>";
?>
<p>¿Es correcto?</p>
<form action="form3.php" method="POST">
<input type="hidden" name="check" value="si">
    <input type="submit" name="check" value="si" />
</form>
<form action="form3.php" method="POST">
<input type="hidden" name="check" value="no">
    <input type="submit" name="check" value="no">
</form>
<p><a href="index.php">Volver a la primera pagina</a></p>

</body>
</html>