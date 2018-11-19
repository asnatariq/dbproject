<?php 
 $connect = mysqli_connect("localhost", "root", "", "asna");  
 $OrderNo = isset($_POST["OrderNo"])?$_POST["OrderNo"]:"";
 $CustomerID = isset($_POST["CustomerID"])?$_POST["CustomerID"]:"";
 $Date = isset($_POST["Date"])?$_POST["Date"]:"";
 $SalespersonID = isset($_POST["SalespersonID"])?$_POST["SalespersonID"]:"";
 $ProductCode  =isset($_POST["ProductCode"])?$_POST["ProductCode"]:"";
 $Quantity = isset($_POST["Quantity"])?$_POST["Quantity"]:"";
 $Amount = isset($_POST["Amount"])?$_POST["Amount"]:"";

 $res = mysqli_query($connect, "SELECT SalesPrice FROM product_13217 WHERE ProductCode='$ProductCode'");
 $row = mysqli_fetch_array($res);
 $sql = "INSERT INTO salesorder_13217 VALUES('$OrderNo', '$Customer', '$Date', '$SalespersonID', '$ProductCode', '$Quantity', '$Rate', '$Amount')";  
 if(mysqli_query($connect, $sql))  
 {  
    mysqli_query($connect, "UPDATE salesorder_13217 SET Amount=($Rate*$Quantity) WHERE OrderNo='".$_POST["OrderNo"]."'");
    echo 'Data Inserted';  
 }
?>

