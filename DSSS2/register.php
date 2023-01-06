<?php

if(isset($_POST['username'])){
	
	$username=$_POST['username'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	
	$conn = mysqli_connect('localhost', 'root', '', 'nyokabi');

if (!$conn) {
	die("Connection failed".mysql_connect_error());}
	
	
//securing data
$username=preg_replace("#[^0-9a-z]#i","","$username");
$pass1=sha1($pass1);	
$email=mysqli_real_escape_string($conn,$_POST['email']);
	
//check for duplicates
	
$user_query=mysqli_query($conn,"SELECT username FROM members WHERE username='$username'LIMIT 1")or die("Could not check username");
$count_username=mysqli_num_rows($user_query);
	
$email_query=mysqli_query($conn,"SELECT email FROM members WHERE email='$email'LIMIT 1")or die("Could not check username");
$count_email=mysqli_num_rows($email_query);
	
if($count_username>0){
	$message='Your username is already taken';
}elseif($count_email>0){
	$message='Your email is already in use';
}else{
	
//insert the members
$query=mysqli_query($conn,"INSERT INTO members (Username,Email,Password)VALUES('$username','$email','$pass1')") or die("Could not insert your information");

header("Location:login.php");
	
}
	
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register to DSSS</title>
<link href="register.css"rel="stylesheet"type="text/css"/>
</head>

<body>
	<center>
		<div id="error"></div>
	<div class="register-box">
		<h1>DRIVING SCHOOL SCHEDULING SYSTEM
		REGISTRATION</h1>
		<form action="register.php" method="post" id="form">

			<input class="form-control"  type="text" name="username" id="username" placeholder="Username" /><br/>
		    <input class="form-control"  type="text" name="email" id="email" placeholder="Email Address" /><br/>
			<input class="form-control" type="password" name="pass1" id="pass1" placeholder="Password" autocomplete="off"/><br/>
			<input class="form-control" type="password" name="pass2" id="pass2" placeholder="Confirm Password"autocomplete="off" /><br/>
			<input class=checkbox type="checkbox" name="remember" value="yes"checked="checked" />Remember me<br/>		
			<input class="login-btn" style="" type="submit" id="submit" value="Register"/>	
		</form>

		<div class="login">
			<a href="login.php">
				<p>Already have an Account? Login.</p>
			</a>
		</div>

	</div>
	</center>

	<script type="text/javascript">
		const form = document.getElementById('form');
		const username = document.getElementById('username');
		const email = document.getElementById('email');
		const pass = document.getElementById('pass');
		const errorElement = document.getElementById('error');
		const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

		form.addEventListener('submit',(e) =>{
			let messages = [];
			if (username.value === '' || username.value == null) {
				messages.push('Name is required');
			}

			if (email.value === '' || email.value == null) {
				messages.push('Email is required');
			} else{

				if (email.value.match(pattern)) {
					
				} else{
					messages.push('Your Email is Invalid');
				}				
			}


			if (pass1.value === '' || pass1.value == null) {
				messages.push('Password is required');
			}

			else{
					if (pass2.value === '' || pass2.value == null) {
					messages.push('Confirmation password is required');
				} else{
					if (pass1.value === pass2.value) {}
						else{
							messages.push('Your Password Fields Do Not Match')
						}
				}
			}

			

			if (messages.length > 0) {
				e.preventDefault();
				errorElement.innerText = messages.join(', ');
			}
		});
	</script>	
</body>
</!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>