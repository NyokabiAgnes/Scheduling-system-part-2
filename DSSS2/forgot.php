<?php
session_start();

require "mail.php";

$conn = mysqli_connect('localhost', 'root', '', 'nyokabi');
if (!$conn) {
	die("Connection failed".mysqli_connect_error());
}

$message='';
$message2='';

$mode = "enter_email";
if (isset($_GET['mode'])) {
	$mode = $_GET['mode'];
}

//something is posted

if (count($_POST) > 0) {
	switch ($mode) {
		case 'enter_email':
			$email = $_POST['email'];
			//validate the email
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$message = "Please enter a valid email";
			} elseif (!valid_email($email)) {
				$message = "Email entered was not found";
			} else {
				$_SESSION['forgot']['email'] = $email;
				send_email($email);

				header("Location: forgotpassword.php?mode=enter_code");
				die;
			}
			
			break;

		case 'enter_code':
			$code = $_POST['code'];
			$result = code_authentication($code);

			if ($result == "The Code is Correct") {
				$_SESSION['forgot']['code'] = $code;
				header("Location: forgotpassword.php?mode=enter_password");
				die;
			}else{
				$message = $result;
			}
			break;

		case 'enter_password':
			$pass1 = $_POST['password1'];
			$pass2 = $_POST['password2'];

			if ($pass1 != $pass2) {
				$message = "Passwords do not match";
			} elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
				header("Location: forgotpassword.php");
			die;
			} else {
				save_password($pass1);
				if (isset($_SESSION['forgot'])) {
					unset($_SESSION['forgot']);
				}
				header("Location: login.php");
			die;
			}
			
			break;
		
		default:
			// code...
			break;
	}
}

function send_email($email){
	global $conn;
	$expire = time() + (60 * 10);
	$code = rand(10000,99999);
	$email=addslashes($email);

	$query = "INSERT INTO codes (email,codes,expire)VALUES('$email','$code','$expire')";
	$query_run = mysqli_query($conn,$query) or die("Could not update");

	//send email
	send_mail($email,'Password Reset',"Your code is " . $code);
}

function code_authentication($code){
	global $conn;
	$code = addslashes($code);
	$expire = time();
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "SELECT * FROM codes WHERE codes = '$code' && email = '$email' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($conn, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) 
		{
			$row = mysqli_fetch_assoc($result);
			if ($row['expire'] > $expire) {
				return "The Code is Correct";
			}else{
				return "The Code Has Expired";
			}
		}else{
			return "The Code You've Entered is Incorrect";
		}
	}
	return "The Code You've Entered is Incorrect";
}

function save_password($pass1){
	global $conn;
	$pass1 = sha1($pass1);
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "UPDATE members SET password ='$pass1' WHERE email = '$email' LIMIT 1";
	mysqli_query($conn,$query);
}

function valid_email($email){
	global $conn;
	$email = addslashes($email);

	$query = "SELECT * FROM members WHERE email = '$email' LIMIT 1";
	$result = mysqli_query($conn, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) 
		{
			return true;
		}
	}

	return false;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link href="register.css"rel="stylesheet"type="text/css"/>	
	<style type="text/css">
		.register-box{
			height: 100%;
			margin-top: 10px;
			background-color: #1d272e;
		}

		.wave{
			width: 250px;
			border-radius: 30px;
		}

		p{
			color: #bab5ff;
		}

		h1{
			margin: 5px;
		}

		.save{
			margin: 20px;
		}
	</style>
</head>

<body>

	<center>

		<?php
			switch ($mode) {
				case 'enter_email':
				?>
					<div class="register-box">
						<h1 class="header">Change Password</h1><br>
						<small id="emailHelp" class="form-text"><?php print("$message2");?></small><br>
			 				<p> Just fill in your email below and you good to go.<p>

	 					<div id="error"><?php echo $message;?></div>

					<form action="forgotpassword.php?mode=enter_email" method="post">

					    <input type="text" class="form-control" name="email" placeholder="Insert Your Email"> <br>		
						
						<input type="submit" class="login-btn" name="SavePassChanges" value="Reset Password">
						
					</form>

				<?php
					break;


				case 'enter_code':
				?>
					<div class="register-box">
						<h1 class="header">Change Password</h1><br>
						<small id="emailHelp" class="form-text"><?php print("$message2");?></small><br>

			 				<p>Enter the Code that was sent to your Email. || <i>Code Expires in 10 minutes</i></p>

	 					<div id="error"><?php echo $message;?></div>

					<form action="forgotpassword.php?mode=enter_code" method="post">

					    <input type="text" class="form-control" name="code" placeholder="Insert Code"> <br>		
						
						<button type="submit" class="login-btn" name="SavePassChanges">Next</button>

						<a href="forgotpassword.php" class="login save">
							<p>Start Over</p>
						</a>
						
					</form>
			
				<?php
					break;

				case 'enter_password':
				?>
					<div class="register-box">
						<h1 class="header">Change Password</h1><br>
						<small id="emailHelp" class="form-text"><?php print("$message2");?></small><br>

			 				<p>Enter your new desired Password<p>

	 					<div id="error"><?php echo $message;?></div>

					<form action="forgotpassword.php?mode=enter_password" method="post">

					    <input type="password" class="form-control" name="password1" placeholder="Insert Password"> <br>	
					    <input type="password" class="form-control" name="password2" placeholder="Confirm Password"> <br>	
						
						<button type="submit" class="login-btn" name="SavePassChanges">Next</button>

						<a href="forgotpassword.php" class="login save">
							<p class="startover">Start Over</p>
						</a>
						
					</form>
			
				<?php
					break;
				
				default:
					// code...
					break;
			}
		?>

			<a href="login.php" class="login save">
				<p>Back</p>
			</a>
		</div>
	</center>
</body>
</html>