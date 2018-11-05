<?php 
session_start();
if( isset($_POST['id']) && isset($_POST['name']) ){
    $_SESSION[$_POST['id']]=$_POST['name'];
    header('Location: index.php');
}else{
    
}

?>