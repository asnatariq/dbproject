<?php 
 $conn = mysqli_connect("localhost", "root", "", "asna"); 
 $id = isset($_POST["id"])?$_POST["id"]:"";
 $sql = "DELETE FROM salesorder_13217 WHERE OrderNo = $id"; 
 if(mysqli_query($conn, $sql)) 
 { 
 echo 'Data Deleted Successfully!'; 
 } 
 ?> 