<?php
require_once('pdo.php');

if(isset($_GET['email'])){
    
    if ( isset($_POST['auto_id']) ) {
        $sql="DELETE FROM autos WHERE auto_id = :zip";
        echo "<pre>\n$sql\n</pre>\n";
        $stmt = $pdo->prepare($sql);
        echo "<p id='res'>borrado completado</p>";
        $stmt->execute(array(':zip'=>$_POST['auto_id'])); }
        
        
        if ( isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
            $make=$_POST['make'];
            $year=$_POST['year'];
            $mileage=$_POST['mileage'];
            
            if ($make!=""){
                if(is_numeric($year)==true && ($year%1)==0 && is_numeric($mileage)==true && ($mileage%1)==0 ){
                    
                    $sql = "INSERT INTO autos
         VALUES (null, :make, :year, :mileage)";
                    echo "<p id='res'>Coche a&ntildeadido correctamente<p>";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ':make' => $_POST['make'],
                        ':year' => $_POST['year'],
                        ':mileage' => $_POST['mileage']));
                    
                }else{
                    echo "<p>Kilometraje y a&ntildeo deben ser numericos</p>";
                }
                
            }else{
                echo "<p>El campo marca es obligatorio</p>";
            }
            
        }
    
}else{
    die("Name parameter missing");
}


     
 
 

  ?>


 <html>
 <head>
 <style>

#res{
color:green;
} 

 </style>
 </head><body>
 <p>Add A New Car</p>
 <form method="post">
 <p>Make:<input type="text" name="make" size="40"></p>
 <p>Year:<input type="text" name="year"></p>
 <p>Mileage:<input type="text" name="mileage"></p>
 <p><input type="submit" value="Add New"/></p>
 </form>

<?php
echo "<table>";
$stmt2 = $pdo->query("SELECT auto_id, make, year, mileage FROM autos");
 while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
 echo "<tr><td>";
 echo("marca: ".$row['make']);
 echo("</td><td>");
 echo("a&ntildeo: ".$row['year']);
 echo("</td><td>");
 echo("Kilometraje: ".$row['mileage']);
 echo("</td><td>");
 
?>
 <form method="post"><p>
 <input type="hidden" name="auto_id" value="<?php echo  $row['auto_id'];?>"></p>
 <p><input type="submit" value="Delete"/></p>
 </form></tr>
<?php
echo "</td>";
 }
echo "</table>"; 
?>

<form action="index.php">
    <input type="submit" value="Cerrar Sesion" />
</form>
 </body>