<?php require_once "pdo.php";
session_start();


if ( ! isset($_SESSION['name']) ) {
    die('Acces Denied');
}

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

if ( isset($_POST['newmake']) && isset($_POST['newyear']) && isset($_POST['newmileage'])){
    $make=$_POST['newmake'];
    $year=$_POST['newyear'];
    $mileage=$_POST['newmileage'];
    $auto_id=$_POST['acauto_id'];
    
    if ($make!=""){
        if(is_numeric($year)==true && ($year%1)==0 && is_numeric($mileage)==true && ($mileage%1)==0 ){
            
            $sql = "UPDATE autos SET
         make= :make, year=:year, mileage=:mileage WHERE auto_id=:auto_id";
            $_SESSION['success'] = "Coche actualizado correctamente";
            
            unset($_SESSION['make']);
            unset($_SESSION['year']);
            unset($_SESSION['mileage']);
            unset($_SESSION['auto_id']);
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':make' => htmlentities($make),
                ':year' => htmlentities($year),
                ':mileage' => htmlentities($mileage),
                ':auto_id' => htmlentities($auto_id)));
            header("Location: view.php");
            return;
        }else{
            $_SESSION['error'] = "Add fail ".$year.", ".$mileage.", Kilometraje y a&ntildeo deben ser numericos";
            header("Location: edit.php");
            return;
        }
        
    }else{
        $_SESSION['error'] = "El campo marca es obligatorio";
        header("Location: edit.php");
        return;
    }
    
}


if(isset($_POST['auto_id'])){
    
$stmt = $pdo->prepare("SELECT * FROM autos where auto_id = :xyz");
$stmt->execute(array(":xyz" => $_POST['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for user_id'; header( 'Location: edit.php' ) ; 
    return;
}

$_SESSION['make'] = htmlentities($row['make']);
$_SESSION['year'] = htmlentities($row['year']);
$_SESSION['mileage'] = htmlentities($row['mileage']);
$_SESSION['auto_id'] = $row['auto_id'];
}
?>
<html>
<body>
 <p>Edit car</p>
  <form method="post"> 
  	<p>Make: <input type="text" name="newmake" value="<?php echo($_SESSION['make']) ?>"></p>
    <p>Year: <input type="text" name="newyear" value="<?php echo($_SESSION['year']) ?>"></p>
    <p>Mileage: <input type="text" name="newmileage" value="<?php echo($_SESSION['mileage']) ?>">
    </p> <input type="hidden" name="acauto_id" value="<?php echo($_SESSION['auto_id']) ?>">
    <p><input style ='float: left;' type="submit" value="Actualizar"/>
   </form> 
   <form  action="view.php">
  <input type = 'submit' value="Cancelar"/>
</form>
   </body>
   </html>