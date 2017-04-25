<?php
function runSql($parancs)
	{
	$servername = "localhost";
	$username = "demo";
	$password = "asdlolxd";
	$dbname = "demo";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		return("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($parancs);
	$conn->close();
	return ($result);
    }
function getVar($table,$var,$user)
{
	$sql = "SELECT ".$var." FROM ".$table." WHERE user = '".$user."'";
	$result = runSql($sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row[$var];
	return ($active);
}
function isPremium($user)
{
	$active = getVar('alap','premium',$user);
	if($active == 1)
	{
		return true;
	}
	return false;
}
function updateKaja($user)
{
	$hunger = getVar('alap','hunger',$user);
	$lastEat = getVar('alap','lastEat',$user);
	if (((time() - $lastEat) / 600) >= 1)
	{
		if ($hunger - ((time() - $lastEat) / 600) > 0)
		{
		runSql("UPDATE alap SET hunger='".(100 - ((time() - $lastEat) / 600))."' WHERE user='".$user."'");
		}
		else
		{
		runSql("UPDATE alap SET hunger='0' WHERE user='".$user."'");
		}
	}
}
function updatePia($user)
{
	$szomj = getVar('alap','szomj',$user);
	$lastDrink = getVar('alap','lastDrink',$user);
	if (((time() - $lastDrink) / 600) >= 1)
	{
		if ($szomj - ((time() - $lastDrink) / 600) > 0)
		{
		runSql("UPDATE alap SET szomj='".(100 - ((time() - $lastDrink) / 600))."' WHERE user='".$user."'");
		}
		else
		{
		runSql("UPDATE alap SET szomj='0' WHERE user='".$user."'");
		}
	}
}
function addXp($user, $xp)
{
	$currentxp = getVar('alap','xp',$user);
	runSql("UPDATE alap SET xp='".$currentxp + $xp."' WHERE user='".$user."'");
}
function addMoney($user, $money)
{
	$currentmoney = getVar('alap','money',$user);
	runSql("UPDATE alap SET money='".$currentmoney + $money."' WHERE user='".$user."'");
}
function initLogin($user)
{
	$result = runSql("SELECT user FROM alap WHERE user = '".$user."'");
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);
	if($count == 0) 
	{
	$sql = "INSERT INTO alap (user, xp, money, premium, szomj, hunger, lastEat, lastDrink)
		VALUES ('" . $user ."', '0', '0', '0', 100, 100, 0, 0)";
		runSql($sql);
	}
}
function eat($user)
{
	runSql("UPDATE alap SET hunger='100',lastEat=".time()." WHERE user='".$user."'");
}
function drink($user)
{
	runSql("UPDATE alap SET szomj='100',lastDrink=".time()." WHERE user='".$user."'");
}
?>
