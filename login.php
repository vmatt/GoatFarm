<?php
include 'sqlhelper.php';
session_start();
error_reporting(0);
$username = $_POST['username'];
$hashed_password = hash('sha256', $_POST['pass']);

loginToSite($username,$hashed_password)
?>