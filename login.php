<?php
include 'sqlhelper.php';
session_start();
//$username = $_POST['username'];
$username = $_POST['username'];
$hashed_password = hash('sha256', $_POST['pass']);
$sql = "SELECT idalap FROM alap WHERE user = '".$username."' and pass = '".$hashed_password."'";
$result = runSql($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

//mail aktiváció - UD
$active = $row['activated'];
//van-e egyező felhaszánló
$count = mysqli_num_rows($result);
		
if($count == 1) 
{
  $_SESSION["belepve"] = "igen";
	$_SESSION["user"] = $_POST['username'];
	initLogin($username);
	updateKaja($username);
	updatePia($username);
  echo "Sikeres belépés.";
  echo '<script>setTimeout(function() {window.location = "main.php";}, 150);</script>';
}
else 
{
	echo "Helytelen belépés";
    echo '<script>setTimeout(function() {window.location = "index.html";}, 2500);</script>';
	//header("location: index.html");
}
	
?>