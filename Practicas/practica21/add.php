<?php 
session_start();
require_once('pdo.php');

if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

if ( isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
    $make=$_POST['make'];
    $year=$_POST['year'];
    $mileage=$_POST['mileage'];
    
    if ($make!=""){
        if(is_numeric($year)==true && ($year%1)==0 && is_numeric($mileage)==true && ($mileage%1)==0 ){
            
            $sql = "INSERT INTO autos
         VALUES (null, :make, :year, :mileage)";
            $_SESSION['success'] = "Coche anadido correctamente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':make' => htmlentities($_POST['make']),
                ':year' => $_POST['year'],
                ':mileage' => $_POST['mileage']));
            header("Location: view.php");
            return;
        }else{
            $_SESSION['error'] = "Add fail ".$_POST['year'].", ".$_POST['mileage']." Kilometraje y a&ntildeo deben ser numericos";
            header("Location: add.php");
            return;
        }
        
    }else{
        $_SESSION['error'] = "El campo marca es obligatorio";
        header("Location: add.php");
        return;
    }
    
}


?>


<html>
<head></head>

<body>

 <p>Add A New Car</p>
 <form method="post">
 <p>Make:<input type="text" name="make" size="40"></p>
 <p>Year:<input type="text" name="year"></p>
 <p>Mileage:<input type="text" name="mileage"></p>
 <p><input style ='float: left;' type="submit" value="Add New"/></p>
 </form>
 
<form  action="view.php">
  <input type = 'submit' value="Cancelar"/>
</form>

</body>
</html>