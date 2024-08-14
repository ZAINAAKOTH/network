<?php
session_start();
if (isset($_SESSION['userid'])) {
	header("locatio:screen2.php");
	exit();
	
}
$msg = null;
include "dbconfig.php";
if (isset($_POST["login"])) {
	// submitted user data
	$userPhonenumber = $_POST['number'];
	$userEmail = $_POST['']
}
























?>













<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>network</title>
</head>
<body>
	

</body>
</html>