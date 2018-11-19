<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$SalespersonID = $_GET['SalespersonID'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM Salesperson_13217 WHERE SalespersonID='$SalespersonID'");
 
//redirecting to the display page
header("Location:IndexSalesperson.php");
?>