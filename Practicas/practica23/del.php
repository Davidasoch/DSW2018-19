    <?php
require_once('pdo.php');
session_start();

if(isset($_POST['auto_id'])){
    $_SESSION['del_id']=$_POST['auto_id'];
}

$stmt0 = $pdo->prepare("SELECT make FROM autos where auto_id = :xyz");
$stmt0->execute(array(":xyz" => $_SESSION['del_id']));
$row = $stmt0->fetch(PDO::FETCH_ASSOC);

if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for auto id';
    header( 'Location: view.php' ) ;
    return;
} 

    if ( isset($_POST['del_id']) ) {
        $sql="DELETE FROM autos WHERE auto_id = :zip";
        echo "<pre>\n$sql\n</pre>\n";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':zip'=>$_POST['del_id'])); 
        unset($_SESSION['del_id']);
        $_SESSION['success'] = "borrado completado";
        header("Location: view.php");
        return;
    }
        
        ?>
        
<html>
	<body>
	<p>Confirm: Deleting <?php echo $row['make']; ?></p> 
        <form method="post">
        <input type="hidden" name="del_id" value="<?php echo $_SESSION['del_id']?>"></p>
    		<p><input style ='float: left;' type="submit" value="Borrar" /></p>
		</form>

		<form action="view.php">
    		<input type="submit" value="Cancelar" />
		</form>
	</body>
</html>