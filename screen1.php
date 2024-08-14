<?PHP
if (isset($_POST["login"])){
	$Phonenumber=$_POST["phonenumber"];
	$Email=$_POST["email"];
	$Password1=$_POST["password1"];
	$Password2=$_POST["password2"];

	// start datdbase connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "networkdb";

	// check connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// check connection
	if (!$conn) {
		die("connection failed:" . mysqli_connect_error());
	}else{
		echo"successful";

	}
	// end db connection

	if (empty($Phonenumber) && empty($Email) && empty($Password1) && empty($Password2)) {
		echo"all fields are required";
	}else{
		$sql= "INSERT INTO `createtbl`(`phonenumber`, `email`, `password1`, `password2`) VALUES ('$Phonenumber','$Email','$Password1','$Password2')";

		if (mysqli_query($conn,$sql) == true) {
			header("location:screen2.php");
		}else{
			echo"something went wrong.please try again...!";
		}
	}

 }//else{
 	//echo "oops";
 //}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>network</title>
</head>
<body>
	<div><img src="Images/adjjlogo.png" id="rest"><br>
<form action="" method="POST">
<br><h1 id="tap">sign up</h1><br>
<br><label id="lamp">Enter Your Number</label></br>
<input type="text" name="phonenumber" id="ring" required><br>
<br><label id="en">Enter email</label><br>
<input type="text" name="email" id="lit" required><br>
<br><label id="pass">Enter password</label><br>
<br><input type="password" name="password1" id="mail" required><br>
<br><div><label id="word">Confirm password</label><br>
<br><input type="password" name="password2" id="rd" required><br></div>
<br>
<a href="screen2.php">
<button name="login" id="log">Log in</button alt="screen2.php"></a><br>
</form>







</body>
<style type="text/css">
	body{
		background-color:#3DBBBF;
		text-align: center;
	}
	#en{
		text-color: white;
		
		
	}
	#lit{
		background-color: #59B451;
		border-radius: 100px;
		border-color: #59B451;
		width: 250px;
		height: 35px;
	}
	#pass{
	}
	#mail{
		background-color: #59B451;
		border-radius: 100px;
		border-color: #59B451;
		width: 250px;
		height: 35px;
	}
	#word{
	}
	#rd{
		background-color: #59B451;
		border-radius: 100px;
		border-color: #59B451;
		width: 250px;
		height: 30px;
	}
	#log{
		background-color: #59B451;
		border-radius: 100px;
		color: white;
		width: 250px;
		height: 30px;
		border-color: #59B451;
		cursor: pointer;
	}

	#lamp{
	}
	#ring{
		background-color: #59B451;
		border-radius: 100px;
		border-color: #59B451;
		width: 250px;
		height: 30px;
	}
	#tap{
		font-size: 18px;
		color: white;
	
	
	}
	#tap{
		text-align: center;

	}
	#rest{
		width: 100px;
		height: 100px;
		border-radius: 100%;
	}
</style>
</html>