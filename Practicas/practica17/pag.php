<?php
require_once('pdo.php');

if ( isset($_POST['user_id']) ) {
 $sql="DELETE FROM Usuarios WHERE user_id = :zip";
 echo "<pre>\n$sql\n</pre>\n";
 $stmt = $pdo->prepare($sql);
echo 'borrado completado';
 $stmt->execute(array(':zip'=>$_POST['user_id'])); } 


if ( isset($_POST['name']) && isset($_POST['email'])
 && isset($_POST['password']) && isset($_POST['dept'])) {
 $sql = "INSERT INTO Usuarios
 VALUES (null, :name, :email, :password, :dept)";
echo 'Usuario añadido correctamente';
 echo("<pre>\n".$sql."\n</pre>\n");
 $stmt = $pdo->prepare($sql);
 $stmt->execute(array(
 ':name' => $_POST['name'],
 ':email' => $_POST['email'],
 ':password' => $_POST['password'],
 ':dept' => $_POST['dept']));
 } ?><html><head></head><body>
 <p>Add A New User</p>
 <form method="post">
 <p>Name:<input type="text" name="name" size="40"></p>
 <p>Email:<input type="text" name="email"></p>
 <p>Password:<input type="password" name="password"></p>
 <p>Department:<input type="text" name="dept"</p>
 <p><input type="submit" value="Add New"/></p>
 </form>

<?php
echo "<table>";
$stmt2 = $pdo->query("SELECT user_id, user, email, password, departamento FROM Usuarios");
 while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
 echo "<tr><td>";
 echo($row['user']);
 echo("</td><td>");
 echo($row['email']);
 echo("</td><td>");
 echo($row['departamento']);
 echo("</td><td>");
 
?>
 <form method="post"><p>
 <input type="hidden" name="user_id" value="<?php echo  $row['user_id'];?>"></p>
 <p><input type="submit" value="Delete"/></p>
 </form></tr>
<?php
echo "</td>";
 }
echo "</table>"; 
?>
 </body>
