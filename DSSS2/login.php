<?php
$message = '';

if(isset($_POST['email'])){
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$remember=$_POST['remember'];
	
	$conn = mysqli_connect('localhost', 'root', '', 'nyokabi');
if (!$conn) {
	die("Connection failed".mysql_connect_error());}
	
//secure the data
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pass=sha1($pass);
	$query=mysqli_query($conn,"SELECT*FROM members WHERE email='$email'AND password='$pass'LIMIT 1")or die("Could not check Member");
	$count_query=mysqli_num_rows($query);
	if($count_query==0){
		$message="The information you entered was incorrect!";
	}else{
	
	//start the sessions
	
		$_SESSION['pass']=$pass;
		while($row=mysqli_fetch_array($query)){
			$username=$row['username'];
			$id=$row['id'];
		}
	$_SESSION['username']=$username;
	$_SESSION['id']=$id;
		
		if($remember=="yes"){
			
	//create the cookies
			
		setcookie("id_cookie",$id,time()+60*60*24*100,"/");
		setcookie("pass_cookie",$pass,time()+60*60*24*100,"/");	
		
		}
	header("Location:Schooldashboard.php");	
		
	}
	
	
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login to DSSS</title>
<link href="register.css"rel="stylesheet"type="text/css"/>
</head>

<body>
	<center>
		<div id="error"><?php echo $message;?></div>
	<div class="register-box">
		<h1>DRIVING SCHOOL SCHEDULING SYSTEM
		LOGIN</h1>
		<form action="login.php" method="post" id="form">
			
		    <input class="form-control"  type="text" name="email" id="email" placeholder="Email Address" /><br/>
			<input class="form-control" type="password" name="pass" id="pass" placeholder="Password" autocomplete="off" /><br/>
			<input class=checkbox type="checkbox" name="remember" value="yes"checked="checked" />Remember me<br/>		
			<input class="login-btn" style="" type="submit" id="submit" value="Login"/>	
		</form>

		<div class="forgot">
			<a href="forgotpassword.php">
				<p>Forgot password?</p>
			</a>
		</div>

		<div class="register">
			<a href="register.php">
				<p>No account? Register</p>
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


			if (pass.value === '' || pass.value == null) {
				messages.push('Pass is required');
			}

			if (messages.length > 0) {
				e.preventDefault();
				errorElement.innerText = messages.join(', ');
			}
		});
	</script>
</body>
</html>