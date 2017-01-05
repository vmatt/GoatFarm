<?php
function runSql($parancs)
	{
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "nevelde";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($parancs);
	$conn->close();
	return $result;
    }
?>