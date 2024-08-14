<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['userid'])) {
    // header('Location: screen3.php');
    // exit();
}

$msg = "";
include 'dbconfig.php'; // Ensure this file correctly sets up the $conn variable

if (isset($_POST['login'])) {
    $userEmail = $_POST['email'];
    $userPhonenumber = $_POST['phonenumber'];

    if (empty($userEmail) || empty($userPhonenumber)) {
        $msg = "All fields are required";
    } else {
        $sql = "SELECT * FROM createtbl WHERE email = ? AND phonenumber = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $msg = "SQL prepare failed: " . htmlspecialchars($conn->error);
        } else {
            $stmt->bind_param('ss', $userEmail, $userPhonenumber);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();

                // Successful login
                $_SESSION['username'] = $userData['email'];
                $_SESSION['userid'] = $userData['id'];
                $_SESSION['userPhonenumber'] = $userData['phonenumber'];
                $msg = "Login successful! Redirecting...";
                header('Location: screen3.php');
                exit();
            } else {
                $msg = "No user found with that email and phone number";
            }

            $stmt->close();
        }
    }
}
?>













<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>(ADJJ)network</title>
    <style type="text/css">
        body {
            background-color: #3DBBBF;
            text-align: center;
        }
        #input, #email, #login, #pass, #en {
            background-color: #59B451;
            color: #FFFFFF;
            border-radius: 100px;
            border-color: #59B451;
        }
        #input, #email, #word, #pass, #en {
            height: 35px;
            width: 250px;
        }
        #login {
            width: 100px;
        }
        #pop {
            width: 100px;
            height: 100px;
            border-radius: 100%;
        }
        #line {
        }
        .message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <br><img src="Images/adjjlogo.png" id="pop"><br>
    <br>

    <!-- Display message -->
    <?php if ($msg): ?>
        <div class="message">
            <?php echo htmlspecialchars($msg); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <label><input type="number" name="phonenumber" placeholder="Enter number" id="input"></label><br>
        <br>
        <label><input type="email" name="email" placeholder="Email" id="email"></label><br>
        <br><br>
        <button type="submit" name="login" id="login">Login</button>
        <br><br>
        <img src="Images/line.png" id="line"><br>
        <br>
       
    </form>
    <br>
</body>
</html>
<a href="https://www.facebook.com">
	<button id="pass"><svg id="let" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="#1877f2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"></path><path fill="#fff" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z"></path></svg> continue with facebook></a><br><br><br><br><br><br>


		<a href="https://www.google.com" target="_blank">
 <button id="en"><svg  id="head"xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/><path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/></svg> Continue with google></a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>
		

