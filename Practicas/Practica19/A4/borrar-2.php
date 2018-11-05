<?php 
session_start();

if( isset($_POST['checkboxvar']) ){
    foreach($_POST['checkboxvar'] as $id=>$val)
    {
        unset($_SESSION[$val]);
    }
    header('Location: index.php');
}else{
    header('Location: borrar-1.php');
}

?>