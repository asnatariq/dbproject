<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$CustomerID = $_GET['CustomerID'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM customer_13217 WHERE CustomerID='$CustomerID'");
 
//redirecting to the display page
header("Location:IndexCustomer.php");
?>