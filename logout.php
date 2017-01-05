<?php
include 'sqlhelper.php';
session_start();
if($_SESSION["belepve"] == "igen")
{
unset($_SESSION["belepve"]);
unset($_SESSION["user"]);
session_destroy();
header("Location: index.html");
}
else
{
session_destroy();
header("Location: index.html");
}
?>