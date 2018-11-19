<?php
include_once("config.php");
if(isset($_POST['update'])) { 
	$ProductCode = $_POST['ProductCode'];
    $Brand = $_POST['Brand'];
	$Type = $_POST['Type'];
    $Shade = $_POST['Shade'];
	$Size = $_POST['Size'];
    $SalesPrice = $_POST['SalesPrice'];
	//updating the table
	$qupdate = "UPDATE Product_13217 SET Brand='$Brand', Type='$Type', Shade='$Shade', Size='$Size', SalesPrice='$SalesPrice' WHERE ProductCode='".$ProductCode."'";
	//echo $qupdate;
	$result = mysqli_query($mysqli,$qupdate );
	//redirectig to the display page.
	header("Location: IndexProduct.php");
}

?>

<?php
//getting id from url
$ProductCode = $_GET['ProductCode'];
//echo "$ProductCode";

//selecting data associated with this particular id
$q = "SELECT * FROM Product_13217 WHERE ProductCode = '$ProductCode'";
//echo "$q";

$result = mysqli_query($mysqli, $q);
//echo "$result";
while($row = mysqli_fetch_array($result)) {
	$Brand = $row['Brand'];
	$Type = $row['Type'];
    $Shade = $row['Shade'];
	$Size = $row['Size'];
    $SalesPrice = $row['SalesPrice'];
}

?>

<html>
<head> 
<title>Edit Data</title>
</head>

<body style='background-color: #F5F3EA'>
<a href="home.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="EditProduct.php">
 <table border="0">
  <tr> 
   <td>Brand</td>
   <td><input type="text" name="Brand" value="<?php echo $Brand;?>"></td>
  </tr>
   <tr> 
   <td>Type</td>
   <td><input type="text" name="Type" value="<?php echo $Type;?>"></td>
  </tr>
  <tr> 
   <td>Shade</td>
   <td><input type="text" name="Shade" value="<?php echo $Shade;?>"></td>
  </tr>
  <tr>
  <td>Size</td>
   <td><input type="text" name="Size" value="<?php echo $Size;?>"></td>
  </tr>
  <tr> 
   <td>SalesPrice</td>
   <td><input type=number_format name="SalesPrice" value="<?php echo $SalesPrice;?>"></td>
  </tr>
    <tr>
   <td><input type="hidden" name="ProductCode" value=<?php echo $_GET['ProductCode'];?>></td>
   <td><input type="submit" name="update" value="Update"></td>
  </tr>
 </table>
</form>
</body>
</html>
