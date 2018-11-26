    <?php
require_once('pdo.php');
session_start();

if(isset($_POST['auto_id'])){
    $_SESSION['del_id']=$_POST['auto_id'];
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
        <form method="post">
        <input type="hidden" name="del_id" value="<?php echo $_SESSION['del_id'];?>"></p>
    		<input type="submit" value="Borrar" />
		</form>

		<form action="view.php">
    		<input type="submit" value="Cancelar" />
		</form>
	</body>
</html>