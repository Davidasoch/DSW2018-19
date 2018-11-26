
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<title>David</title>
<body>
<h2>Login</h2>

<form method="post">
<p><label for="loginu">Correo</label>
<input type="text" name="email" id="loginu" size="10" value="" required></p>
<p><label for="loginp">Contrase&ntildea</label>
<input type="password" name="pass" id="loginp" size="10" value="" required></p>
<input type="submit" value="Iniciar sesion">
</form>


<script>
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Se requiere correo y clave para acceder");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})


</script>

<?php 
require_once('pdo.php');

if ( ! isset($_COOKIE['id']) ) {
    setcookie('id', '77', time()+3600);
} 
session_start();

$salt = 'XyZzy12*_';

$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';


if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}


if (isset($_POST["email"])){
    if(strpos($_POST["email"], '@') !== false){
        
    
    if (isset($_POST["pass"])){
        if(hash('md5', $salt.$_POST["pass"])==$stored_hash){       
            $_SESSION['name'] = $_POST['email'];
            header("Location: view.php");
            return;
        }else{
            $_SESSION['error'] = "Login fail ".$_POST['email']." incorrect password";
            header("Location: index.php");
            return;
            }

        }
    }else{
        $_SESSION['error'] = "Login fail ".$_POST['email']." isnt an email";
        header("Location: index.php");
        return;
    }
}




?>

</body>
</html>