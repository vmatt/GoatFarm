<?php
include 'sqlhelper.php';
session_start();
if($_SESSION["belepve"] == "igen")
{
$myusername = hash('sha256', $_SESSION["user"]);
	updateKaja($myusername);
	updatePia($myusername);
	
	if (empty($_POST["eszik"])) 
	{  } 
	else 
	{
		echo "omnom";
	  kajol($myusername);
	}
	if (empty($_POST["iszik"])) 
	{  } 
	else 
	{
		echo "szürcs";
	  iszik($myusername);
	}
$sql = "SELECT user, type, lvl FROM alap WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$type = $row["type"];
$lvl = $row["lvl"];
}}
$sql = "SELECT hunger,szomj FROM extended WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$hunger = $row["hunger"];
$szomj = $row["szomj"];
}}
echo "<h1>Helló ".$_SESSION["user"]." a ".$type."!</h1>";	
echo "Szinted: ".$lvl."<br>";
echo "Éhség: ".$hunger."/100<br>";
echo "Szomj: ".$szomj."/100<br>";
echo '<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">';
echo '<input type="submit" name="eszik" value="Egyél"/>';
echo '</form>';

echo '<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">';
echo '<input type="submit" name="iszik" value="Igyál"/>';
echo '</form>';

echo '<form method="POST" action="logout.php">';
echo '<input type="submit" value="Kilép"/>';
echo '</form>';
}
?>