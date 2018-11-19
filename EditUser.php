<?php
include_once("config.php");
if(isset($_POST['update']))
	{ 
	$UserID = $_POST['UserID'];
    $UserName = $_POST['UserName'];
	$Password = $_POST['Password'];
	$SalespersonID = $_POST['SalespersonID'];
    //$Active = $_POST['Active'];
	
 //updating the table
	if(empty($SalespersonID)) {
		$q = "UPDATE User_13217 SET UserName='$UserName', Password='$Password', SalespersonID=NULL WHERE UserID='".$UserID."'";
	}
	else {
		$q = "UPDATE User_13217 SET UserName='$UserName', Password='$Password', SalespersonID='$SalespersonID' WHERE UserID='".$UserID."'";
	}
    $result = mysqli_query($mysqli, $q);   
	echo $q;

 
	//redirectig to the display page.
	header("Location: IndexUser.php");
	}
?>
<?php
//getting id from url
$UserID = $_GET['UserID'];
//echo "$UserID";

//selecting data associated with this particular id
$q = "SELECT * FROM User_13217 WHERE UserID = '$UserID'";
//echo "$q";

$result = mysqli_query($mysqli, $q);
//echo "$result";
while($row = mysqli_fetch_array($result))
{
	$UserName = $row['UserName'];
	$Password = $row['Password'];
	$SalespersonID = $row['SalespersonID'];
}
?>
<html>
<head> 
<title>Edit Data</title>
</head>

<body style='background-color: #F5F3EA'>
<a href="Home.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="EditUser.php">
 <table border="0">
  <tr> 
   <td>User Name</td>
   <td><input type="text" name="UserName" value="<?php echo $UserName;?>"></td>
  </tr>
   <tr> 
   <td>Password</td>
   <td><input type=password name="Password" value="<?php echo $Password;?>"></td>
  </tr>
  <tr>
   <td>SalespersonID</td>
   <td><input type="text" name="SalespersonID" value="<?php echo $SalespersonID;?>"></td>
  </tr>
  <tr>
   <td><input type="hidden" name="UserID" value=<?php echo $_GET['UserID'];?>></td>
   <td><input type="submit" name="update" value="Update"></td>
  </tr>
 </table>
</form>
</body>
</html>
