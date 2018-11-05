<?php
session_start();
function showses($SES){
    foreach($SES as $id=>$val)
    {
        echo "<li>".$id . " : " . $val."</li>";
    }
}

if(count($_SESSION)>0){
    $check='datos guardados';
}else{
    $check='Todavia no se ha introducido ningun dato';
}


?>

<html>
<body>
<h1>Datos de sesion (Ver datos)</h1>
<nav><?php echo $check?></nav>
</br>
<?php showses($_SESSION);?>
<ul>
</ul>
   <p><a href='index.php'>Volver al inicio</a></p>
</body>
</html>