<style>
.error {color: #FF0000;}
</style>
<?php
$nameErr = $emailErr = $genderErr = $passErr = $typeErr = $nemErr = "";
$name = $email = $gender = $pass = $type = $nem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Hiányzó név!";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
      $nameErr = "Csak betűket és számokat tartalmazhat!"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Hiányzó e-mail!";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Helytelen e-mail formátum!"; 
    }
  }
    
  if (empty($_POST["pass"])) {
    $pass = "";
	 $passErr = "Hiányzó jelszó!"; 
  } else {
    $pass = test_input($_POST["pass"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Hiányzó típus!";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["type"])) {
    $typeErr = "Hiányzó típus!";
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
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Regisztráció</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div class="row">
		<form method="post" class="form-signin" style="text-align: left;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<h2 style="text-align: center;" class="form-signin-heading">Regisztráció</h2>
			<p>Felhasználó: <span class="error">* <?php echo $nameErr;?></span></p>
			<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
			
			<p>E-mail: <span class="error">* <?php echo $emailErr;?></span></p>
			<input class="form-control" type="text" name="email" value="<?php echo $email;?>">
			
			<p>Jelszó: <span class="error">* <?php echo $passErr;?></span></p>
			<input class="form-control" type="password" name="pass" value="<?php echo $pass;?>">
			
			<p>Típus: <span class="error">* <?php echo $genderErr;?></span></p>
			<div class="row">
				<input style="margin-left: 15px;" type="radio" id="kecske" name="gender" <?php if (isset($gender) && $gender=="kecske") echo "ok";?> value="kecske" checked><label for="kecske"> Kecske</label>
				<input style="margin-left: 15px;" type="radio" id="bojler" name="gender" <?php if (isset($gender) && $gender=="bojler") echo "ok";?> value="bojler"><label for="bojler"> Bojler</label>
				<input style="margin-left: 15px;" type="radio" id="heli" name="gender" <?php if (isset($gender) && $gender=="heli") echo "ok";?> value="heli"><label for="heli"> Apache</label>
			</div>
			
			<p>Típus2: <span class="error">* <?php echo $typeErr;?></span></p>
			<div class="row">
				<input style="margin-left: 15px;" id="ver1" type="radio" name="type" <?php if (isset($type) && $type=="1") echo "ok";?> value="1" checked><label for="ver1"> ver1</label>
				<input style="margin-left: 15px;" id="ver2" type="radio" name="type" <?php if (isset($type) && $type=="2") echo "ok";?> value="2"><label for="ver2"> ver2</label>
			</div>
			
			<p>Nem: <span class="error">* <?php echo $nemErr;?></span></p>
			<div class="row">
				<input style="margin-left: 15px;" type="radio" id="him" name="nem" <?php if (isset($nem) && $nem=="him") echo "ok";?> value="him" checked><label for="him"> Hím</label>
				<input style="margin-left: 15px;" type="radio" id="nosteny" name="nem" <?php if (isset($nem) && $nem=="nosteny") echo "ok";?> value="nosteny"><label for="nosteny"> Nőstény</label>
			</div>
			
			
			<br>
			
			<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" style="margin-bottom: 20px;" value="Regisztrálok">
			<a href="/">Vissza a főoldalra</a> 
		</form>
	</div>
</body>
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