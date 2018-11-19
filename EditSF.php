<?php 
 $conn = mysqli_connect("localhost", "root", "", "asna"); 
 $id = isset($_POST["id"])?$_POST["id"]:""; 
 $text = isset($_POST["text"])?$_POST["text"]:""; 
 $column_name = isset($_POST["column_name"])?$_POST["column_name"]:""; 
 $sql = "UPDATE salesorder_13217 SET ".$column_name."='".$text."' WHERE OrderNo='".$id."'"; 
 if($column_name == "PCode") {
	$result = mysqli_query($conn, "SELECT SalesPrice FROM product_13217 WHERE ProductCode='".$text."'");
	$row = mysqli_fetch_array($result);
	mysqli_query($conn, "UPDATE salesorder_13217 SET Rate='".$row['SalesPrice']."' WHERE OrderNo='".$id."'");
 if(mysqli_query($conn, $sql)) 
 { 
	mysqli_query($conn, "UPDATE salesorder_13217 SET Amount=Rate*Quantity WHERE OrderNo='".$id."'");
	echo 'Data Updated'; 
 }
?>

