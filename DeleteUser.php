<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$UserID = $_GET['UserID'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM User_13217 WHERE UserID='$UserID'");
 
//redirecting to the display page
header("Location:IndexUser.php");
?>