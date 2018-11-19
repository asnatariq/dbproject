<?php
include("config.php");
session_start();
$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($mysqli, "SELECT UserID from User_13217 WHERE UserID = '$user_check'");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['UserID'];

if(!isset($_SESSION['login_user'])) {
//	header("Location:login.php");
	//unset($_POST['UserID']);
	//mysqli_query($mysqli, "UPDATE User_13217 set Active='No' WHERE UserID='$UserID'");
}
?>