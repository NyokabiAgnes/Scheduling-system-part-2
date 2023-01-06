<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Page</title>
<style>
    Body{
font-family:Calibri, Helvetica, sans-serif;
background-color: whitesmoke;
    }
    button{
        background-color: #fcfafa;
        width: 320px;
        top: 50%;
        left: 50%;
        position: absolute;
        color: black;
        padding: 15px;
        border: none;
        cursor: pointer;
    }
    form{
        border: 3px solid #f1f1f1;
    }
    input[ type=text], input[type=username] {
width: 100%;
margin: 8px 0;
padding: 12px 20px;
display: inline-block;
border: 2px solid grey ;
box-sizing: border-box;
    }
    button:hover{
        opacity: 0.7;
    }
    .cancelbtn{
        width: auto;
        padding: 10px 18px;
        margin: 10px 5px;
    }
    .container{
        padding: 25px;
        background-color: whitesmoke;
    }
</style>
</head>
<body>
    <center><h1>Login/Registration Form</h1></center>
    <form>
        <div class="container">
        <label>Username</label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>
<label> Repeat password</label>
<input type="password" placeholder="Repeat Password" name="repeat password" required>
        <label>Email</label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <button type=" submit" class="registerbtn">Register</button>
        <input type="checkbox" checked="checked"> Remember me
        <button type="submit">Login</button>
       
        <label>Reset Password</label>
        <input type="reset password" placeholder="Reset Password" name="reset password">
    
        <label>Reset Username</label>
        <input type="reset username" placeholder="Reset Username" name="reset username">
            </div>
    </form>
</body>
</html>