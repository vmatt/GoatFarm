<?php
session_start();
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "nevelde";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


	  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pass']); 
      
      $sql = "SELECT idalap FROM alap WHERE user = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
		
      if($count == 1) 
	  {
		  $_SESSION["belepve"] = "igen";
		  $_SESSION["user"] = $_POST['username'];
		  echo "Sikeres belépés.";
          echo '<script>setTimeout(function() {window.location = "main.php";}, 1500);</script>';
      }
	  else 
	  {
		 echo "Helytelen belépés";
         echo '<script>alert("Helytelen belépés.");setTimeout(function() {window.location = "index.html";}, 2500);</script>';
		 //header("location: index.html");
      }

$conn->close();

?>