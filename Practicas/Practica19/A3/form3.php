<?php 
session_start();
if (isset($_POST['surname']) && $_POST['surname']!="" && isset($_POST['name']) && $_POST['name']!=""){
}else if(! isset($_SESSION['name']) || ! isset($_SESSION['surname'])){
    echo "<p>Nombre o apellidos no introducidos</p>";
    echo "<p><a href='index.php'>Volver a la primera pagina</a></p>";
    exit();
}

if(isset($_POST['check'])){
    $res=$_POST['check'];
}else{
    echo '<p>se ha producido un error</p>';
    exit();
}

?>

<html>
<body>
<h1>Formulario en 3 pasos (Resultado)</h1>
<?php 
echo "<p> su nombre y apellidos ".$res." son : ".$_SESSION['name']." ".$_SESSION['surname']."</p>";
?>

<p><a href="index.php">Volver a la primera pagina</a></p>

</body>
</html>