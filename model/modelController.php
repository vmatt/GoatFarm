<?php
class Model {
		public $connection;
		private $servername,$username,$password,$dbname;
	  function __construct() {
			$args = func_get_args();
			$this->servername=$args[0];
			$this->username=$args[1];
			$this->password=$args[2];
			$this->dbname=$args[3];
			$this->connection = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
    }
	
	function runSql($cmd) {				
		if ($this->connection->connect_error) {
			return("Connection failed: " . $conn->connect_error);
		}
		$result = $this->connection->query($cmd);
		$this->connection->close();
		return ($result);
			}
	 function getVar($table,$var,$user){
		$sql = "SELECT ".$var." FROM ".$table." WHERE user = '".$user."'";
		$result = $this->runSql($sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row[$var];
		return ($active);
	}
	function isPremium($user){
		$active = $this->getVar('alap','premium',$user);
		if($active == 1)
		{
			return true;
		}
		echo false;
	}
	function updateKaja($user){
		$hunger = $this->getVar('alap','hunger',$user);
		$lastEat = $this->getVar('alap','lastEat',$user);
		if (((time() - $lastEat) / 600) >= 1)
		{
			if ($hunger - ((time() - $lastEat) / 600) > 0)
			{
			 $this->runSql("UPDATE alap SET hunger='".(100 - ((time() - $lastEat) / 600))."' WHERE user='".$user."'");
			}
			else
			{
			 $this->runSql("UPDATE alap SET hunger='0' WHERE user='".$user."'");
			}
		}
	}
	function updatePia($user){
		$szomj =  $this->getVar('alap','szomj',$user);
		$lastDrink =  $this->getVar('alap','lastDrink',$user);
		if (((time() - $lastDrink) / 600) >= 1)
		{
			if ($szomj - ((time() - $lastDrink) / 600) > 0)
			{
			 $this->runSql("UPDATE alap SET szomj='".(100 - ((time() - $lastDrink) / 600))."' WHERE user='".$user."'");
			}
			else
			{
			 $this->runSql("UPDATE alap SET szomj='0' WHERE user='".$user."'");
			}
		}
	}
	function addXp($user, $xp){
		$currentxp =  $this->getVar('alap','xp',$user);
		 $this->runSql("UPDATE alap SET xp='".$currentxp + $xp."' WHERE user='".$user."'");
	}
	function addMoney($user, $money){
		$currentmoney =  $this->getVar('alap','money',$user);
		 $this->runSql("UPDATE alap SET money='".$currentmoney + $money."' WHERE user='".$user."'");
	}
	function initLogin($user){
		$result =  $this->runSql("SELECT user FROM alap WHERE user = '".$user."'");
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		$count = mysqli_num_rows($result);
		if($count == 0) 
		{
		$sql = "INSERT INTO alap (user, xp, money, premium, szomj, hunger, lastEat, lastDrink)
			VALUES ('" . $user ."', '0', '0', '0', 100, 100, 0, 0)";
			 $this->runSql($sql);
		}
	}
	function eat($user){
		 $this->runSql("UPDATE alap SET hunger='100',lastEat=".time()." WHERE user='".$user."'");
	}
	function drink($user)	{
		 $this->runSql("UPDATE alap SET szomj='100',lastDrink=".time()." WHERE user='".$user."'");
	}
	function MainModel() {
		session_start();
		if($_SESSION["belepve"] == "igen")
		{
		$myusername = $_SESSION["user"];
		}

		if (!empty($_POST["eszik"])) 
		{
			echo "omnom";
			$this->eat($myusername);
		}

		if (!empty($_POST["iszik"])) 
		{
			echo "szürcs";
			$this->drink($myusername);
		}

var_dump($_SESSION);
		$sql = "SELECT user, type, lvl, gender, hunger, szomj FROM alap WHERE user = '".$myusername."'";
		$result = $this->runSql($sql);
		if ($result->num_rows > 0) {
		return ($result->fetch_assoc());
		}}
}
?>