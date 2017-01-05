<?php
include 'sqlhelper.php';
session_start();
if($_SESSION["belepve"] == "igen")
{
$myusername = hash('sha256', $_SESSION["user"]);
$sql = "SELECT user, type, lvl FROM alap WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$type = $row["type"];
$lvl = $row["lvl"];
}}
echo "<h1>Helló ".$_SESSION["user"]." a ".$type."!</h1>";	
echo "Szinted: ".$lvl;
echo '<form method="POST" action="logout.php">';
echo '<input type="submit" value="Kilép"/>';
echo '</form>';
}
?>