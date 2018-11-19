<?php
include_once("config.php");
if(isset($_POST['update'])) { 
	$SalespersonID = $_POST['SalespersonID'];
    $Name = $_POST['Name'];
	$ContactNumber = $_POST['ContactNumber'];
    $ListOfCustomers = $_POST['ListOfCustomers'];
	//updating the table
	$qupdate = "UPDATE Salesperson_13217 SET Name='$Name', ContactNumber='$ContactNumber', ListOfCustomers='$ListOfCustomers' WHERE SalespersonID='".$SalespersonID."'";
	//echo $qupdate;
	$result = mysqli_query($mysqli,$qupdate );
 
	//redirectig to the display page.
	header("Location: IndexSalesperson.php");
}

?>

<?php
//getting id from url
$SalespersonID = $_GET['SalespersonID'];
//echo "$SalespersonID";

//selecting data associated with this particular id
$q = "SELECT * FROM Salesperson_13217 WHERE SalespersonID = '$SalespersonID'";
//echo "$q";

$result = mysqli_query($mysqli, $q);
//echo "$result";
while($row = mysqli_fetch_array($result)) {
	$Name = $row['Name'];
	$ContactNumber = $row['ContactNumber']; 
	$ListOfCustomers = $row['ListOfCustomers'];
}

?>

<html>
<head> 
<title>Edit Data</title>
</head>

<body style='background-color: #F5F3EA'>
<a href="Home.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="EditSalesperson.php">
 <table border="0">
  <tr> 
   <td>Name</td>
   <td><input type="text" name="Name" value="<?php echo $Name;?>"></td>
  </tr>
   <tr> 
   <td>Contact Number</td>
   <td><input type="text" name="ContactNumber" value="<?php echo $ContactNumber;?>"></td>
  </tr>
  <tr> 
   <td>List of Customers</td>
   <td><input type="number_format" name="ListOfCustomers" value="<?php echo $ListOfCustomers;?>"></td>
  </tr>
    <tr>
   <td><input type="hidden" name="SalespersonID" value=<?php echo $_GET['SalespersonID'];?>></td>
   <td><input type="submit" name="update" value="Update"></td>
  </tr>
 </table>
</form>
</body>
</html>
