<?php
include_once("config.php");
if(isset($_POST['update'])) { 
	$CustomerID = $_POST['CustomerID'];
	$ShopName =  $_POST['ShopName'];
	$CustomerName =$_POST['CustomerName'];
	$ContactNumber = $_POST['ContactNumber'];
	$Address =  $_POST['Address'];
	$Area = $_POST['Area'];
	$GeographicalCoordinates =  $_POST['GeographicalCoordinates']; 
	//updating the table
	$qupdate = "UPDATE customer_13217 SET ShopName='$ShopName', CustomerName='$CustomerName', ContactNumber='$ContactNumber', Address='$Address', Area='$Area', GeographicalCoordinates='$GeographicalCoordinates' WHERE CustomerID='".$CustomerID."'";
	//echo $qupdate;
	$result = mysqli_query($mysqli,$qupdate );
	//redirectig to the display page.
	header("Location: IndexCustomer.php");
}

?>

<?php
//getting id from url
$CustomerID = $_GET['CustomerID'];
//echo "$CustomerID";

//selecting data associated with this particular id
$q = "SELECT * FROM customer_13217 WHERE CustomerID= '$CustomerID'";
//echo "$q";

$result = mysqli_query($mysqli, $q);
//echo "$result";
while($row = mysqli_fetch_array($result)) {	
	$ShopName = $row['ShopName'];
	$CustomerName = $row['CustomerName'];
	$ContactNumber = $row['ContactNumber']; 
	$Address = $row['Address'];
	$Area = $row['Area'];
	$GeographicalCoordinates = $row['GeographicalCoordinates'];
}

?>

<html>
<head> 
<title>Edit Data</title>
</head>

<body style='background-color: #F5F3EA'>
<a href="home.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="EditCustomer.php">
 <table border="0">
  <tr> 
   <td>Shop Name</td>
   <td><input type="text" name="ShopName" value="<?php echo $ShopName;?>"></td>
  </tr>
  <tr> 
   <td>Customer Name</td>
   <td><input type="text" name="CustomerName" value="<?php echo $CustomerName;?>"></td>
  </tr>
  <tr> 
   <td>Contact Number</td>
   <td><input type="text" name="ContactNumber" value="<?php echo $ContactNumber;?>"></td>
  </tr>
  <tr> 
   <td>Address</td>
   <td><input type="text" name="Address" value="<?php echo $Address;?>"></td>
  </tr>
  <tr> 
   <td>Area</td>
   <td><input type="text" name="Area" value="<?php echo $Area;?>"></td>
  </tr>
  <tr> 
   <td>Geographical Coordinates</td>
   <td><input type="text" name="GeographicalCoordinates" value="<?php echo $GeographicalCoordinates;?>"></td>
  </tr>
  <tr>
   <td><input type="hidden" name="CustomerID" value=<?php echo $_GET['CustomerID'];?>></td>
   <td><input type="submit" name="update" value="Update"></td>
  </tr>
 </table>
</form>
</body>
</html>
