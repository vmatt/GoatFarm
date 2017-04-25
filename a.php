<?php
$_SESSION["belepve"] = "igen";
$_SESSION["user"]="asd";
require_once 'controller.php';
$c = new Controller();
$c->ShowMain();
?>