<br>
</body>
<style type="text/css">
	body{
		background-color: #3DBBBF;
		text-align:center;
		
	}
	#input{
		background-color: #59B451;
		color: #FFFFFF;
		border-radius: 100px;
		width: 250px;
		height: 32px;
		margin-top: 25px;
	}
	#email{
		color: #FFFFFF;
		border-radius: 100px;
		height: 35px;
		width: 250px;
		background-color:#59B451 ;
		margin-top: 25px;


	}
	#line{
		margin-top: 25px;

	}
	#word{
		background-color: #59B451;
		color: #FFFFFF;
		border-radius: 100px;
		width: 250px;
		height: 35px;
		border-color: #59B451;
	}
	#pass{
		background-color: #59B451;
		color: #FFFFFF;
		border-radius: 100px;
		font-size: 10px;
		width: 250px;
		height: 35px;
		border-color: #59B451;
		cursor: pointer;
		margin-bottom: 60px;

	}
	#en{
		background-color: #59B451;
		color: #FFFFFF;
		border-radius: 100px;
		font-size: 10px;
		width: 250px;
		height: 35px;
		cursor: pointer;
		border-color: #59B451;
		text-align: center;
		
	}
	#login{
		background-color: #59B451;
		color: #FFFFFF;
		border-radius: 100px;
		width: 100px;
		height: 35px;
		border-color: #59B451;
		cursor: pointer;
		text-align: center;
	}
	#rd{
		color:black;
		text-align: center;
	
	}
	#tap{
		background-color: #59B451;
		color: #FFFFFF;
		width: 250px;
		height: 35px;
		border-radius: 100PX;
		border-color: #59B451;
		text-align: center;
	}
	#pop{
		width: 100px;
		height: 100px;
		border-radius: 100%;
		text-align: center;
	}
	#head {
  display: inline-block;
  width: 1em;
  height: 1em;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath fill='%23ffc107' d='M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917'/%3E%3Cpath fill='%23ff3d00' d='m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691'/%3E%3Cpath fill='%234caf50' d='M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44'/%3E%3Cpath fill='%231976d2' d='M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917'/%3E%3C/svg%3E");
}
#rest{
  display: inline-block;
  width: 1em;
  height: 1em;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 36 36'%3E%3Cpath fill='%23060' d='M36 27a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V9a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4z'/%3E%3Cpath fill='%23bb1600' d='M0 13h36v10H0z'/%3E%3Cpath fill='%23141414' d='M32 5H4a4 4 0 0 0-4 4v4h36V9a4 4 0 0 0-4-4'/%3E%3Cpath fill='%23eee' d='M0 13h36v1H0zm0 9h36v1H0z'/%3E%3Cpath fill='%23141414' d='M23.054 9.404c-.066-.039-.186.089-.794.764c-.216.24-.486.539-.785.86c-.608.653-1.244 1.461-.783 1.935l-7.265 12.211c-.011.018-.019.047.003.087a.432.432 0 0 0 .294.177h.003c.046 0 .068-.021.079-.039l7.268-12.215c.626.148 1.024-.784 1.305-1.616c.14-.417.274-.796.381-1.1c.302-.856.356-1.027.294-1.064'/%3E%3Cpath fill='%23fff' d='M22.305 10.208c-.216.24-.486.539-.786.861c-.886.952-1.124 1.528-.769 1.868l.018.016l-7.29 12.252c-.004.008.001.021.005.027a.378.378 0 0 0 .242.145h.002c.01 0 .023-.001.028-.01l7.279-12.234l.012-.02l.022.006c.458.13.846-.355 1.254-1.572c.14-.417.274-.796.381-1.101c.168-.475.314-.889.314-.984c-.082.046-.375.372-.712.746'/%3E%3Cpath fill='%23141414' d='M15.308 12.963c.461-.474-.174-1.282-.783-1.935c-.299-.322-.569-.62-.785-.86c-.608-.674-.728-.803-.794-.764c-.062.038-.008.208.293 1.063c.107.304.241.683.381 1.1c.28.833.678 1.764 1.305 1.616l7.268 12.215c.011.018.033.039.079.039h.003a.432.432 0 0 0 .294-.177c.021-.04.014-.069.003-.087z'/%3E%3Cpath fill='%23fff' d='M15.25 12.937c.355-.34.118-.916-.769-1.868c-.3-.322-.569-.621-.786-.861c-.337-.374-.631-.7-.714-.745c0 .095.146.509.314.984c.107.305.242.684.381 1.101c.409 1.217.796 1.702 1.254 1.572l.022-.006l.012.02l7.279 12.234c.005.009.019.01.028.01h.002a.374.374 0 0 0 .242-.145c.004-.007.009-.02.005-.027l-7.29-12.252z'/%3E%3Cpath fill='%23141414' d='M18.018 10.458L18 10.444l-.018.014c-2.492 1.87-3.704 4.331-3.704 7.523s1.211 5.653 3.704 7.524l.018.013l.018-.013c2.492-1.87 3.704-4.331 3.704-7.524s-1.212-5.655-3.704-7.523'/%3E%3Cpath fill='%23bb1600' d='M20.879 14.059c-.603-1.363-1.551-2.54-2.88-3.54c-1.326.999-2.273 2.174-2.877 3.533c.525 1.181.782 2.468.782 3.937c0 1.467-.256 2.751-.779 3.928c.604 1.356 1.55 2.529 2.873 3.527c1.326-.999 2.273-2.174 2.876-3.534c-.521-1.178-.776-2.461-.776-3.921c.002-1.462.258-2.747.781-3.93'/%3E%3Cpath fill='%23fff' d='M18 18.927c.306 0 .555-.424.555-.946s-.249-.947-.555-.947c-.306 0-.554.424-.554.947c-.001.522.248.946.554.946m-.231-2.497c-.502-.739-.746-1.677-.746-2.821c0-1.145.244-2.083.746-2.823zm.462 0c.501-.739.744-1.677.744-2.821c0-1.145-.243-2.083-.744-2.823zm-.462 3.1c-.502.738-.746 1.677-.746 2.821c0 1.146.244 2.082.746 2.822zm.462 0c.501.738.744 1.677.744 2.821c0 1.146-.243 2.082-.744 2.822z'/%3E%3C/svg%3E");
}
.let {
  display: inline-block;
  width: 1em;
  height: 1em;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 256 256'%3E%3Cpath fill='%231877f2' d='M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445'/%3E%3Cpath fill='%23fff' d='m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z'/%3E%3C/svg%3E");
}
</style>
</html>