<?php
session_start();
if($_SESSION["belepve"] == "igen")
{
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "nevelde";
$type = "";
$lvl = "";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT user, type, lvl FROM alap WHERE user = '".$_SESSION["user"]."'";
$result = $conn->query($sql);
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