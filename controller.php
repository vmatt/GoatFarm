<?php 
require_once "views/viewController.php";
require_once "model/modelController.php";

class Controller {
	public $m,$v;
	function __construct(){
			//host,user,passwd,tablename
			$this->m = new Model('localhost','demo','asdlolxd','demo');
			$this->v = new View;
	}
	function ShowMain(){
		$userdata = $this->m->MainModel();
		$this->v->MainView($userdata);
		
	}
	function ShowLogin(){
		
	}
	function loginProcess(){
		session_start();
		$username = $_POST['username'];
		$hashed_password = hash('sha256', $_POST['pass']);
		$sql = "SELECT idalap FROM alap WHERE user = '".$username."' and pass = '".$hashed_password."'";
		$result = $m->runSql($sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		//mail aktiváció - UD
		$active = $row['activated'];
		//van-e egyező felhaszánló
		$count = mysqli_num_rows($result);

		if($count == 1) 
		{
			$_SESSION["belepve"] = "igen";
			$_SESSION["user"] = $_POST['username'];
			$m->initLogin($username);
			$m->updateKaja($username);
			$m->updatePia($username);
			echo "Sikeres belépés.";
			echo '<script>setTimeout(function() {window.location = "main.php";}, 1500000);</script>';
		}
		else 
		{
			echo "Helytelen belépés";
				echo '<script>setTimeout(function() {window.location = "index.html";}, 2500);</script>';
			//header("location: index.html");
		}
	}
}
?>