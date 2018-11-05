<?php
session_start();
if (isset($_SESSION['num'])){
    if($_REQUEST['var']=='sum'){
        $_SESSION['num']+=1;
    }else{
        $_SESSION['num']-=1;
    }
}
header('Location: index.php');
?>