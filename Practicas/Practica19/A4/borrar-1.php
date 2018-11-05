<?php
session_start();

function dellist($SES){
    foreach($SES as $id=>$val)
    {
        echo $id." ".$val." <input type='checkbox' name='checkboxvar[]' value=".$id."><br>";
    }
}

?>


<html>
<body>
<h1>Datos de sesion (Borrar datos)</h1>
<p>Marque los datos a borrar</p>

<form action="borrar-2.php" method="POST">

    <?php dellist($_SESSION);?>
</br>
    <input type="submit" value="Borrar" />
</form>

<p><a href="index.php">Volver al inicio</a></p>
</body>
</html>