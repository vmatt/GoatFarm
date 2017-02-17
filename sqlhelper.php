<?php
function runSql($parancs)
	{
	$servername = "localhost";
	$username = "root";
	$password = "root";
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
	$active = getVar('extended','premium',$user);
	if($active == 1)
	{
		return true;
	}
	return false;
}
function updateKaja($user)
{
	$hunger = getVar('extended','hunger',$user);
	$lastkaja = getVar('extended','lastkaja',$user);
	if (((time() - $lastkaja) / 600) >= 1)
	{
		if ($hunger - ((time() - $lastkaja) / 600) > 0)
		{
		runSql("UPDATE extended SET hunger='".(100 - ((time() - $lastkaja) / 600))."' WHERE user='".$user."'");
		}
		else
		{
		runSql("UPDATE extended SET hunger='0' WHERE user='".$user."'");
		}
	}
}
function updatePia($user)
{
	$szomj = getVar('extended','szomj',$user);
	$lastpia = getVar('extended','lastpia',$user);
	if (((time() - $lastpia) / 600) >= 1)
	{
		if ($szomj - ((time() - $lastpia) / 600) > 0)
		{
		runSql("UPDATE extended SET szomj='".(100 - ((time() - $lastpia) / 600))."' WHERE user='".$user."'");
		}
		else
		{
		runSql("UPDATE extended SET szomj='0' WHERE user='".$user."'");
		}
	}
}
function addXp($user, $xp)
{
	$currentxp = getVar('extended','xp',$user);
	runSql("UPDATE extended SET xp='".$currentxp + $xp."' WHERE user='".$user."'");
}
function addMoney($user, $money)
{
	$currentmoney = getVar('extended','money',$user);
	runSql("UPDATE extended SET money='".$currentmoney + $money."' WHERE user='".$user."'");
}
function initLogin($user)
{
	$result = runSql("SELECT user FROM extended WHERE user = '".$user."'");
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);
	if($count == 0) 
	{
	$sql = "INSERT INTO extended (user, xp, money, premium, szomj, hunger, lastkaja, lastpia)
		VALUES ('" . $user ."', '0', '0', '0', 100, 100, 0, 0)";
		runSql($sql);
	}
}
function kajol($user)
{
	runSql("UPDATE extended SET hunger='100',lastkaja=".time()." WHERE user='".$user."'");
}
function iszik($user)
{
	runSql("UPDATE extended SET szomj='100',lastpia=".time()." WHERE user='".$user."'");
}
?>