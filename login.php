
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.bg-img {
    /* The image used */
    background-image: url("website_background.png");

    min-height: 500px;

    /* Center and scale the image nicely */
    background-position: center;
   // background-repeat: repeat-x, repeat-y;
    background-size: cover;
    position: fixed, relative;
}

/* Add styles to the form container */
.container {
    position: absolute;
	top: 150px;
    right: 500;
    margin: 20px;
    max-width: 300px;
    padding: 16px;
    background-color: #F5F3EA;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for the submit button */
.btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
</style>
    <title>Login Page</title>
</head>
<div class="bg-img">
<body style='background-color: #F5F3EA' align='center' >
<br> <br> <br> <br> <br> <br> <br> <br> 
<?php
include_once("config.php");
session_start();
if (isset($_POST['submit']))
{
	
	$UserID = $_POST['UserID'];
	//$UserName = $_POST['UserName'];
	$Password 	= $_POST['Password'];
	
	//echo ("UserID is ".$UserID." Password ".$Password);
	$q = "select count(*) as cnt from User_13217 where UserID='".$UserID."' and Password= '".$Password."'";
	
	//echo ($q);
	$result = mysqli_query($mysqli, $q);

	while($row = mysqli_fetch_array($result)) {		
		$cnt = $row['cnt'];
	}
	if ($cnt != 0) {
		$_SESSION['login_user']= $UserID;
		$qr = "UPDATE User_13217 set Active='Yes' WHERE UserID='$UserID'";
		mysqli_query($mysqli, $qr);
		header("Location:Home.php");
	}
	else {
	echo "<font color='red'>Incorrect UserID/Password</font><br/>";
	}
}

?>

<form action="login.php" method=POST  class="container">
<h1>Login</h1>

    <label for="UserID"><b>UserID</b></label>
    <input type="text" placeholder="Enter UserID" name="UserID" required>

    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>

    <button type="submit" name="submit" class="btn">Login</button>



</form>
</div>
</body>
</html>