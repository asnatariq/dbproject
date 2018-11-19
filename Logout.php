<?php
include("config.php");
include("login.php");

session_start();
//$_SESSION['login_user']= $UserID;
$q = "UPDATE User_13217 SET Active='No' WHERE Active='Yes'";

mysqli_query($mysqli, $q);
// Delete certain session
session_unset();
// Delete all session variables
session_destroy();
// Jump to login page
header('Location: login.php');
echo "$q";
?> 