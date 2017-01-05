<style>
.error {color: #FF0000;}
</style>
<?php
$nameErr = $emailErr = $genderErr = $passErr = "";
$name = $email = $gender = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
      $nameErr = "csak betűk és számok"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email kell";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "rossz email formátum"; 
    }
  }
    
  if (empty($_POST["pass"])) {
    $pass = "";
	 $passErr = "kell jelszó"; 
  } else {
    $pass = test_input($_POST["pass"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "válassz típust";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Regisztráció</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Felhasználó: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Jelszó: <input type="text" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  Típus:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="kecske") echo "ok";?> value="kecske">Kecske
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="bojler") echo "ok";?> value="bojler">Bojler
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="heli") echo "ok";?> value="heli">Apache
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Regisztrálok">  
</form>

<?php
if (isset($gender) && $name != "" && $pass != "" && $email != "")
	{
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "nevelde";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "INSERT INTO alap (user, email, pass, type, lvl)
		VALUES ('" . $name ."', '" . $email . "', '" . $pass . "', '" . $gender . "', 1)";

		if ($conn->query($sql) === TRUE) {
		echo "sikeres reg.";
		} else {
			echo "hiba: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>