<style>
.error {color: #FF0000;}
</style>
<?php
$nameErr = $emailErr = $genderErr = $passErr = $typeErr = $nemErr = "";
$name = $email = $gender = $pass = $type = $nem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "kell név";
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
  if (empty($_POST["type"])) {
    $typeErr = "válassz típust";
  } else {
    $type = test_input($_POST["type"]);
  }
  if (empty($_POST["nem"])) {
    $nemErr = "válassz nemet";
  } else {
    $nem = test_input($_POST["nem"]);
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
  Jelszó: <input type="password" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  Típus:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="kecske") echo "ok";?> value="kecske" checked>Kecske
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="bojler") echo "ok";?> value="bojler">Bojler
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="heli") echo "ok";?> value="heli">Apache
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Típus2:
  <input type="radio" name="type" <?php if (isset($type) && $type=="1") echo "ok";?> value="1" checked>ver1
  <input type="radio" name="type" <?php if (isset($type) && $type=="2") echo "ok";?> value="2">ver2
  <span class="error">* <?php echo $typeErr;?></span>
  <br><br>
  Nem:
  <input type="radio" name="nem" <?php if (isset($nem) && $nem=="him") echo "ok";?> value="him" checked>Hím
  <input type="radio" name="nem" <?php if (isset($nem) && $nem=="nosteny") echo "ok";?> value="nosteny">Nőstény
  <span class="error">* <?php echo $nemErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Regisztrálok">  
</form>

<?php
include 'sqlhelper.php';
if (isset($gender) && $name != "" && $pass != "" && $email != "")
	{
		session_start();
		
		$myusername = hash('sha256', $name);
		$mypassword = hash('sha256', $pass);
		$sql = "INSERT INTO alap (user, email, pass, type, lvl, faj, gender)
		VALUES ('" . $myusername ."', '" . $email . "', '" . $mypassword . "', '" . $gender . "', 1, ".$type.", '".$nem."')";
		if (runSql($sql) === TRUE) {
		echo "sikeres reg.";
		} else {
			echo "hiba: " . $sql;
		}
	}
?>