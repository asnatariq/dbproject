<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$ProductCode = $_GET['ProductCode'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM Product_13217 WHERE ProductCode='$ProductCode'");
 
//redirecting to the display page
header("Location:IndexProduct.php");
?>