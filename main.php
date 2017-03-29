<<<<<<< HEAD
<?php
include 'sqlhelper.php';
session_start();
var_dump ($_SESSION);
if($_SESSION["belepve"] == "igen")
{
$myusername = $_SESSION["user"];


if (!empty($_POST["eszik"])) 
{
	echo "omnom";
	eat($myusername);
}

if (!empty($_POST["iszik"])) 
{
	echo "szürcs";
	drink($myusername);
}


$sql = "SELECT user, type, lvl, gender FROM alap WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$type = $row["type"];
$lvl = $row["lvl"];
$nem = $row["gender"];
}}

$sql = "SELECT hunger,szomj FROM alap WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$hunger = $row["hunger"];
$szomj = $row["szomj"];
}}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Main</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">KecskeNevelde</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Főoldal</a>
                    </li>
                    <li>
                        <a href="#">Küldetések</a>
                    </li>
                    <li>
                        <a href="#">KECSKEEEEEE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">


            </div>

            <div class="col-md-4">
                <div class="well">
                    <h4><i class="fa fa-user"></i> Profil</h4>
                    <div class="input-group">
					<p><b>Név: </b> <?php echo $_SESSION["user"];?></p>
					<p><b>Szint: </b> <?php echo $lvl; ?></p>
					<p><b>Típus: </b> <?php echo $type; ?></p>
					<p><b>Nem: </b> <?php echo $nem; ?></p>
					<p><b>Éhség: </b> <?php echo $hunger; ?> / 100</p>
					<p><b>Szomj: </b> <?php echo $szomj; ?> / 100</p>
					
					<?php
						echo '<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">';
						echo '<input type="submit" name="eszik" value="Egyél"/>';
						echo '</form>';

						echo '<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">';
						echo '<input type="submit" name="iszik" value="Igyál"/>';
						echo '</form>';
					?>
					
					<?php
						echo '<form method="POST" action="logout.php">';
						echo '<input type="submit" value="Kijelentkezés"/>';
						echo '</form>';
					?>
                    </div>
                </div>
            </div>
			
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Kabát - KecskeNevelde 2017</p>
                </div>
            </div>
        </footer>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
}
=======
<?php
include 'sqlhelper.php';
session_start();
if($_SESSION["belepve"] == "igen")
{
$myusername = hash('sha256', $_SESSION["user"]);


if (!empty($_POST["eszik"])) 
{
	echo "omnom";
	kajol($myusername);
}

if (!empty($_POST["iszik"])) 
{
	echo "szürcs";
	iszik($myusername);
}


$sql = "SELECT user, type, lvl, gender FROM alap WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$type = $row["type"];
$lvl = $row["lvl"];
$nem = $row["gender"];
}}

$sql = "SELECT hunger,szomj FROM extended WHERE user = '".$myusername."'";
$result = runSql($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$hunger = $row["hunger"];
$szomj = $row["szomj"];
}}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Main</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">KecskeNevelde</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Főoldal</a>
                    </li>
                    <li>
                        <a href="#">Küldetések</a>
                    </li>
                    <li>
                        <a href="#">KECSKEEEEEE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">


            </div>

            <div class="col-md-4">
                <div class="well">
                    <h4><i class="fa fa-user"></i> Profil</h4>
                    <div class="input-group">
					<p><b>Név: </b> <?php echo $_SESSION["user"];?></p>
					<p><b>Szint: </b> <?php echo $lvl; ?></p>
					<p><b>Típus: </b> <?php echo $type; ?></p>
					<p><b>Nem: </b> <?php echo $nem; ?></p>
					<p><b>Éhség: </b> <?php echo $hunger; ?> / 100</p>
					<p><b>Szomj: </b> <?php echo $szomj; ?> / 100</p>
					
					<?php
						echo '<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">';
						echo '<input type="submit" name="eszik" value="Egyél"/>';
						echo '</form>';

						echo '<form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">';
						echo '<input type="submit" name="iszik" value="Igyál"/>';
						echo '</form>';
					?>
					
					<?php
						echo '<form method="POST" action="logout.php">';
						echo '<input type="submit" value="Kijelentkezés"/>';
						echo '</form>';
					?>
                    </div>
                </div>
            </div>
			
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Kabát - KecskeNevelde 2017</p>
                </div>
            </div>
        </footer>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
}
>>>>>>> 568547951b4c6aeb908e7ace91b18c83acb4f354
?>