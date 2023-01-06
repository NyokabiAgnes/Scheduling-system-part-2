<?php

if(isset($_POST['Subject'])){
    
    $subject=$_POST['subject'];
    $details=$_POST['details'];

    
    $conn = mysqli_connect('localhost', 'root', '', 'nyokabi');

if (!$conn) {
    die("Connection failed".mysql_connect_error());}
    
    
    
{
    
//insert the notices
$query=mysqli_query($conn,"INSERT INTO notices (Subject,Details)VALUES('$subject','$details')") or die("Could not insert your information");

header("Location:Schooldashboard.php");
    
}
    
}


?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOtices</title>
    <style type="text/css"> 

.loginbox{
            width:320px; 
            height:480px;
            background: #000;
            color: #fff;
            top: 50%;
            left:50%;
            position:absolute; 
            transform:translate(-50%,-50%);
            box-sizing:border-box;
            padding: 70px 30px;
            font-family: 'Josefin Sans',sans-serif;
        }
        
        .h2{
            margin: 0;
            padding: 0 0 20pxs;
            text-align: center;
            font-size: 22px;
        }
        .loginbox p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .loginbox input{
            width: 100%;
            margin-bottom: 20px;
        }
        .loginbox input[type="text"], input[type="Noticedetails"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background:transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
            font-family: 'Josefin Sans',sans-serif;


        }
        .loginbox input[type="submit"]
        {
            border:none; 
            outline:none;
            height: 40px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
            font-family: 'Josefin Sans',sans-serif;

        }
        .loginbox input[type="submit"]:hover
        {
            cursor: pointer;
            background: #ffc107;
                color: #000;

        }
        .


    </style>
</head>
<body>

    <div style="background-image: url(images/banana.jpeg); width: 100%; height: 700px;">

     <div class="loginbox">
    <h2>Notice</h2>
<form action=Schooldashboard.php method="POST">

         <p>Subject:</p>
        <input id="subject" type="text" name="details" placeholder="Enter Subject">
        <p>Details:</p>
        <input id="email" type="text" name="email" placeholder="Enter Details">
        <input id="add new notice" type="submit" name="" placeholder="add new notice">
 </div>    
</form>
</body>
</html>