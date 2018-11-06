<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<title>David</title>
<body>
<h2>Login</h2>

<form method="post">
<p><label for="loginu">Correo</label>
<input type="email" name="email" id="loginu" size="10" value="" required></p>
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

$salt = 'XyZzy12*_';

$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';



if (isset($_POST["email"])){
    if (isset($_POST["pass"])){
        if(hash('md5', $salt.$_POST["pass"])==$stored_hash){
            header("Location:autos.php?email=".urlencode($_POST['email']));
        }else{
            echo "<p>La contrase&ntildea introducida es incorrecta</p>";
            echo error_log("Login fail ".$_POST['email']);
        }

    }
}



?>
</body>
</html>