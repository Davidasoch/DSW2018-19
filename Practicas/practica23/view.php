<?php 
session_start();
require_once('pdo.php');

if ( ! isset($_SESSION['name']) ) {
    die('Not logged in');
}

if ( isset($_SESSION['success']) ) {
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

?>


<html>
<head>

<style>
table, th, td {
    border: 1px solid black;
        border-collapse: collapse;
        padding: 8px;
}
</style>

</head>

<body>


 
 <?php 
 echo "<table>";
$stmt2 = $pdo->query("SELECT auto_id, make, year, mileage FROM autos");
echo "<tr><th>Marca</th><th>A&ntildeo</th><th>Kilometraje</th></tr>";
while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo($row['make']);
    echo("</td><td>");
    echo($row['year']);
    echo("</td><td>");
    echo($row['mileage']);
    echo("</td><td>");
    
    ?>
    
    <form method="post" action="edit.php">
 <p><input type="hidden" name="auto_id" value="<?php echo $row['auto_id'];?>"></p>
 <p><input type="hidden" name="make" value="<?php echo $row['make'];?>"></p>
 <p><input type="hidden" name="year" value="<?php echo $row['year'];?>"></p>
 <p><input type="hidden" name="mileage" value="<?php echo $row['mileage'];?>"></p>
 <p><input type="submit" value="Edit"/></p>
 </form>
    
 <form method="post" action="del.php"><p>
 <input type="hidden" name="auto_id" value="<?php echo $row['auto_id'];?>"></p>
 <p><input type="submit" value="Delete"/></p>
 </form></tr>
<?php
echo "</tr>";
 }
echo "</table>"; 
?>
</br>
<form action="add.php">
    <p><input style ='float: left;' type="submit" value="Nuevo coche" /></p>
</form>

<form action="logout.php">
    <input type="submit" value="Cerrar Sesion" />
</form>
</body>
</html>