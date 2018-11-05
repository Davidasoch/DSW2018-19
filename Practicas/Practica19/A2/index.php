<?php 
if ( ! isset($_COOKIE['id']) ) {
    setcookie('id', '77', time()+3600);
} 
session_start();

if ( ! isset($_SESSION['num'])){
    $_SESSION['num']=0;
   
}
?>

<html>
<body>
<form action="calculate.php">
<input type="hidden" name="var" value="sum">
    <input type="submit" value="+" />
</form>
<p><?php echo $_SESSION['num']?></p>
<form action="calculate.php">
<input type="hidden" name="var" value="res">
    <input type="submit" value="-" />
</form>

</body>
</html>